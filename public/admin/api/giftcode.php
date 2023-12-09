<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
  $token = check_string($_POST['token']);
  if (empty($token)) {
      die(json_encode([
               "status" => "error",
               "msg" => "Vui long dang nhap"
            ]));
       }
   $getUser = $MinhChien->get_row("SELECT * FROM `users` WHERE `token` = '".$token."' ");
   if (!$getUser) {
     die(json_encode([
              "status" => "error",
               "msg" => "Vui long dang nhap"
            ]));
        }
   if ($getUser['level'] != 3) {
     die(json_encode([
              "status" => "error",
               "msg" => "Server Error"
            ]));
       }
$giftcode       = check_string($_POST['giftcode']);
$giatri1        = check_string($_POST['giatri1']);
$giatri2        = check_string($_POST['giatri2']);
$luot           = check_string($_POST['luot']);
$check_giftcode = $MinhChien->get_row("SELECT * FROM `giftcode` WHERE `giftcode` = '$giftcode' ");

if(empty($giftcode) || empty($giatri1) || empty($giatri2) || empty($luot)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($system == 'demo') {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Thể Thao Tác Trên Trang Web Demo"]));
} else if($check_giftcode) {
die(json_encode([
    "status" => "error",
    "msg" => "Mã Giftcode Đã Tồn Tại"]));
} else {
$isInsert = $MinhChien->insert("giftcode", [
                'giftcode'       => $giftcode,
                'giatri1'       => $giatri1, //// min random
                'giatri2'       => $giatri2,  //// max random
                'luot' => $luot
                ]);
   if ($isInsert) {
       die(json_encode([
               "status" => "success",
               "msg" => "Thêm Giftcode Thành Công !"
            ]));
       } else {
       die(json_encode([
                "status" => "error",
                "msg" => "That bai"
            ]));
         }
     }
 }