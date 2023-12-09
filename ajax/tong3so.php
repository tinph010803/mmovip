<?php require('../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
die();
} else {
$noidung = check_string($_POST['noidung']);
$money   = check_string($_POST['money']);
$check = $MinhChien->get_row("SELECT * FROM `tong3so` WHERE `data` = 'T1' ");
$check2 = $MinhChien->get_row("SELECT * FROM `tong3so` WHERE `data` = 'T2' ");
$check3 = $MinhChien->get_row("SELECT * FROM `tong3so` WHERE `data` = 'T3' ");
$tyle = $check['tyle'];$tyle2 = $check2['tyle'];$tyle3 = $check3['tyle'];
$min1 = $check['min'];$max1 = $check['max'];
$mgd = rand(0000000000,9999999999);
$tachmgd = substr($mgd, -2);
$tachmgd2 = substr($mgd, -3);

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
} else if (($money < $min1) || ($money > $max1) ) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Cần Phải Đặt Tối Thiểu ".$min1." Tối Đa ".$max1
   ]));
} else if(!preg_match("/^[a-zA-Z0-9]*$/", $noidung)) {
die(json_encode([
    "status" => "error",
    "msg" => "Nội Dung Không Được Chứa Kí Tự Đặt Biệt"]));
} else {
if($noidung == 't1' || $noidung == 'T1') {
    if($tachmgd == 02 || $tachmgd == 13 || $tachmgd == 17 || $tachmgd == 19 || $tachmgd == 21 || $tachmgd == 29 || $tachmgd == 35 || $tachmgd == 37 || $tachmgd == 47 || $tachmgd == 49 || $tachmgd == 51 || $tachmgd == 54 || $tachmgd == 57 || $tachmgd == 63 || $tachmgd == 64 || $tachmgd == 74 || $tachmgd == 83 || $tachmgd == 91 || $tachmgd == 95 || $tachmgd ==96) {
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
                    'game'  => 'Tổng 3 số',
                    'status'  => 'win',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "success",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận $congtien "]));
    } else { 
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                    'tong_tru'  => $MinhChien->users('tong_tru') + $money
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  => 0,
                    'game'  => 'Tổng 3 số',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));
    } 
} else if ($noidung == 't2' || $noidung == 'T2' ) {
    if($tachmgd == 66 || $tachmgd == 99) {
    // trừ tiền 
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    // cộng tiền thắng
    $congtien = $money * $tyle2;
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') + $congtien,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  =>$congtien,
                    'game'  => 'Tổng 3 số',
                    'status'  => 'win',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "success",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận $congtien "]));
    } else { 
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                    'tong_tru'  => $MinhChien->users('tong_tru') + $money
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  => 0,
                    'game'  => 'Tổng 3 số',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));
    } 
} else if($noidung == 't3' || $noidung == 'T3' ) {
    if($tachmgd2 == 123 || $tachmgd2 == 345 || $tachmgd2 == 456 || $tachmgd2 == 678 || $tachmgd2 == 789) {
    // trừ tiền 
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    // cộng tiền thắng
    $congtien = $money * $tyle3;
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') + $congtien,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  =>$congtien,
                    'game'  => 'Tổng 3 số',
                    'status'  => 'win',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "success",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận $congtien "]));
    } else { 
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                    'tong_tru'  => $MinhChien->users('tong_tru') + $money
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  => 0,
                    'game'  => 'Tổng 3 số',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));
    } 
}
else {
die(json_encode([
    "status" => "error",
    "msg" => "Nội Dung Không Hợp Lệ"]));  
}
}
}