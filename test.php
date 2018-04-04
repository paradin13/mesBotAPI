<?php
header('Content-Type: text/html; charset=utf-8');
require('function_msg.php');
$message_rece = $_GET['text'];
if($message_rece==''){$message_rece = 'สวัสดี';}
$replyToken = 'xxxx';

$arrPostData = function_msg($replyToken,$message_rece);

echo $message_rece;echo '<br/>';
print_r($arrPostData);
?>
