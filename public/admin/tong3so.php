<?php include('head.php');?>
<?php include('nav.php');?>

<section class="content">
<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">GAME TỔNG 3 SỐ</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>NỘI DUNG</th>
                                    <th>SỐ CUỐI MÃ GIAO DỊCH</th>
                                    <th>MIN</th>
                                    <th>MAX</th>
                                    <th>TỈ LỆ</th>
                                    <th>THAO TÁC</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php 
  $MINHCHIEN = $MinhChien->query("SELECT * FROM `tong3so` ORDER BY id asc ");
  while ($row = mysqli_fetch_array($MINHCHIEN) ) 
  {?>
                                <tr class="text-center">
                                    <td><?=$row['id'];?></td>
                                    <td><?=$row['noidung'];?></td>
                                    <td><?=tong3so($row['data']);?></td>
                                    <td><?=$row['min']; ?></td>
                                    <td><?=$row['max']; ?></td>
                                    <td><?=$row['tyle'];?></td>
                                    <td><a type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default"><b>ĐỔI TỶ LỆ</b></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="card-footer clearfix">
                VUI LÒNG THAO TÁC CẨN THẬN
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">THAY ĐỔI TỶ LỆ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" class="form-control" name="id" placeholder="1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">MIN</label>
                        <input type="number" class="form-control" name="min" placeholder="1000">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">MAX</label>
                        <input type="number" class="form-control" name="max" placeholder="10000">
                    </div>
                   <div class="form-group">
                        <label for="exampleInputEmail1">TỶ LỆ</label>
                        <input type="text" class="form-control" name="tyle" placeholder="2.4">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" name="submit" class="btn btn-primary">THAY ĐỔI</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
//CODE ĐƯỢC PHÁT HÀNH BỞI LÊ ĐOÀN MINH CHIẾN (NearZeK) | Vui Lòng Mua Mã Nguồn Chính Chủ | Zalo : 0367983792 
if (isset($_POST["submit"]))
{
    $idd = $_POST['id'];
    $game_tong3so = $MinhChien->get_row("SELECT * FROM `tong3so` WHERE `id` = '$idd' ");
  if(!$game_tong3so)
  {
    echo '<script>swal.fire("Lỗi", "ID Không Tồn Tại", "error");setTimeout(function(){ location.href = "" },500);</script>';
  } else {
    $MinhChien->update("tong3so", [
            'min'  => $_POST['min'],
            'max'  => $_POST['max'],
            'tyle' => $_POST['tyle']
            ], " `id` = '$idd' ");
    echo '<script>swal.fire("Thành Công", "Đã Thay Đổi Tỷ Lệ", "success");setTimeout(function(){ location.href = "" },500);</script>';
  }
}

?>
<!-- /.modal -->
<?php include('foot.php');?>