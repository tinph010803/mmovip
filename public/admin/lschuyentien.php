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
                    <h3 class="card-title">LỊCH SỬ CHUYỂN TIỀN</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">STT</th>
                                    <th class="text-center">MÃ GIAO DỊCH</th>
                                    <th class="text-center">NGƯỜI NHẬN</th>
                                    <th class="text-center">SỐ TIỀN</th>
                                    <th class="text-center">NỘI DUNG</th>
                                    <th class="text-center">TRẠNG THÁI</th>
                                    <th class="text-center">THỜI GIAN</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$i = 1;
$check_bank = $MinhChien->query("SELECT * FROM `lichsuchuyentien` ORDER BY `id` DESC ");
while ($row = mysqli_fetch_array($check_bank) ) 
  {?>
                                <tr class="text-center">
                                    <td class="text-center"><?=$i++?></td>
                                    <td class="text-center"><?=$row['trans_id'];?></td>
                                    <td class="text-center"><?=$row['nguoinhan'];?></td>
                                    <td class="text-center"><?=tien($row['money']);?></td>
                                    <td class="text-center"><?=$row['noidung'];?></td>
                                    <td class="text-center"><?=chuyentien($row['status']);?></td>
                                    <td class="text-center"><?=$row['time'];?></td>
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