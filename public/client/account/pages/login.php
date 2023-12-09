<?php include $_SERVER['DOCUMENT_ROOT'].'/config/config.php'; 
if($MinhChien->users('username')) {
echo "<script>location.href = '/'</script>";
}
?>
<!doctype html>
<html lang="en" dir="">
<head>
        <title>ĐĂNG NHẬP TÀI KHOẢN</title>
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
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/public/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="/assets/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <script src="/assets/js/minhchien.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="/assets/src/scripts/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!-- SCRIPT ALERT-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" integrity="sha512-XVz1P4Cymt04puwm5OITPm5gylyyj5vkahvf64T8xlt/ybeTpz4oHqJVIeDtDoF5kSrXMOUmdYewE4JS/4RWAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
	<img class="wave" src="https://<?=$_SERVER['SERVER_NAME'];?>/public/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="https://<?=$_SERVER['SERVER_NAME'];?>/public/img/bg.svg">
		</div>
		<div class="login-content">
			<form action="/">
				<img src="https://<?=$_SERVER['SERVER_NAME'];?>/public/img/avatar.svg">
				<h4 class="title">Chào Mừng Trở Lại</h4>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" id="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" id="password">
            	   </div>
            	</div></br>
            	<a href="https://<?=$_SERVER['SERVER_NAME'];?>/auth/register">Đăng Kí Ngay</a>
            	<input type="submit" id="login" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/public/js/main.js"></script>
</body>




<script>
$(document).ready(function(){
		$('#login').click(function() {
		$('#login').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
	    'type'        : 'login',
            'username'    : $("#username").val(),
            'password'    : $("#password").val()
		};
		$.post("/api/profile/AuthForm", formData,
			function (data) {
			    if(data.status == 'error') {
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#login').html('Đăng Nhập').prop('disabled', false);
			    } else if(data.status == 'Mail') {
			    $('#verimail').modal('show');
				$('#login').html('Đăng Nhập').prop('disabled', false);
			    } else if(data.status == 'Pass') {
			    $('#veripass').modal('show');
				$('#login').html('Đăng Nhập').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "/" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#login').html('Đăng Nhập').prop('disabled', false);
			    }
		}, "json");
	});
});
</script> 