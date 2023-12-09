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
   $getUser = $MinhChien->get_row("SELECT * FROM `users` WHERE `token` = '".$token."' ");  ////check token
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

$logo       = check_string($_POST['img']); #Logo ngân hàng
$ctk        = check_string($_POST['ctk']); #Chủ tk
$stk        = check_string($_POST['stk']); #Số tk
$toi_thieu  = check_string($_POST['toi_thieu']);
$check_bank = $MinhChien->get_row("SELECT * FROM `bank` WHERE `stk` = '$stk' ");

if(empty($logo) || empty($ctk) || empty($stk) || empty($toi_thieu)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($system == 'demo') {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Thể Thao Tác Trên Trang Web Demo"]));
} else if($toi_thieu < 1000) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Tiền Tối Thiểu Là 1.000"]));
} else {
$MinhChien->insert("bank", [
                'img'       => $logo,
                'ctk'       => $ctk,
                'stk'       => $stk,
                'toi_thieu' => $toi_thieu
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Đã Thêm Ngân Hàng Bank"]));
}
}