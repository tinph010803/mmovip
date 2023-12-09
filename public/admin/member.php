<?php
require('head.php'); 
require('nav.php');  
?>
<?php
if(isset($_GET['bannd'])) {
$bannd = $_GET['bannd'];
if ($system == 'demo') {
    echo '<script>Swal.fire("Thông Báo", "Bạn Không Thể Thao Tác Trên Trang Web Demo", "error");</script>';
} else {
$MinhChien->update("users", [
            'bannd' => '1',
            ], " `username` = '$bannd' ");
echo '<script type="text/javascript">location.href = "/admin/member";</script>';
}
}

if(isset($_GET['unband'])) {
$unband = $_GET['unband'];
 
$MinhChien->update("users", [
            'bannd' => '0',
            ], " `username` = '$unband' ");
echo '<script type="text/javascript">location.href = "/admin/member";</script>';
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
                    <h3 class="card-title">NHẬT KÝ HOẠT ĐỘNG</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>USERNAME</th>
                                    <th>TỔNG NẠP</th>
                                    <th>SỐ DƯ HIỆN CÓ</th>
                                    <th>ĐÃ TIÊU</th>
                                    <th>EMAIL</th>
                                    <th>TRẠNG THÁI</th>
                                    <th>LAST TIME</th>
                                    <th>THAO TÁC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
  $i = 1;
  $user = $MinhChien->query("SELECT * FROM `users` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user) ) 
  {?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row1['username'];?></td>
                                    <td><?=tien($row1['tong_nap']);?></td>
                                    <td><?=tien($row1['money']);?></td>
                                    <td><?=tien($row1['tong_tru']);?></td>
                                    <td><?=$row1['email'];?></td>
                                    <td><?=statru_user($row1['bannd']);?></td>
                                    <td><?=$row1['lastdate'];?></td>
                                    <td><?php if($row1['bannd'] == "0") { ?><a href="?bannd=<?=$row1['username'];?>" class="btn btn-danger btn-sm">Đình Chỉ</a><?php } else { ?><a href="?unband=<?=$row1['username'];?>" class="btn btn-success btn-sm">Mở Khóa</a><?php } ?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</section>
<?php require('foot.php'); ?>