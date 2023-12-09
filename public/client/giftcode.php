<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php'; ?>
<title><?=$MinhChien->site('tenweb');?> - <?=$MinhChien->site('motaweb');?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<marquee width="100%" behavior="scroll" style="display: block;
                    position: fixed;
                    top: 90px;
                    left: 15px;
                    z-index: 1000;
                    cursor: pointer;
                    width: 100%;">
                    <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000">
                        <b>CHẴN LẺ ZALOPAY SIÊU CẤP CHẴN LẺ 2023 Uy Tín Làm Nên Thương Hiệu !</b>
                    </font>
                    </marquee>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
						    <div class="card shadow">
						        <div class="card-body shadow row bg-light">
						            <div>
						                <h1 class="text-center h1">CHẴN LẺ ZALOPAY SIÊU CẤP CHẴN LẺ 2023</h1>
						                    <h3 class="text-center">Uy Tín Làm Nên Thương Hiệu !</h3><p></p>
						                    <!--MENU GAME (CÓ GAME KHÁC THÌ THÊM VÔ THÔI)-->
						                    <center>
						                    <?php include $_SERVER['DOCUMENT_ROOT'].'/config/slidegame.php'; ?>
						                    </center>
						            </div>
                                    <!-- NHẬP GIFTCODE -->
                            	        <div class="col-md-6 mt-6 text-center cl">
                        <div class="panel panel-primary">
                                    <div class="table-responsive shadow">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                                <tr role="row" class="bg-info">
                                                    <th class="text-center text-dark bg-info"><b>NHẬP GIFTCODE</b></th>
                                                </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all" id="phone-tablechung" class="">
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <div class="col-10 sm-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="exampleInputEmail1">Nhập Giftcode</label>
                                                            <input class="form-control" type="text" id="giftcode" placeholder="XNXX XXX XXX"><br>
                                                        </div>
                                                        <div>
                                                            <button type="submit" id="submit" class="btn btn-info">Xác Nhận</button>
                                                        </div>
                                                            </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- LỊCH SỬ GIFTCODE -->
                                    <div class="col-md-6 mt-6 text-center cl">
                        <div class="panel panel-primary">
                                    <div class="table-responsive shadow">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                                <tr role="row" class="bg-info">
                                                    <th class="text-center text-dark bg-info"><b>DANH SÁCH GIFTCODE ĐÃ NHẬP</b></th>
                                                </tr>
                                            </thead>
                                         <?php
                                                $list_code = $MinhChien->get_list("SELECT * FROM `lichsugiftcode` WHERE `username` = '".$MinhChien->users('username')."' ORDER BY id desc LIMIT 0, 10 ");
                                                foreach($list_code as $row) { ?>
                                                                <tbody role="alert" aria-live="polite" aria-relevant="all" id="phone-tablechung" class="">
                                                                    <tr>
                                                <td class="text-center"><?=$row['giftcode'];?></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- LỊCH SỬ CHƠI -->
                                <?php include $_SERVER['DOCUMENT_ROOT'].'/config/lichsuchoi.php'; ?>
                                    <!-- END -->
                                </div>
    						</div>
    					</div>
    				 </div>
    			</div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'giftcode'         : $("#giftcode").val()
	    };
		$.post("/api/giftcode", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#submit').html('Thanh Toán').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#submit').html('Thanh Toán').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<div class="content-backdrop fade"></div>
</div>
<!-- FULL HỆ THỐNG ĐƯỢC THIẾT KẾ VÀ DEV BỞI DEV5H -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php'; ?>