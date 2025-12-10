<?php
// save.php
// Receives JSON POST from frontend and appends to local CSV and forwards to Google Apps Script

header('Content-Type: application/json');

// --- CONFIG: set this to your deployed Google Apps Script Web App URL (see apps_script/append_row.gs) ---
$GOOGLE_APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbxD_CDF4daX1BlUJZ-Bknm0k0DO9VPBJRPpBdGscO05ms-mxL-oWYIDmgfIJ_OU_rSO/exec'; // <- CHANGE THIS

// read JSON body
$inputJSON = file_get_contents('php://input');
if(!$inputJSON){
  echo json_encode(['success'=>false,'message'=>'No input']); exit;
}
$data = json_decode($inputJSON, true);
if(!$data){
  echo json_encode(['success'=>false,'message'=>'Invalid JSON']); exit;
}

// sanitize some fields (simple)
function s($v){ return trim(preg_replace('/[\r\n\t]+/',' ', strip_tags($v))); }

$record = [
  'submitted_at' => s($data['submitted_at'] ?? date('c')),
  'country' => s($data['country'] ?? ''),
  'intake' => s($data['intake'] ?? ''),
  'role' => s($data['role'] ?? ''),
  'name' => s($data['name'] ?? ''),
  'phone' => s($data['phone'] ?? ''),
  'place' => s($data['place'] ?? ''),
  'education' => s($data['education'] ?? ''),
  'university' => s($data['university'] ?? ''),
  'finance' => s($data['finance'] ?? ''),
  'appt_date' => s($data['appt_date'] ?? ''),
  'appt_time' => s($data['appt_time'] ?? '')
];

// 1) Append to a local CSV file for backup
$csvFile = __DIR__ . '/submissions.csv';
$firstTime = !file_exists($csvFile);
$fp = fopen($csvFile, 'a');
if($firstTime){
  fputcsv($fp, array_keys($record));
}
fputcsv($fp, array_values($record));
fclose($fp);

// 2) Forward to Google Apps Script (if configured)
$googResp = null;
if(strpos($GOOGLE_APPS_SCRIPT_URL, 'YOUR_DEPLOYED_SCRIPT_ID') === false && filter_var($GOOGLE_APPS_SCRIPT_URL, FILTER_VALIDATE_URL)){
  $ch = curl_init($GOOGLE_APPS_SCRIPT_URL);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($record));

$googRespRaw = curl_exec($ch);  // Rename for clarity
$err = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if($err){
  echo json_encode(['success'=>false,'message'=>'Curl error when forwarding to Google Apps Script: '.$err]);
  exit;
} else {
  $googResp = json_decode($googRespRaw, true);
  if($httpCode >= 200 && $httpCode < 300 && isset($googResp['success']) && $googResp['success'] === true){
    echo json_encode(['success'=>true,'message'=>'Saved locally and pushed to Google Sheets','google_response'=>$googRespRaw]);
    exit;
  } else {
    echo json_encode(['success'=>false,'message'=>'Google Apps Script failed: ' . ($googResp['error'] ?? 'Unknown error'),'google_response'=>$googRespRaw]);
    exit;
  }
}



  $err = curl_error($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  if($err){
    echo json_encode(['success'=>false,'message'=>'Curl error when forwarding to Google Apps Script: '.$err]);
    exit;
  } else {
    // return success if HTTP 200
    if($httpCode >= 200 && $httpCode < 300){
      echo json_encode(['success'=>true,'message'=>'Saved locally and pushed to Google Sheets','google_response'=>$googResp]);
      exit;
    } else {
      echo json_encode(['success'=>false,'message'=>'Google Apps Script returned HTTP '.$httpCode,'google_response'=>$googResp]);
      exit;
    }
  }
} else {
  // Not configured: only local save
  echo json_encode(['success'=>true,'message'=>'Saved locally. Google Apps Script not configured. Edit $GOOGLE_APPS_SCRIPT_URL in this file.']);
  exit;
}











