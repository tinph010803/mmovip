<?php require('../../config/config.php');

//MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg
$nd_nap = $MinhChien->get_row("SELECT * FROM `options` WHERE `noidung_nt` = '$noidung_nt' ");
$token = $MinhChien->site('apizalopay');
$ch = curl_init("https://api.sieuthicode.net/historyapizalopay/$token"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, true);
foreach($response['zalopayMsg']['tranList'] as $data) {
            $tranID             = $data['trans_id'];
            $amount             = $data['trans_amount'];
            $description        = $data['description'];
            $tachndnap          = explode('nap_', $description);
            $user_id            = $tachndnap[1]; //ID USER NẠP
            
            $checkmgd = $MinhChien->query("SELECT * FROM `zalopay_code` WHERE `mgd_zalopay` = '$tranID' ")->fetch_array();
            $check_user = $MinhChien->get_row("SELECT * FROM `users` WHERE `id` = '$user_id' ");

            if(!$checkmgd) {
            $MinhChien->insert("history_bank", [
                'id_nap'        => $user_id,
                'trans_id'      => $tranID,
                'description'   => $description,
                'money'         => $amount,
                'pthucnap'      => 'Nạp Qua Ví Zalo Pay',
                'time'          => $time
                ]);
            
            $MinhChien->insert("log_site", [
                'username'   => $user_id,
                'type'       => 'money',
                'note'       => "Đã Nạp ".$amount." ZALOPAY ",
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
            $MinhChien->insert("zalopay_code", [
                'mgd_zalopay'       => $tranID
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