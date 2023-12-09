<?php
require('head.php'); 
require('nav.php');  
?>
<?php
if(isset($_GET['xuli'])) {
$xuli = $_GET['xuli'];
if ($system == 'demo') {
    echo '<script>Swal.fire("Thông Báo", "Bạn Không Thể Thao Tác Trên Trang Web Demo", "error");</script>';
} else {
$MinhChien->update("lichsuruttien", [
            'status' => 'xuli',
            ], " `trans_id` = '$xuli' ");
echo '<script type="text/javascript">location.href = "/admin/ruttien";</script>';
}
}

if(isset($_GET['thanhcong'])) {
$thanhcong = $_GET['thanhcong'];
 
$MinhChien->update("lichsuruttien", [
            'status' => 'thanhcong',
            ], " `trans_id` = '$thanhcong' ");
echo '<script type="text/javascript">location.href = "/admin/ruttien";</script>';
}

if(isset($_GET['thatbai'])) {
$thatbai = $_GET['thatbai'];
 
$MinhChien->update("lichsuruttien", [
            'status' => 'thatbai',
            ], " `trans_id` = '$thatbai' ");
echo '<script type="text/javascript">location.href = "/admin/ruttien";</script>';
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
                    <h3 class="card-title">LỊCH SỬ CHUYỂN TIỀN</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                   <th class="text-center">STT</th>
                            <th class="text-center">MÃ GIAO DỊCH</th>
                            <th class="text-center">SỐ TÀI KHOẢN</th>
                            <th class="text-center">SỐ TIỀN</th>
                            <th class="text-center">NGÂN HÀNG & VÍ ĐIỆN TỬ</th>
                            <th class="text-center">TRẠNG THÁI</th>
                            <th class="text-center">THỜI GIAN</th>
                            <th class="text-center">THAO TÁC</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$i = 1;
$check_bank = $MinhChien->query("SELECT * FROM `lichsuruttien` ORDER BY `id` DESC ");
while ($row = mysqli_fetch_array($check_bank) ) 
  {?>
                                <tr class="text-center">
                                    <td class="text-center"><?=$i++?></td>
                                    <td class="text-center"><?=$row['trans_id'];?></td>
                                    <td class="text-center"><?=$row['stk'];?></td>
                                    <td class="text-center"><?=tien($row['money']);?></td>
                                    <td class="text-center"><?=$row['bank'];?></td>
                                    <td class="text-center"><?=chuyentien($row['status']);?></td>
                                    <td class="text-center"><?=$row['time'];?></td>
                                    <td>
                                        <a href="?thanhcong=<?=$row['trans_id'];?>" class="btn btn-success btn-sm" id="thanhcong">Thành Công</a>
                                        <a href="?thatbai=<?=$row['trans_id'];?>" class="btn btn-danger btn-sm" id="thatbai">Thất Bại</a>
                                        <a href="?xuli=<?=$row['trans_id'];?>" class="btn btn-warning btn-sm" id="xuli">Xử Lí</a>
<?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</section>
<script type="text/javascript">
$(document).ready(function(){
		$('#thanhcong').click(function() {
		$('#thanhcong').html('Đang Xử Lí...').prop('disabled', true);
		var formData = {
            'status'           : $("#status").val()
	    };
	});
});
$(document).ready(function(){
		$('#thatbai').click(function() {
		$('#thatbai').html('Đang Xử Lí...').prop('disabled', true);
		var formData = {
            'status'           : $("#status").val()
	    };
	});
});
$(document).ready(function(){
		$('#xuli').click(function() {
		$('#xuli').html('Đang Xử Lí...').prop('disabled', true);
		var formData = {
            'status'           : $("#status").val()
	    };
	});
});
</script>
<?php require('foot.php'); ?>