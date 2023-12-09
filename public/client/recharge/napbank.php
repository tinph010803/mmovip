<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php'; 
if(empty($MinhChien->users('username'))) {
echo "<script>location.href = '/'</script>";
}
?>
<title>NẠP TIỀN - <?=$MinhChien->site('tenweb');?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
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
                Bạn Vui Lòng Chuyển Khoản Đúng Nội Dung Để Được Nhận Tiền Từ Động Nhanh Nhất<br>
                Nếu Sau 10 Phút Chưa Nhận Được Tiền Vui Lòng Liên Hệ ADMIN<br>
                Nạp Dưới Số Tiền Tối Thiểu Không Được Hỗ Trợ
                </div>
                </div>
                <?php
$user = $MinhChien->query("SELECT * FROM `bank` ");
while($row = mysqli_fetch_array($user)) { ?>
                <div class="col-md-12 col-lg-6 mb-4">
                <center><img src="<?=$row['img'];?>" height="45px"></center>
                <div class="alert bg-info mb-3">
                <div class="card-body p-0">
                <h5 class="mb-1" style="color:black">CTK : <?=$row['ctk'];?></h5>
                <h5 class="mb-1" style="color:black" >STK : <?=$row['stk'];?></h5>
                <h5 class="mb-1" style="color:black">NẠP TỐI THIỂU : <?=tien($row['toi_thieu']);?> VNĐ</h5>
                <div>
                </div>
                </div>
                </div>
                </div>
                <?php } ?>
                <div class="col-sm-12">
                <h4 class="text-info text-center">Nội Dung Chuyển Khoản</h4><p></p>
                <div class="alert text-white text-center bg-danger mb-3" role="alert">
                <h4 class="text-white font-weight-semi-bold"><a id="noidung"><?=$MinhChien->options('noidung_nt');?><?=$MinhChien->users('id');?></a> <a onclick="minhchien('#noidung')"><svg xmlns="http://www.w3.org/2000/svg" height="20px" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg></a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="col-md-12 mt-6 text-center mb-xl-20">
                        <div class="panel panel-primary">
                                    <div class="table-responsive shadow">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                                <tr role="row" class="bg-info">
                            <th class="text-center"><b>STT</b></th>
                        <th class="text-center"><b>TRANS ID</b></th>
                        <th class="text-center"><b>NỘI DUNG</b></th>
                        <th class="text-center"><b>SỐ TIỀN</b></th>
                        <th class="text-center"><b>NGÂN HÀNG</b></th>
                        <th class="text-center"><b>THỜI GIAN</b></th>
                                                </tr>
                                            </thead>
                                <?php
                            $i = 1;
                            $list_mua = $MinhChien->get_list("SELECT * FROM `history_bank` WHERE `id_nap` = '".$MinhChien->users('id')."' ORDER BY id desc ");
                            if($list_mua) {
                            foreach($list_mua as $row) { ?>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all" id="phone-tablechung" class="">
                                             <tr>
                                                <td class="text-center"><?=$i++?></td>
                            <td class="text-center"><?=$row['trans_id'];?></td>
                            <td class="text-center"><?=$row['description'];?></td>
                            <td class="text-center"><?=tien($row['money']);?></td>
                            <td class="text-center"><?=$row['pthucnap'];?></td>
                            <td class="text-center"><?=$row['time'];?></td>
                                            </tr>
                                            <?php } } else { ?>
                        <tr class="odd">
                            <td valign="top" colspan="100%"><center><img src="https://fansport.vn/default/template/img/cart-empty.png" alt="not fount" width="300px" class="pt-3"></center></td>
                        </tr>
                        <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
        </div>
            </div>
<script>
function minhchien(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  Swal.fire("Thành Công", "Đã Copy Thành Công", "success");
  $temp.remove();
}
</script>
<div class="content-backdrop fade"></div>
</div>
<script>
function minhchien(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  Swal.fire("Thành Công", "Đã Copy Thành Công", "success");
  $temp.remove();
}
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>