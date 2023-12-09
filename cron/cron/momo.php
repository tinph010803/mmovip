<?php require('../../config/config.php');
// chiến cặc đéo bug được đâu haha
//MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg
$token = $MinhChien->site('apimomo');
$nd_nap = $MinhChien->get_row("SELECT * FROM `options` WHERE `noidung_nt` = '$noidung_nt' ");
$ch = curl_init("https://api.sieuthicode.net/historyapimomo/$token"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, true);
foreach($response['momoMsg']['tranList'] as $data) {
            $tranID             = $data['tranId'];
            $amount             = $data['amount'];
            $description        = $data['comment'];
            $tachndnap          = explode('nap_', $description);
            $user_id            = $tachndnap[1]; //ID USER NẠP
            
            $checkmgd = $MinhChien->query("SELECT * FROM `momo_code` WHERE `mgd_momo` = '$tranID' ")->fetch_array();
            $check_user = $MinhChien->get_row("SELECT * FROM `users` WHERE `id` = '$user_id' ");

            if(!$checkmgd) {
            $MinhChien->insert("history_bank", [
                'id_nap'  => $user_id,
                'trans_id'     => $tranID,
                'description'     => $description,
                'money'   => $amount,
                'pthucnap'      => 'Ví Điện Tử MOMO',
                'time'       => $time
                ]);
            
            $MinhChien->insert("log_site", [
                'username'   => $user_id,
                'type'       => 'money',
                'note'       => "Đã Nạp ".$amount." Ví Điện Tử MOMO ",
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
            $MinhChien->insert("momo_code", [
                'mgd_momo'       => $tranID
                ]);
                
            $tong_nap   = $check_user['tong_nap'] + $amount;
            $cong_tien  = $check_user['money'] + $amount;
            $MinhChien->update("users", [
            'money' => $cong_tien,
            'tong_nap' => $tong_nap
            ], " `id` = '".$check_user['id']."' ");
            sendTele(templateTele('Người Dùng ' . $check_user['id'] . ' Vừa Nạp Thành Công '.$amount.' Vào Hệ Thống Với Địa Chỉ IP Là ' . getip()));
                    echo json_encode([
            "status" => "success",
            "msg"    => "Nap thanh cong MGD: $tranID , so tien nap: $amount vnd. "
            ]);
            }
    }