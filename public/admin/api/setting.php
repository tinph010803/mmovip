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
               "msg" => "Bug cai dcmm :)"
            ]));
        }
    if ($getUser['level'] != 3) {
     die(json_encode([
              "status" => "error",
               "msg" => "Khoe token ak dcmm :)))"
            ]));
       }
$tenweb             = check_string($_POST['tenweb']);
$motaweb            = check_string($_POST['motaweb']);
$logo               = check_string($_POST['logo']);
$biaweb             = check_string($_POST['biaweb']);
$faviconweb         = check_string($_POST['faviconweb']);
$keywordweb         = check_string($_POST['keywordweb']);
$apizalopay         = check_string($_POST['apizalopay']);
$apimomo            = check_string($_POST['apimomo']);
$apimbbank          = check_string($_POST['apimbbank']);
$apitsr             = check_string($_POST['apitsr']);
$status_website     = check_string($_POST['status_website']);
$modal              = check_string($_POST['modal']);
$contacttele        = check_string($_POST['contacttele']);
$contactzalo        = check_string($_POST['contactzalo']);

if($system == 'demo') {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Thể Thao Tác Trên Trang Web Demo"]));
} else {
if($status_website == '1') {
    $number_stt = '1';
}
else if($status_website == '0'){
    $number_stt = '0';
}
$MinhChien->update("settings", [
            'tenweb'     => $tenweb,
            'logo' => $logo,
            'biaweb'     => $biaweb,
            'faviconweb'     => $faviconweb,
            'motaweb'     => $motaweb,
            'keywordweb'   => $keywordweb,
            'status_website'   => $number_stt,
            'apizalopay'    => $apizalopay,
            'apimomo'    => $apimomo,
            'apimbbank'    => $apimbbank,
            'apitsr'    => $apitsr,
            'modal'    => $modal,
            'contacttele' => $contacttele,
            'contactzalo' => $contactzalo
            
            ], " `id` = '1' ");
die(json_encode([
    "status" => "success",
    "msg" => "Đã Lưu Thành Công"]));
}
}