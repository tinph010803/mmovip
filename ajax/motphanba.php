<?php require('../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
die();
} else {
$noidung = check_string($_POST['noidung']);
$money   = check_string($_POST['money']);
$check = $MinhChien->get_row("SELECT * FROM `motphanba` WHERE `data` = 'N1' ");
$check2 = $MinhChien->get_row("SELECT * FROM `motphanba` WHERE `data` = 'N2' ");
$check3 = $MinhChien->get_row("SELECT * FROM `motphanba` WHERE `data` = 'N3' ");
$check0 = $MinhChien->get_row("SELECT * FROM `motphanba` WHERE `data` = 'N0' ");
$tyle = $check['tyle'];$tyle2 = $check2['tyle'];$tyle3 = $check3['tyle'];$tyle0 = $check0['tyle'];
$min = $check['min'];   ////min 
$max = $check['max'];  ////max 
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
if($noidung == 'n1' || $noidung == 'N1') {
    if($tachmgd == 1 || $tachmgd == 2 || $tachmgd == 3 ) {
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
                    'game'  => '1 Phần 3',
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
                    'game'  => '1 Phần 3',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));
    } 
} else if ($noidung == 'n2' || $noidung == 'N2' ) {
    if($tachmgd == 4 || $tachmgd == 5 || $tachmgd == 6 ) {
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
                    'game'  => '1 Phần 3',
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
                    'game'  => '1 Phần 3',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));
    } 
} else if($noidung == 'n3' || $noidung == 'N3' ) {
    if($tachmgd == 7 || $tachmgd == 8 || $tachmgd == 9) {
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
                    'game'  => '1 Phần 3',
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
                    'game'  => '1 Phần 3',
                    'status'  => 'lose',
                    'time'  => $time
                ], " `username` = '".$MinhChien->users('username')."' ");
    die(json_encode([
        "status" => "error",
        "msg" => "Mã Giao Dịch $mgd Tiền Nhận 0 "]));
    } 
} else if($noidung == 'n0' || $noidung == 'N0' ) {
    if($tachmgd == 0) {
    // trừ tiền 
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') - $money,
                ], " `username` = '".$MinhChien->users('username')."' ");
    // cộng tiền thắng
    $congtien = $money * $tyle0;
    $MinhChien->update("users", [
                    'money'  => $MinhChien->users('money') + $congtien,
                ], " `username` = '".$MinhChien->users('username')."' ");
    $MinhChien->insert("lichsuchoi", [
                    'trans_id'  => $mgd,
                    'username'  => $MinhChien->users('username'),
                    'noidung'  => $noidung,
                    'money'  => $money,
                    'tiennhan'  =>$congtien,
                    'game'  => '1 Phần 3',
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
                    'game'  => '1 Phần 3',
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