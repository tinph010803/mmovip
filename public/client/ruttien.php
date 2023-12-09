<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';?>
<title>RÚT TIỀN - <?=$MinhChien->site('tenweb');?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php';?>
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
                <div class="col-md-12">
                <div class="card mb-4">
                <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                <div class="alert text-white bg-danger mb-3" role="alert">
                <?php $check_phi = $MinhChien->get_row("SELECT * FROM `ruttien` WHERE `id` = '1' "); ?>
                Rút Tối Thiểu <?=tien($check_phi['min']);?> Và Tối Đa <?=tien($check_phi['max']);?><br>
                Nếu Sau Khi Rút Mà Chưa Nhận Được Tiền Vui Lòng Liên Hệ ADMIN (HỆ THỐNG DUYỆT TRONG VÒNG 2P-1P-TRỪ LÚC QUÁ NHIỀU ĐƠN SẼ MẤT HƠN 2H)<br>
                </div>
                </div>
                <!-- START -->
                <div class="col-md-12">
                <div class="card mb-4">
                <div class="row">
                <div class="col-12 mb-3">
                <label class="form-label">SỐ TÀI KHOẢN ( <a class="text-danger">RÚT VỀ ALL NGÂN HÀNG & VÍ ĐIỆN TỬ</a> )</label>
                <input type="number" class="form-control" id="stk" placeholder="Nhập Số Tài Khoản">
                </div>
                <div class="col-12 mb-3">
                <label class="form-label">SỐ TIỀN RÚT</label>
                <input type="number" class="form-control" id="money" placeholder="Số Tiền Tối Thiểu Là <?=tien($check_phi['min']);?>">
                </div>
                <div class="col-12 mb-3">
                <label class="form-label">NGÂN HÀNG</label>
                <input type="text" class="form-control" id="bank" placeholder=" Ghi ngân hàng hoặc ví điện tử muốn rút tiền về !)">
                </div>
                <div class="col-12 mb-3">
                <label class="form-label">SỐ DƯ KHẢ DỤNG</label>
                <b class="text-danger h6"><?=tien($MinhChien->users('money'));?></b>
                </div>
                <input type="hidden" id="token" value="<?= $_SESSION['token']; ?>" />
                <div class="d-grid col-12  gap-2">
                <button type="submit" class="btn btn-info btn-block" id="ruttien"><i class="fa fa-check"></i>Xác Nhận</button>
                </div>
                </div>
                </div>
                </div>
                <!-- END -->
            </div>
        </div>
    </div>
</div>
 <div class="col-md-12 mt-8 text-center mb-xl-20">
                        <div class="panel panel-primary">
                                    <div class="table-responsive shadow">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                                <tr role="row" class="bg-info">
                                                    <th class="text-center text-dark bg-info"><b>STT</b></th>
                                                    <th class="text-center text-dark bg-info"><b>TRANS_ID</b></th>
                                                    <th class="text-center text-dark bg-info"><b>SỐ TÀI KHOẢN</b></th>
                                                    <th class="text-center text-dark bg-info"><b>SỐ TIỀN</b></th>
                                                    <th class="text-center text-dark bg-info"><b>NGÂN HÀNG & VÍ ĐIỆN TỬ</b></th>
                                                    <th class="text-center text-dark bg-info"><b>TRẠNG THÁI</b></th>
                                                    <th class="text-center text-dark bg-info"><b>THỜI GIAN</b></th>
                                                </tr>
                                            </thead>
                                         <?php
                                                $i = 1;
                                                $list_mua = $MinhChien->get_list("SELECT * FROM `lichsuruttien` WHERE `username` = '".$MinhChien->users('username')."' ORDER BY id desc LIMIT 0, 10 ");
                                                foreach($list_mua as $row) { ?>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all" id="phone-tablechung" class="">
                                                                    <tr>
                                                <td class="text-center"><?=$i++?></td>
                                                <td class="text-center"><?=$row['trans_id'];?></td>
                                                <td class="text-center"><?=$row['stk'];?></td>
                                                <td class="text-center"><?=tien($row['money']);?></td>
                                                <td class="text-center"><?=$row['bank'];?></td>
                                                <td class="text-center"><?=chuyentien($row['status']);?></td>
                                                <td class="text-center"><?=$row['time'];?></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- br hơi nhiều :D -->
                                    <br><br><br><br><br><br><br><br><br> 
                                     <!-- br hơi nhiều :D -->
                                </div>
                                    </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#ruttien').click(function() {
		$('#ruttien').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'token'           : $("#token").val(),
            'stk'           : $("#stk").val(),
            'money'         : $("#money").val(),
            'bank'       : $("#bank").val()
	    };
		$.post("/api/ruttien", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#ruttien').html('Thanh Toán').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#ruttien').html('Thanh Toán').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<div class="content-backdrop fade"></div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>