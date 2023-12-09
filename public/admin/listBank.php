<?php
require('head.php'); 
require('nav.php'); 

if(isset($_GET['xoa'])) {
$id = $_GET['xoa'];
if($system == 'demo') {
    echo '<script>swal.fire("Thông Báo", "Bạn Đéo Thể Thao Tác Trên Trang Web Demo", "error");setTimeout(function(){ location.href = "/admin/bank" },500);</script>';
} else {
$MinhChien->xoa("bank", "`id` = '$id' ");
    echo '<script>swal.fire("Thông Báo", "Xóa Thành Công", "success");setTimeout(function(){ location.href = "/admin/bank" },500);</script>';
}
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
                    <h3 class="card-title">DANH SÁCH NGÂN HÀNG</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>LOGO</th>
                                    <th>CHỦ TÀI KHOẢN</th>
                                    <th>SỐ TÀI KHOẢN</th>
                                    <th>NẠP TỐI THIỂU</th>
                                    <th>THAO TÁC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
  $i = 1;
  $user = $MinhChien->query("SELECT * FROM `bank` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user) ) 
  {?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><img src="<?=$row1['img'];?>" height="45px" alt="LOGO BANK"></td>
                                    <td><?=$row1['ctk'];?></td>
                                    <td><?=$row1['stk'];?></td>
                                    <td><?=tien($row1['toi_thieu']);?></td>
                                    <td><a href="?xoa=<?=$row1['id'];?>" class="btn btn-danger btn-sm">XÓA</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                <a type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">THÊM NGÂN HÀNG</a>
              </div>
            </div>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">THÊM NGÂN HÀNG</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">LOGO NGÂN HÀNG</label>
                    <input type="text" class="form-control" id="img" placeholder="Logo ngân hàng" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">SỐ TÀI KHOẢN</label>
                    <input type="text" class="form-control" id="stk" placeholder="Số tài khoản" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CHỦ TÀI KHOẢN</label>
                    <input type="text" class="form-control" id="ctk" placeholder="Tên chủ tài khoản" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">TỐI THIỂU BANK</label>
                    <input type="number" class="form-control" id="toi_thieu" placeholder="Số tiền bank tối thiểu" required="">
                  </div>        
            </div>
            <input type="hidden" id="token" value="<?= $_SESSION['token']; ?>" />
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
              <button type="submit" id="submit" class="btn btn-primary">XÁC NHẬN</button>
            </div>
            </form>
          </div>
        </div>
      </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'token'      : $("#token").val(),
            'img'       : $("#img").val(),
            'stk'        : $("#stk").val(),
            'ctk'        : $("#ctk").val(),
            'toi_thieu'  : $("#toi_thieu").val()
		};
		$.post("/api/admin/Bank", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('<b style="color: black">Thông Báo</b>', data.msg, data.status);
				$('#submit').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('<b style="color: black">Thông Báo</b>', data.msg, data.status);
			     $('#submit').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
    </section>
        </section>
<?php require('foot.php'); ?>