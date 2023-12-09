<?php require('../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
die();
} else {
$noidung = check_string($_POST['noidung']);
$money   = check_string($_POST['money']);
$check_tx = $MinhChien->get_row("SELECT * FROM `taixiu` WHERE `data` = 'tai' ");
$min = $check_tx['min'];
$max = $check_tx['max'];
$tyle = $check_tx['tyle'];
$mgd = rand(0000000000,9999999999);
$tachmgd = substr($mgd, -1);
if(empty($noidung) || empty($money)) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Hãy Nhập Đầy Đủ Các Yêu Cầu Để Tiến Hành Đặt Cược"]));
} else if($MinhChien->users('money') < $money) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Của Bạn Không Đủ Tiền"]));
} else if($money < 1000) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Cần Phải Đặt Tối Thiểu 1K"]));
} else if (($money < $min) || ($money > $max) ) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Cần Phải Đặt Tối Thiểu ".$min." Tối Đa ".$max
   ]));
} else if(!preg_match("/^[a-zA-Z0-9]*$/", $noidung)) {
die(json_encode([
    "status" => "error",
    "msg" => "Nội Dung Không Được Chứa Kí Tự Đặt Biệt"]));
} else {
if($noidung == 'T' || $noidung == 't') {
    if ($tachmgd == 9) {
    // trừ tiền
    $MinhChien->update("users", [
                    'tong_tru'  => $MinhChien->users('tong_tru') + $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    // lưu lịch sử
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  => 0,
                    'game'  => 'Tài Xỉu',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));  
    } else { 
    // điều kiện thắng
    if($tachmgd >= 5 ) {
    // trừ tiền 
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    // cộng tiền thắng
    $congtien = $money * $tyle;
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') + $congtien,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  =>$congtien,
                    'game'  => 'Tài Xỉu',
                    'status'  => 'win',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "success",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận $congtien "]));
    } else {
    // còn lại
    $MinhChien->update("users", [
                    'tong_tru'  => $MinhChien->users('tong_tru') + $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  => 0,
                    'game'  => 'Tài Xỉu',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));
        } 
    }
} else if($noidung == 'X' || $noidung == 'x') {
    if ($tachmgd == 0) {
    // Trừ tiền
    $MinhChien->update("users", [
                    'tong_tru'  => $MinhChien->users('tong_tru') + $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  => 0,
                    'game'  => 'Tài Xỉu',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));  
    } else { 
    if($tachmgd <= 4 ) {
    // trừ tiền 
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    // cộng tiền thắng
    $congtien = $money * $tyle;
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') + $congtien,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  =>$congtien,
                    'game'  => 'Tài Xỉu',
                    'status'  => 'win',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "success",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận $congtien "]));
    } else {
    $MinhChien->update("users", [
                    'tong_tru'  => $MinhChien->users('tong_tru') + $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  => 0,
                    'game'  => 'Tài Xỉu',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));
        } 
    }
} else {
die(json_encode([
    "status" => "error",
    "msg" => "Nội Dung Không Hợp Lệ"]));  
}
}
}