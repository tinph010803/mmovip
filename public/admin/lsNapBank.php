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
                    <h3 class="card-title">LỊCH SỬ NẠP TIỀN</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>ID NẠP</th>
                                    <th>MÃ GIAO DỊCH</th>
                                    <th>NỘI DUNG</th>
                                    <th>SỐ TIỀN</th>
                                    <th>HÌNH THỨC NẠP</th>
                                    <th>THỜI GIAN</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$i = 1;
$check_bank = $MinhChien->query("SELECT * FROM `history_bank` ORDER BY `id` asc ");
while ($row = mysqli_fetch_array($check_bank) ) 
  {?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row['id_nap'];?></td>
                                    <td><?=$row['trans_id'];?></td>
                                    <td><?=$row['description'];?></td>
                                    <td><?=$row['money'];?></td>
                                    <td><?=$row['pthucnap'];?></td>
                                    <td><?=$row['time'];?></td>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</section>
<?php require('foot.php'); ?>