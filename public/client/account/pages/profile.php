<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php'; 
if(empty($MinhChien->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>THÔNG TIN TÀI KHOẢN - <?=$MinhChien->site('tenweb');?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
 <div class="content-page rtl-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="d-flex align-items-center justify-content-between welcome-content">
                    <div class="navbar-breadcrumb">
                        <h4 class="mb-0"></h4>
                    </div>
                    <div class="">
                        <a class="button btn btn-skyblue button-icon"></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card mb-4">
                <div class="card-body">
                <div class="row">
                <div class="form-group col-md-12 mb-3">
                <label class="form-label" for="">Email</label>
                <input type="text" class="form-control" value="<?=$MinhChien->users('email');?>" readonly="">
                </div>
                <div class="form-group col-md-6 mb-3">
                <label class="form-label" for="">Tài Khoản</label>
                <input type="text" class="form-control" value="<?=$MinhChien->users('username');?>" readonly="">
                </div>
                <div class="form-group col-md-6 mb-3">
                <label class="form-label" for="">Số Dư</label>
                <input type="text" class="form-control" value="<?=tien($MinhChien->users('money'));?>" readonly="">
                </div>
                <div class="form-group col-md-6 mb-3">
                <label class="form-label" for="">Tổng Nạp</label>
                <input type="text" class="form-control" value="<?=tien($MinhChien->users('tong_nap'));?>" readonly="">
                </div>
                <div class="form-group col-md-6 mb-3">
                <label class="form-label" for="">Tổng Đã Chơi</label>
                <input type="text" class="form-control" value="<?=tien($MinhChien->users('tong_tru'));?>" readonly="">
                </div>
                <div class="form-group col-md-6 mb-3">
                <label class="form-label" for="">Cấp Độ</label>
                <input type="text" class="form-control" value="<?=level($MinhChien->users('level'));?>" readonly="">
                </div>
                <div class="form-group col-md-6 mb-3">
                <label class="form-label" for="">Thời Gian Tham Gia</label>
                <input type="text" class="form-control" value="<?=$MinhChien->users('time');?>" readonly="">
                </div>
                </div>
                </div>
                </div>
                </div>
            <div class="col-md-6">
                <div class="card mb-4">
                <div class="card-body">
                <div class="mb-3">
                <label class="form-label">Mật Khẩu Cũ</label>
                <input type="password" class="form-control" id="password" placeholder="Nhập Mật Khẩu Cũ">
                </div>
                <div class="mb-3">
                <label class="form-label">Mật Khẩu Mới</label>
                <input type="password" class="form-control" id="password1" placeholder="Nhập Mật Khẩu Mới">
                </div>
                <div class="mb-3">
                <label class="form-label">Nhập Lại Mật Khẩu Mới</label>
                <input type="password" class="form-control" id="password2" placeholder="Nhập Lại Mật Khẩu Mới">
                </div>
                <div class="d-grid gap-2">
                <button type="submit" class="btn btn-info btn-block" id="doipass"><i class="fa fa-lock"></i> Lưu Thay Đổi</button>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div><br><br><br><br><br><br><p></p>
<script>
function thaypass() {
$('#editPass').modal('show');
}
$(document).ready(function(){
		$('#doipass').click(function() {
		$('#doipass').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'password'    : $("#password").val(),
            'password1'   : $("#password1").val(),
            'password2'   : $("#password2").val()
		};
		$.post("/api/profile/changePassword", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#doipass').html('<i class="ri-lock-line"></i> Thay Đổi').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "/" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#doipass').html('<i class="ri-lock-line"></i> Thay Đổi').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>