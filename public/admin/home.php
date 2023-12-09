<?php
require('head.php'); 
require('nav.php'); 
?>

<?php 
$total_money = $MinhChien->get_row("SELECT SUM(`money`) FROM `users` WHERE `money` >= 0 ") ['SUM(`money`)'];

$total_nap = $MinhChien->get_row("SELECT SUM(`tong_nap`) FROM `users` WHERE `tong_nap` >= 0 ") ['SUM(`tong_nap`)'];

$total_tru = $MinhChien->get_row("SELECT SUM(`money`) FROM `lichsuchoi` WHERE `money` >= 0 ") ['SUM(`money`)'];

$total_thanhvien = $MinhChien->get_row("SELECT COUNT(*) FROM `users` ") ['COUNT(*)'];

$total_bank = $MinhChien->get_row("SELECT COUNT(*) FROM `bank` ") ['COUNT(*)'];

$total_napbank = $MinhChien->get_row("SELECT COUNT(*) FROM `history_bank` ") ['COUNT(*)'];

$total_lsgame = $MinhChien->get_row("SELECT COUNT(*) FROM `lichsuchoi` ") ['COUNT(*)'];

$tienchoi = $MinhChien->get_row("SELECT SUM(`money`) FROM `lichsuchoi` WHERE YEAR(time) = ".date('Y')." AND MONTH(time) = ".date('m')." ")['SUM(`money`)'];

$tienchoi2 = $MinhChien->get_row("SELECT SUM(`money`) FROM `lichsuchoi` WHERE WEEK(time, 1) = WEEK(CURDATE(), 1) ")['SUM(`money`)'];

