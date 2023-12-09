<?php require('../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$password  = check_string($_POST['password']);
$password1 = check_string($_POST['password1']);
$password2 = check_string($_POST['password2']);

if(empty($username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if($system == 'demo') {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Thể Thao Tác Trên Trang Web Demo"]));
} else if(empty($password) || empty($password1) || empty($password2)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if(md5($password) !== $MinhChien->users('password')) {
die(json_encode([
    "status" => "error",
    "msg" => "Mật Khẩu Cũ Không Chính Xác"]));
} else if($password1 !== $password2) {
die(json_encode([
    "status" => "error",
    "msg" => "Mật Khẩu Mới Không Giống Nhau"]));
} else {
$MinhChien->insert("log_site", [
                'username'   => $username,
                'type'       => 'password',
                'note'       => 'Đã Đổi Mật Khẩu Tài Khoản',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
$passmd5ok = md5($password2);
$MinhChien->update("users", [
            'password' => $passmd5ok,
            ], " `username` = '$username' ");
sendTele(templateTele('Người Dùng ' . $username . ' Vừa Đổi Mật Khẩu Thành Công Trên Hệ Thống Với Địa Chỉ IP Là ' . getip()));
die(json_encode([
    "status" => "success",
    "msg" => "Đổi Mật Khẩu Thành Công"]));
}
}