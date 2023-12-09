<?php
require('head.php'); 
require('nav.php'); 
?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
        </div>
    </div>
<section class="col-lg-12 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CHỈNH SỬA NỘI DUNG NẠP TIỀN</h3>
        </div>
    <div class="card-body">
        <div class="form-group">
            <label class="form-label">NỘI DUNG NẠP TIỀN <b style="color: red">*</b></label>
            <input type="text" class="form-control" id="noidung_nt" placeholder="Nhập Tên Website" value="<?=$MinhChien->options('noidung_nt');?>">
            <input type="hidden" id="token" value="<?= $_SESSION['token']; ?>"  />
        </div>
        <div class="form-group">
            <button type="button" id="submit" class="btn btn-success btn-block">Lưu Lại</button>
        </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'token'      : $("#token").val(), 
            'noidung_nt' : $("#noidung_nt").val()
		};
		$.post("/api/admin/noidungnaptien", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('<b style="color: black">Thông Báo</b>', data.msg, data.status);
				$('#submit').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },1000);
			     Swal.fire('<b style="color: black">Thông Báo</b>', data.msg, data.status);
			     $('#submit').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
</div>
</div>
</section></section>
<?php require('foot.php'); ?>