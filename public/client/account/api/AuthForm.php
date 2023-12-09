<?php require('../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
if($_POST['type'] == "login") {
$username = check_string($_POST['username']);
$password = check_string($_POST['password']);

$check_user = $MinhChien->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");

if(empty($username) || empty($password)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if(!$check_user) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Không Tồn Tại"]));
} else if($check_user['password'] !== md5($password)) {
die(json_encode([
    "status" => "error",
    "msg" => "Mật Khẩu Không Chính Xác"]));
} else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Không Được Chứa Kí Tự Đặt Biệt"]));
} else if($check_user['bannd'] > '1') {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Đã Bị Band Vì Vi Phạm Tiêu Chuẩn Cộng Đồng"]));
} else {
        
$MinhChien->insert("log_site", [
                'username'   => $username,
                'type'       => 'login',
                'note'       => 'Đăng Nhập Vào Hệ Thống',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
sendTele(templateTele('Người Dùng ' . $username . ' Vừa Đăng Nhập Thành Công Vào Hệ Thống Với Địa Chỉ IP Là ' . getip()));
  setcookie("username", $username, 0, "/");
  setcookie("token", $check_user['token'], 0, "/");
  $_SESSION['username'] = $username;
  $_SESSION['token'] = $check_user['token'];

die(json_encode([
    "status" => "success",
    "msg" => "Đăng Nhập Thành Công"]));
}
}

if($_POST['type'] == "signup") {
$email    = check_string($_POST['email']);
$username = check_string($_POST['username']);
$password = check_string($_POST['password']);

$check_user = $MinhChien->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");

$check_email = $MinhChien->get_row("SELECT * FROM `users` WHERE `email` = '$email' ");

if(empty($username) || empty($password) || empty($email)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($check_user) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Đã Tồn Tại Trên Hệ Thống"]));
} else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Không Được Chứa Kí Tự Đặt Biệt"]));
} else if($check_email) {
die(json_encode([
    "status" => "error",
    "msg" => "Email Đã Tồn Tại Trên Hệ Thống"]));
} else if(strlen($username) < 6 ) {
die(json_encode([
    "status" => "error",
    "msg" => "Tên Đăng Nhập Phải Có Tối Thiểu 6 Ký Tự"]));
} else if(strlen($password) < 6 ) {
die(json_encode([
    "status" => "error",
    "msg" => "Mật Khẩu Phải Có Tối Thiểu 6 Ký Tự"]));
}  else {
$passmd5 = md5($password);
$token = md5(time());
$MinhChien->insert("users", [
                'username'      => $username,
                'password'      => $passmd5,
                'email'         => $email,
                'token'         => $token,
                'tong_nap'      => '0',
                'money'         => '0',
                'tong_tru'      => '0',
                'level'         => '0',
                'bannd'         => '0',
                'lastdate'      => $time,
                'url_config'    => 'CODEXITRUM.COM',
                'time'          => $time
                ]);
sendTele(templateTele('Người Dùng ' . $username . ' Vừa Đăng Ký Tài Khoản Thành Công Trên Hệ Thống Với Địa Chỉ IP Là ' . getip()));
  setcookie("username", $username, 0, "/");
  setcookie("token", $token, 0, "/");
  $_SESSION['username'] = $username;
  $_SESSION['token'] = $token;

die(json_encode([
    "status" => "success",
    "msg" => "Đăng Ký Tài Khoản Thành Công"]));
}
}

}