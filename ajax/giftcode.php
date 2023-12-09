<?php require('../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
die();
} else {
$giftcode = check_string($_POST['giftcode']);
$check = $MinhChien->get_row("SELECT * FROM `giftcode` WHERE `giftcode` = '$giftcode' ");
$check_sd = $MinhChien->get_row("SELECT * FROM `lichsugiftcode` WHERE `giftcode` = '$giftcode' AND `username` = '$username' ");
$min = $check['giatri1'];
$max = $check['giatri2'];
$money = rand($min, $max);
$luot = $check['luot'];

if(empty($giftcode)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Giftcode"]));
} else if(!$check) {
die(json_encode([
    "status" => "error",
    "msg" => "Mã Giftcode Không Tồn Tại"]));
} else if($check_sd) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Đã Nhập Mã Giftcode Này Rồi"]));
} else if($luot < 1) {
die(json_encode([
    "status" => "error",
    "msg" => "Mã Giftcode Đã Hết Số Lượt Nhập"]));
} else if($money < 0) {
die(json_encode([
    "status" => "error",
    "msg" => "Mã Giftcode Bị Lỗi"]));
} else if(!preg_match("/^[a-zA-Z0-9]*$/", $giftcode)) {
die(json_encode([
    "status" => "error",
    "msg" => "Mã Giftcode Không Được Chứa Kí Tự Đặt Biệt"]));
} else {
// cộng tiền     
$MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') + $money,
                    'tong_nap' => $MinhChien->users('tong_nap') + $money
            ], " `username` = '".$MinhChien->users('username')."' ");
// update giá trị giftcode
$MinhChien->update("giftcode", [
                    'luot'  => $luot - 1 
            ], " `giftcode` = '$giftcode' ");
$MinhChien->insert("lichsugiftcode", [
                    'username'  => $MinhChien->users('username'),
                    'giftcode'  => $giftcode,
                    'status'  => 'dasudung'
                ], " `username` = '".$MinhChien->users('username')."' ");
die(json_encode([
    "status" => "success",
    "msg" => "Chúc Mừng Bạn Đã Nhận Được $money Từ Mã $giftcode"]));
}
}