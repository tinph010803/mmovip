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
$noidung_nt = check_string($_POST['noidung_nt']);

if(empty($noidung_nt) ) {
die(json_encode([
    "status" => "error",
    "msg" => "Không Được Để Trống Nội Dung Nạp Tiền"]));
} else if($system == 'demo') {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Thể Thao Tác Trên Trang Web Demo"]));
} else {
$MinhChien->update("options", [
            'noidung_nt'    => $noidung_nt
            ], " `id` = '12' ");

die(json_encode([
    "status" => "success",
    "msg" => "Lưu Cài Đặt Thành Công"]));
}
}