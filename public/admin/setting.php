<?php
require('head.php'); 
require('nav.php');
if($MinhChien->site('status_website') == 1 ) {
    $status = 'ON';
} else {
    $status = 'OFF';
}
?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
        </div>
    </div>
<section class="col-lg-12 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CÀI ĐẶT WEBSITE</h3>
        </div>
    <div class="card-body">
        <div class="form-group">
            <label class="form-label">TÊN WEBSITE <b style="color: red">*</b></label>
            <input type="text" class="form-control" id="tenweb" placeholder="Nhập Tên Website" value="<?=$MinhChien->site('tenweb');?>">
        </div>
        
         <div class="form-group">
            <label class="form-label">MÔ TẢ WEBSITE <b style="color: red">*</b></label>
            <textarea type="text" class="form-control" id="motaweb" rows="5" placeholder="Nhập Mô Tả Website"><?=$MinhChien->site('motaweb');?></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">LOGO WEBSITE<b style="color: red">*</b></label>
            <input type="url" class="form-control" id="logo" placeholder="Nhập Link Ảnh Logo" value="<?=$MinhChien->site('logo');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">ẢNH BÌA WEBSITE</label>
            <input type="url" class="form-control" id="biaweb" placeholder="Nhập Link Ảnh Bìa" value="<?=$MinhChien->site('biaweb');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">FAVICON WEBSITE</label>
            <input type="url" class="form-control" id="faviconweb" placeholder="Nhập Link Ảnh Nhỏ" value="<?=$MinhChien->site('faviconweb');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">KEYWORD TÌM KIẾM</label>
            <textarea type="text" class="form-control" id="keywordweb" rows="5" placeholder="Nhập Từ Khóa Website"><?=$MinhChien->site('keywordweb');?></textarea>
        </div>
        
        <div class="form-group" >
            <label class="form-control-label" for="input-email">BẢO TRÌ HỆ THỐNG</label>
            <select id="status_website" class="form-control">
                <option><?=$status;?></option>
                <option value="1">ON</option>
                <option value="0">OFF</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">HỖ TRỢ TELEGRAM <b style="color: red">*</b></label>
            <input type="text" class="form-control" id="contacttele" placeholder="Nhập Link Hỗ Trợ Telegram" value="<?=$MinhChien->site('contacttele');?>">
        </div>
        <div class="form-group">
            <label class="form-label">HỖ TRỢ ZALO <b style="color: red">*</b></label>
            <input type="text" class="form-control" id="contactzalo" placeholder="Nhập Link Hỗ Trợ Zalo" value="<?=$MinhChien->site('contactzalo');?>">
        </div>
        <div class="form-group">
            <label class="form-label">API ZALOPAY ( API.SIEUTHICODE.NET )</label>
            <input type="text" class="form-control" id="apizalopay" rows="5" placeholder="Nhập Key API Vào Đây" value="<?=$MinhChien->site('apizalopay');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">API MOMO ( API.SIEUTHICODE.NET )</label>
            <input type="text" class="form-control" id="apimomo" rows="5" placeholder="Nhập Key API Vào Đây" value="<?=$MinhChien->site('apimomo');?>">
        </div>
        <input type="hidden" id="token" value="<?= $_SESSION['token']; ?>" />
        <div class="form-group">
            <label class="form-label">API MBBANK ( API.SIEUTHICODE.NET )</label>
            <input type="text" class="form-control" id="apimbbank" rows="5" placeholder="Nhập Key API Vào Đây" value="<?=$MinhChien->site('apimbbank');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">API THESIEURE ( API.SIEUTHICODE.NET )</label>
            <input type="text" class="form-control" id="apitsr" rows="5" placeholder="Nhập Key API Vào Đây" value="<?=$MinhChien->site('apitsr');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">THÔNG BÁO WEBSITE</label>
            <textarea type="text" class="form-control" id="modal" rows="5" placeholder="Nhập Từ Khóa Tìm Kiếm Để SEO"><?=$MinhChien->site('modal');?></textarea>
        </div>
        
        
        <div class="form-group">
            <button type="button" id="submit" class="btn btn-success btn-block">Xác Nhận</button>
        </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'token'         : $("#token").val(),
            'tenweb'        : $("#tenweb").val(),
            'motaweb'       : $("#motaweb").val(),
            'logo'          : $("#logo").val(),
            'biaweb'        : $("#biaweb").val(),
            'faviconweb'    : $("#faviconweb").val(),
            'keywordweb'    : $("#keywordweb").val(),
            'status_website': $("#status_website").val(),
            'apizalopay'    : $("#apizalopay").val(),
            'apimomo'       : $("#apimomo").val(),
            'apimbbank'     : $("#apimbbank").val(),
            'apitsr'        : $("#apitsr").val(),
            'modal'         : $("#modal").val(),
            'contacttele'   : $("#contacttele").val(),
            'contactzalo'   : $("#contactzalo").val() 
		};
		$.post("/api/admin/setting", formData,
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
</section>
</section>
<?php require('foot.php'); ?>