<?php require('../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
die();
} else {
$stk = check_string($_POST['stk']);
$money   = check_string($_POST['money']);
$bank = check_string($_POST['bank']);
$mgd = rand(0000000000,9999999999);
$check_phi = $MinhChien->get_row("SELECT * FROM `ruttien` WHERE `id` = '1' ");
$min = $check_phi['min'];
$max = $check_phi['max'];
if(empty($stk) || empty($money) ) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($MinhChien->users('money') < $money) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Của Bạn Không Đủ Tiền"]));
} else if($money < $min) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Cần Phải Rút Tối Thiểu $min"]));
} else if($money > $max) {
die(json_encode([
    "status" => "error",
    "msg" => "Không Thể Rút Hơn $max"]));
} else if(!preg_match("/^[a-zA-Z0-9]*$/", $stk)) {
die(json_encode([
    "status" => "error",
    "msg" => "STK Không Được Chứa Kí Tự Đặt Biệt"]));
} else if(!preg_match("/^[a-zA-Z0-9]*$/", $money)) {
die(json_encode([
    "status" => "error",
    "msg" => "Ô Tiền Không Được Chứa Kí Tự Đặt Biệt"]));
} else {
$MinhChien->insert("lichsuruttien", [
                'trans_id'         => $mgd,
                'username'      => $MinhChien->users('username'),
                'stk'      => $stk,
                'money'         => $money,
                'bank'      => $bank,
                'status'      => 'xuli',
                'time'          => $time
                ]);
// trừ tiền người chuyển
$MinhChien->update("users", [
                'money'  => $MinhChien->users('money') - $money,
            ], " `username` = '".$MinhChien->users('username')."' ");
        $response2 = curl_exec($curl);
        curl_close($curl);
sendTele(templateTele('Người Dùng ' . $MinhChien->users('username') . ' Vừa Rút Tiền Về STK ' . $stk . ' Ngân Hàng ' .$bank. ' Với Số Tiền ' . $money .' '));
die(json_encode([
        "status" => "success",
        "msg" => "Rút Thành Công $money , Vui Lòng Chờ Xử Lí ! "]));
}
}