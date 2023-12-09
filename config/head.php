<?php require('config.php');
if(!$username) {
header('Location: /auth/login');
exit;
}
elseif($MinhChien->site('status_website') != 0){
header('Location: /baotri.html');
}
?>
<!doctype html>
<html lang="en" dir="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?=$MinhChien->site('keywordweb');?>">
    <meta name="description" content="<?=$MinhChien->site('tenweb');?> - <?=$MinhChien->site('motaweb');?> ">
    <meta name="author" content="<?=$_SERVER['SERVER_NAME'];?>">
    <link id="favicon" rel="icon" type="image/png" sizes="16x16" href="<?=$MinhChien->site('faviconweb');?>">
    <meta name="Classification" content="website">
    <meta name="page-topic" content="<?=$MinhChien->site('keywordweb');?>">
    <meta http-equiv="content-language" content="vi">
    <meta name="geo.placename" content="Viet Nam">
    <meta name="copyright" content="Copyright (c) by <?=$_SERVER['SERVER_NAME'];?> - <?=date('Y');?>">
    <meta name="robots" content="index,follow">
    <meta name="resource-type" content="document">
    <meta name="distribution" content="Local">
    <meta name="revisit-after" content="1 days">
    <meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=utf-8">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?=$MinhChien->site('tenweb');?> - <?=$MinhChien->site('motaweb');?>">
    <meta property="og:description" content="<?=$MinhChien->site('motaweb');?>">
    <meta property="og:site_name" content="<?=$MinhChien->site('tenweb');?> - <?=$MinhChien->site('motaweb');?>">
    
    <!-- Favicon -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="assets/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<script src="assets/js/minhchien.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/src/scripts/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- SCRIPT ALERT-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" integrity="sha512-XVz1P4Cymt04puwm5OITPm5gylyyj5vkahvf64T8xlt/ybeTpz4oHqJVIeDtDoF5kSrXMOUmdYewE4JS/4RWAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/all.min.js" integrity="sha512-Cvxz1E4gCrYKQfz6Ne+VoDiiLrbFBvc6BPh4iyKo2/ICdIodfgc5Q9cBjRivfQNUXBCEnQWcEInSXsvlNHY/ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head> 
            
