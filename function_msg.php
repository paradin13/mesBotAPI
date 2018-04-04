<?php
function function_msg($replyToken,$message_rece){
    if($message_rece == "ID"){
      $arrPostData = array();
      $arrPostData['replyToken'] = $replyToken;
      $arrPostData['messages'][0]['type'] = "text";
      $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
    }
    elseif(strpos( $message_rece,'สวัสดี')!== false){
      $arrPostData = array();
      $arrPostData['replyToken'] = $replyToken;
      $arrPostData['messages'][0]['type'] = "text";
      $arrPostData['messages'][0]['text'] = "สวัสดีครับ สนใจรถยนต์ Nissan รุ่นไหนสอบถามได้นะครับ";

      $arrPostData['messages'][1]['type'] = "sticker";
      $arrPostData['messages'][1]['packageId'] = "2";
      $arrPostData['messages'][1]['stickerId'] = "514";
    }
    elseif(strpos( $message_rece, 'หวัดดี')!== false){
      $arrPostData = array();
      $arrPostData['replyToken'] = $replyToken;
      $arrPostData['messages'][0]['type'] = "text";
      $arrPostData['messages'][0]['text'] = "สวัสดีครับ สนใจรถยนต์ Nissan รุ่นไหนสอบถามได้นะครับ";

      $arrPostData['messages'][1]['type'] = "sticker";
      $arrPostData['messages'][1]['packageId'] = "2";
      $arrPostData['messages'][1]['stickerId'] = "514";
    }

    return $arrPostData;
}
?>
