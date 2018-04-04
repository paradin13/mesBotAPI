<?php

$strAccessToken = "VqXurCW45Jgsva1rnjGbsbcBQD5xywqTepx5iVy/RuSbZYLtGWURg4g8QAgrI8mjSNZERmfBjUAMlXvI2Vee+fnttq574ItW9mGv1FKlv9k4JSy88Re5LfmNTI/0VY2yAhsZSX+o5y9HfxBuzTYoEgdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);

$strUrl = "https://api.line.me/v2/bot/message/reply";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

$message_rece = $arrJson['events'][0]['message']['text'];
$message_rece = 'หวัดดี';

if($message_rece == "ID"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}
elseif(strpos( $message_rece, "สวัสดี")){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีครับ สนใจรถยนต์ Nissan รุ่นไหนสอบถามได้นะครับ";

  $arrPostData['messages'][1]['type'] = "sticker";
  $arrPostData['messages'][1]['packageId'] = "2";
  $arrPostData['messages'][1]['stickerId'] = "514";
}
elseif(strpos( $message_rece, "หวัดดี")){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีครับ สนใจรถยนต์ Nissan รุ่นไหนสอบถามได้นะครับ";

  $arrPostData['messages'][1]['type'] = "sticker";
  $arrPostData['messages'][1]['packageId'] = "2";
  $arrPostData['messages'][1]['stickerId'] = "514";
}

print_r($arrPostData);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);

?>
