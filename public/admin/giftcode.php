<?php
require('head.php'); 
require('nav.php'); 

if(isset($_GET['xoa'])) {
$id = $_GET['xoa'];
if($system == 'demo') {
    echo '<script>swal.fire("Thông Báo", "Bạn Đéo Thể Thao Tác Trên Trang Web Demo", "error");setTimeout(function(){ location.href = "/admin/giftcode" },500);</script>';
} else {
$MinhChien->xoa("giftcode", "`id` = '$id' ");
    echo '<script>swal.fire("Thông Báo", "Xóa Thành Công", "success");setTimeout(function(){ location.href = "/admin/giftcode" },500);</script>';
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
                    <h3 class="card-title">DANH SÁCH GIFTCODE</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>MÃ CODE</th>
                                    <th>TỐI THIỂU NHẬN</th>
                                    <th>TỐI ĐA NHẬN</th>
                                    <th>LƯỢT NHẬP</th>
                                    <th>THAO TÁC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
  $i = 1;
  $user = $MinhChien->query("SELECT * FROM `giftcode` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user) ) 
  {?>
                                <tr class="text-center">
                                    <td><?=$row1['id'];?></td>
                                    <td><?=$row1['giftcode'];?></td>
                                    <td><?=tien($row1['giatri1']);?></td>
                                    <td><?=tien($row1['giatri2']);?></td>
                                    <td><?=$row1['luot'];?></td>
                                    <td><a href="?xoa=<?=$row1['id'];?>" class="btn btn-danger btn-sm">XÓA</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                <a type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">THÊM GIFTCODE</a>
              </div>
            </div>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">THÊM GIFTCODE</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">MÃ CODE</label>
                    <input type="text" class="form-control" id="giftcode" placeholder="XXX XXXX XXX" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">TỐI THIỂU NHẬN </label>
                    <input type="text" class="form-control" id="giatri1" placeholder="100.000" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">TỐI ĐA NHẬN </label>
                    <input type="text" class="form-control" id="giatri2" placeholder="500.000" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">LƯỢT NHẬP</label>
                    <input type="text" class="form-control" id="luot" placeholder="8" required="">
                  </div>
                  <input type="hidden" id="token" value="<?= $_SESSION['token']; ?>" />
            </div>
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
            'token'    : $("#token").val(),
            'giftcode' : $("#giftcode").val(),
            'giatri1'  : $("#giatri1").val(),
            'giatri2'  : $("#giatri2").val(),
            'luot'     : $("#luot").val()
		};
		$.post("/api/admin/giftcode", formData,
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