<?php
// save.php
// Receives JSON POST from frontend → saves locally + forwards to Google Sheets
header('Content-Type: application/json');

// === CONFIG: UPDATE THIS WITH YOUR REAL GOOGLE APPS SCRIPT URL ===
$GOOGLE_APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbxD_CDF4daX1BlUJZ-Bknm0k0DO9VPBJRPpBdGscO05ms-mxL-oWYIDmgfIJ_OU_rSO/exec';
// Replace the above URL if you redeploy the script!

// Read incoming JSON
$inputJSON = file_get_contents('php://input');
if (!$inputJSON) {
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit;
}

$data = json_decode($inputJSON, true);
if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
    exit;
}

// Simple sanitize function
function s($v) {
    return trim(preg_replace('/[\r\n\t]+/', ' ', strip_tags($v ?? '')));
}

// Build clean record
$record = [
    'submitted_at' => s($data['submitted_at'] ?? date('c')),
    'country'      => s($data['country'] ?? ''),
    'intake'       => s($data['intake'] ?? ''),
    'role'         => s($data['role'] ?? ''),
    'name'         => s($data['name'] ?? ''),
    'phone'        => s($data['phone'] ?? ''),
    'place'        => s($data['place'] ?? ''),
    'education'    => s($data['education'] ?? ''),
    'university'   => s($data['university'] ?? ''),
    'finance'      => s($data['finance'] ?? ''),
    'appt_date'    => s($data['appt_date'] ?? ''),
    'appt_time'    => s($data['appt_time'] ?? '')
];

// 1. Always save to local CSV (backup)
$csvFile = __DIR__ . '/submissions.csv';
$fp = fopen($csvFile, 'a');
if (!file_exists($csvFile) || filesize($csvFile) == 0) {
    fputcsv($fp, array_keys($record)); // Write header if file is new/empty
}
fputcsv($fp, array_values($record));
fclose($fp);

// 2. Forward to Google Apps Script (only if URL looks valid)
if (
    filter_var($GOOGLE_APPS_SCRIPT_URL, FILTER_VALIDATE_URL) &&
    strpos($GOOGLE_APPS_SCRIPT_URL, 'script.google.com') !== false
) {
    $ch = curl_init($GOOGLE_APPS_SCRIPT_URL);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS     => json_encode($record),
        CURLOPT_TIMEOUT        => 15,
        CURLOPT_SSL_VERIFYPEER => true
    ]);

    $response = curl_exec($ch);
    $curlError = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($curlError || $httpCode >= 400) {
        // Google failed → still success for frontend (CSV saved), but log it
        error_log("Google Sheets forward failed: $curlError | HTTP $httpCode");
        echo json_encode([
            'success' => true,
            'message' => 'Saved locally (Google Sheets temporarily unavailable)'
        ]);
    } else {
        $googleResult = json_decode($response, true);
        if (isset($googleResult['success']) && $googleResult['success']) {
            echo json_encode(['success' => true, 'message' => 'Submitted successfully!']);
        } else {
            echo json_encode(['success' => true, 'message' => 'Saved locally (Google sync issue)']);
        }
    }
} else {
    // Google URL not set or invalid → still accept submission (CSV works!)
    // This is the CRITICAL FIX: we return success=true so the form proceeds and name shows!
    echo json_encode([
        'success' => true,
        'message' => 'Saved locally only (configure Google Apps Script URL for full sync)'
    ]);
}

exit;