$tienchoi3 = $MinhChien->get_row("SELECT SUM(`money`) FROM `lichsuchoi` WHERE `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`money`)'];

$tientra = $MinhChien->get_row("SELECT SUM(`tiennhan`) FROM `lichsuchoi` WHERE YEAR(time) = ".date('Y')." AND MONTH(time) = ".date('m')." ")['SUM(`tiennhan`)'];

$tientra2 = $MinhChien->get_row("SELECT SUM(`tiennhan`) FROM `lichsuchoi` WHERE WEEK(time, 1) = WEEK(CURDATE(), 1) ")['SUM(`tiennhan`)'];

$tientra3 = $MinhChien->get_row("SELECT SUM(`tiennhan`) FROM `lichsuchoi` WHERE `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`tiennhan`)']; 

$doanhthu = $tienchoi - $tientra;

$doanhthu2 = $tienchoi2 - $tientra2;

$doanhthu3 = $tienchoi3 - $tientra3;

?>
    <section class="content">
      <div class="container-fluid">
          <div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Thông Báo</h5>
Đã Cập Nhập Thành Công Phiên Bản 1.0.2
</div>
        <div class="row">
      <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title"><b>THÔNG KÊ THÁNG <?=date('m')?></b></h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <div class="rounded iq-card-icon bg-primary-light"><i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                        <?=tien($tienchoi);?></span>
                                        <span class="text-muted"><b>TỔNG TIỀN ĐÃ CHƠI</b></span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <div class="rounded iq-card-icon bg-danger-light"><i class="fas fa-money-bill-alt"></i>
                                    </div>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                        <?=tien($tientra);?></span>
                                        <span class="text-muted"><b>TỔNG TIỀN ĐÃ TRẢ</b></span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <div class="rounded iq-card-icon bg-success-light"><i class="fas fa-users"></i>
                                    </div>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                        <?=tien($doanhthu);?> </span>
                                        <span class="text-muted"><b>DOANH THU</b></span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                            </div>
                        </div>
                    </div>
                  <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title"><b>THỐNG KÊ TUẦN</b></h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <div class="rounded iq-card-icon bg-primary-light"><i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                        <?=tien($tienchoi2);?></span>
                                        <span class="text-muted"><b>TỔNG TIỀN ĐÃ CHƠI</b></span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <div class="rounded iq-card-icon bg-danger-light"><i class="fas fa-money-bill-alt"></i>
                                    </div>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                        <?=tien($tientra2);?> </span>
                                        <span class="text-muted"><b>TỔNG TIỀN ĐÃ TRẢ</b></span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <div class="rounded iq-card-icon bg-success-light"><i class="fas fa-users"></i>
                                    </div>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                        <?=tien($doanhthu2);?> </span>
                                        <span class="text-muted"><b>DOANH THU</b></span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title"><b>THÔNG KÊ HÔM NAY</b></h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <div class="rounded iq-card-icon bg-primary-light"><i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                        <?=tien($tienchoi3);?></span>
                                        <span class="text-muted"><b>TỔNG TIỀN ĐÃ CHƠI</b></span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <div class="rounded iq-card-icon bg-danger-light"><i class="fas fa-money-bill-alt"></i>
                                    </div>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                        <?=tien($tientra3);?> </span>
                                        <span class="text-muted"><b>TỔNG TIỀN ĐÃ TRẢ</b></span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <div class="rounded iq-card-icon bg-success-light"><i class="fas fa-users"></i>
                                    </div>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                        <?=tien($doanhthu3);?> </span>
                                        <span class="text-muted"><b>DOANH THU</b></span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                            </div>
                        </div>
                    </div>  
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                        <div class="inner">
                        <h3><?=tien($total_money);?></h3>
                        <p><b>Tổng Số Dư Thành Viên</b></p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-money"></i>
                        </div>
                        </div>
                    </div>
          <!-- /.col -->
                 <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                        <div class="inner">
                        <h3><?=tien($total_nap);?></h3>
                        <p><b>Tổng Tiền Đã Nạp</b></p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-money"></i>
                        </div>
                        </div>
                    </div>
          <!-- fix for small devices only -->
           <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                        <div class="inner">
                        <h3><?=tien($total_tru);?></h3>
                        <p><b>Tổng Tiền Đã Chơi</b></p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-money"></i>
                        </div>
                        </div>
                    </div>
          <div class="clearfix hidden-md-up"></div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
            <div class="inner">
            <h3><?=tien($total_thanhvien);?></h3>
            <p><b>Tổng Số Thành Viên</b></p>
            </div>
            <div class="icon">
            <i class="fa fa-users"></i>
            </div>
            </div>
        </div>
          <!-- /.col -->
        </div>
        <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
            <div class="inner">
            <h3><?=$total_bank;?></h3>
            <p><b>Tổng Số Ngân Hàng</b></p>
            </div>
            <div class="icon">
            <i class="fas fa-university"></i>
            </div>
            </div>
        </div>
        <!---->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
            <div class="inner">
            <h3><?=$total_napbank;?></h3>
            <p><b>Tổng Số Lần Nạp</b></p>
            </div>
            <div class="icon">
            <i class="fas fa-shopping-cart"></i>
            </div>
            </div>
        </div>
        <!---->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
            <div class="inner">
            <h3><?=tien($total_lsgame);?></h3>
            <p><b>Tổng Lần Giao Dịch</b></p>
            </div>
            <div class="icon">
            <i class="fas fa-shopping-cart"></i>
            </div>
            </div>
        </div>
          
        </div>
    </div>
<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">LỊCH SỬ CHƠI</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>NGƯỜI CHƠI</th>
                                    <th>MÃ GIAO DỊCH</th>
                                    <th>NỘI DUNG</th>
                                    <th>TIỀN ĐẶT</th>
                                    <th>TIỀN THẮNG</th>
                                    <th>GAME</th>
                                    <th>TRẠNG THÁI</th>
                                    <th>THỜI GIAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
  $i = 1;
  $MINHCHIEN = $MinhChien->query("SELECT * FROM `lichsuchoi` WHERE `id` ORDER BY id desc ");
  while ($row = mysqli_fetch_array($MINHCHIEN) ) 
  {?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row['username'];?></td>
                                    <td><?=$row['trans_id'];?></td>
                                    <td><?=$row['noidung'];?></td>
                                    <td><?=$row['money'];?></td>
                                    <td><?=$row['tiennhan'];?></td>
                                    <td><?=$row['game'];?></td>
                                    <td><?=status($row['status']);?></td>
                                    <td><?=$row['time'];?></td>
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