<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."/public/client/pages/404.php";
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
   if (($getUser['level']) != 3) {
     die(json_encode([
              "status" => "error",
               "msg" => "Server Error"
            ]));
       }

$username = check_string($_POST['username']);
$type     = check_string($_POST['type']); 
$money    = check_string($_POST['amount']); 
$check_user = $MinhChien->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");

if(empty($username) || empty($type) || empty($money)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($system == 'demo') {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Thể Thao Tác Trên Trang Web Demo"]));
} else if(!$check_user) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Không Tồn Tại"]));
} else if($check_user['bannd'] != 0) {
die(json_encode([
    "status" => "error",
    "msg" => "Thằng Này Bị Khóa Tài Khoản Rồi :V "]));
} else {
if($type == "1") {  //này là cộng tiền
$cong_tien_user = $check_user['money'] + $money;
$cong_nap_user = $check_user['tong_nap'] + $money;
$MinhChien->update("users", [
            'money' => $cong_tien_user,
            'tong_nap' => $cong_nap_user
            ], " `username` = '$username' ");
die(json_encode([
    "status" => "success",
    "msg" => "Cộng Tiền Thành Công"]));
} else if($type == "2") {  //này là trừ tiền
if($money > $check_user['money']) {
die(json_encode([
    "status" => "error",
    "msg" => "Thằng Này Không Có Nhiều Tiền Như Vậy Đâu Mà Trừ "]));
} else {
$tru_tien_user = $check_user['money'] - $money;
$MinhChien->update("users", [
            'money' => $tru_tien_user
            ], " `username` = '$username' ");
die(json_encode([
    "status" => "success",
    "msg" => "Trừ Tiền Thành Công"]));
}
} else {
die(json_encode([
    "status" => "error",
    "msg" => "Loại Thực Thi Không Xác Định"]));
}
}
}