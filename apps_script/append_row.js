// append_row.gs
// Google Apps Script Web App to accept POSTed JSON and append to a Sheet.
// 1) Create a Google Sheet, note its ID from the URL.
// 2) In Apps Script, set SHEET_ID to that ID, and optionally set SHEET_NAME.
// 3) Deploy -> New deployment -> select "Web app", set "Execute as: Me", "Who has access: Anyone" (or restrict).
// 4) Use the deployment URL in save.php

const SHEET_ID = '1SSjBUd6mZb2f3udosXw52P6GgdD1jkpK-RhDmPLfP6U';  // <- replace with your sheet ID
const SHEET_NAME = 'MBBS-Abroad'; // adjust as needed

function doPost(e){
  try{
    const body = e.postData && e.postData.type==='application/json' ? JSON.parse(e.postData.contents) : JSON.parse(e.postData.contents);
    const ss = SpreadsheetApp.openById(SHEET_ID);
    const sheet = ss.getSheetByName(SHEET_NAME) || ss.getSheets()[0];

    // determine header row from keys if first row empty
    let headers = sheet.getRange(1,1,1,sheet.getLastColumn()).getValues()[0];
    const keys = Object.keys(body);

    // if sheet empty create header
    const firstCell = sheet.getRange(1,1).getValue();
    if(!firstCell){
      sheet.appendRow(keys);
      headers = keys;
    }

    // build row aligned with headers
    const row = headers.map(h => body[h] !== undefined ? body[h] : '');
    // if headers do not include some incoming keys, append their values at the end and also update header
    const extraKeys = keys.filter(k => headers.indexOf(k) === -1);
    if(extraKeys.length){
      // append extras to header row and rows with blanks
      const newHeaders = headers.concat(extraKeys);
      sheet.getRange(1,1,1,newHeaders.length).setValues([newHeaders]);
      // build final row
      const finalRow = newHeaders.map(h => body[h] !== undefined ? body[h] : '');
      sheet.appendRow(finalRow);
    } else {
      sheet.appendRow(row);
    }

    return ContentService.createTextOutput(JSON.stringify({success:true})).setMimeType(ContentService.MimeType.JSON);
  } catch(err) {
    return ContentService.createTextOutput(JSON.stringify({success:false, error: err.message})).setMimeType(ContentService.MimeType.JSON);
  }
}
