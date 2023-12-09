<?php
# Đơn vị hỗ trợ phần mềm NA Sơftware  -- 20.02.2023
//MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg
session_start();
// ob_start('minify_output');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$namews = $_SERVER['SERVER_NAME'];
error_reporting(0);
define('SERVERNAME','localhost');
define('USERNAME','clzlpaym_tttxxx');
define('PASSWORD','clzlpaym_tttxxx');
define('DATABASE','clzlpaym_tttxxx');

class MinhChien {
    private $ketnoi;
    function connect() {
        if (!$this->ketnoi) {
            $this->ketnoi = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE) or die ('Bạn Chưa Kết Nối Đến Database !');
            mysqli_query($this->ketnoi, "set names 'utf8'");
        }
    }
    function dis_connect() {
        if ($this->ketnoi) {
            mysqli_close($this->ketnoi);
        }
    }

    function site($data) {
        $this->connect();
        $row = $this->ketnoi->query("SELECT * FROM `settings` ")->fetch_array();
        return $row[$data];
    }
    
    function options($data) {
        $this->connect();
        $row = $this->ketnoi->query("SELECT * FROM `options` ")->fetch_array();
        return $row[$data];
    }
    
    function users($data) {
        $this->connect();
        $row = $this->ketnoi->query("SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ")->fetch_array();
        return $row[$data];
    }
    
    function query($sql) {
        $this->connect();
        $row = $this->ketnoi->query($sql);
        return $row;
    }
    function cong($table, $data, $sotien, $where) {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` + '$sotien' WHERE $where ");
        return $row;
    }
    function tru($table, $data, $sotien, $where) {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` - '$sotien' WHERE $where ");
        return $row;
    }
    
    function insert($table, $data) {
        $this->connect();
        $field_list = '';
        $value_list = '';
        foreach ($data as $key => $value) {
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_real_escape_string($this->ketnoi, $value)."'";
        }
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
        return mysqli_query($this->ketnoi, $sql);
    }
    //MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg
    function update($table, $data, $where) {
        $this->connect();
        $sql = '';
        foreach ($data as $key => $value) {
            $sql .= "$key = '".mysqli_real_escape_string($this->ketnoi, $value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
        return mysqli_query($this->ketnoi, $sql);
    }
    
    function update_value($table, $data, $where, $value1) {
        $this->connect();
        $sql = '';
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysqli_real_escape_string($this->ketnoi, $value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where.' LIMIT '.$value1;
        return mysqli_query($this->ketnoi, $sql);
    }
    
    function xoa($table, $where) {
        $this->connect();
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->ketnoi, $sql);
    }
    
    function get_list($sql) {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result)
        {
            die ('Có Cái Đầu Buồi');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    
    function get_row($sql) {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die ('Có Cái Đầu Buồi');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row)
        {
            return $row;
        }
        return false;
    }
    //MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg
    function num_rows($sql) {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result)
        {
            die ('Có Cái Đầu Buồi');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
}

$license = new rsaDATA();
function encryptData($data)
{
    global $license;
    $license->setPrivateKey(__DIR__ . '/clientPrivatekey.pem');
    $license->setPublicKey(__DIR__ . '/serverPublickey.pem');
    return $license->encryptWithPublicKey($data);
}
function decodecryptData($data)
{
    global $license;
    $license->setPrivateKey(__DIR__ . '/serverPrivatekey.pem');
    $license->setPublicKey(__DIR__ . '/clientPublickey.pem');
    return $license->decryptWithPrivateKey($data);
}
class rsaDATA
{
    protected $private, $public;

    final public function __construct()
    {
        if (
            function_exists('openssl_get_publickey') === false ||
            function_exists('openssl_public_encrypt') === false ||
            function_exists('openssl_get_privatekey') === false ||
            function_exists('openssl_private_decrypt') === false
        ) {
            throw new RuntimeException('Không Phải Tất Cả Các Chức Năng Của OpenSSl');
        }
    }

    final public function setPublicKey($key)
    {
        if (is_null($key) || empty($key) || file_exists($key) === false) {
            throw new RuntimeException('Key Sai !');
        }

        $this->public = $key;

        return true;
    }
//MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg
    final public function getPublicKey()
    {
        return is_null($this->public) ? false : $this->public;
    }

    final public function setPrivateKey($key)
    {
        if (is_null($key) || empty($key) || file_exists($key) === false) {
            throw new RuntimeException('Key Sai !');
        }

        $this->private = $key;

        return true;
    }

    final public function getPrivateKey()
    {
        return is_null($this->private) ? false : $this->private;
    }

    final public function encryptWithPublicKey($data)
    {
        if (is_null($data) || empty($data) || is_string($data) === false) {
            throw new RuntimeException('Needless to encrypt.');
        } elseif (is_null($this->public) || empty($this->public)) {
            throw new RuntimeException('Bạn Cần Có Key Mới Có Thể Hoạt Động !');
        }

        $key = @file_get_contents($this->public);
        if ($key) {
            $key = openssl_get_publickey($key);
            openssl_public_encrypt($data, $encrypted, $key);

            return chunk_split(base64_encode($encrypted));
        }

        return false;
    }
//MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg
    final public function decryptWithPrivateKey($data)
    {
        if (is_null($data) || empty($data) || is_string($data) === false) {
            throw new RuntimeException('Needless to encrypt.');
        } elseif (is_null($this->private) || empty($this->private)) {
            throw new RuntimeException('Bạn Cần Có Key Mới Có Thể Hoạt Động');
        }

        $key = @file_get_contents($this->private);
        if ($key) {
            $key = openssl_get_privatekey($key);
            openssl_private_decrypt(base64_decode($data), $result, $key);

            return $result;
        }
    }

    final public function encryptWithPrivateKey($data)
    {
        if (is_null($data) || empty($data) || is_string($data) === false) {
            throw new RuntimeException('Bạn Cần Có Key Mới Có Thể Hoạt Động');
        } elseif (is_null($this->private) || empty($this->private)) {
            throw new RuntimeException('Bạn Cần Có Key Mới Có Thể Hoạt Động');
        }

        $key = @file_get_contents($this->private);
        if ($key) {
            $key = openssl_get_privatekey($key);
            openssl_private_encrypt($data, $encrypted, $key);

            return chunk_split(base64_encode($encrypted));
        }

        return false;
    }

    final public function decryptWithPublicKey($data)
    {
        if (is_null($data) || empty($data) || is_string($data) === false) {
            throw new RuntimeException('Needless to encrypt.');
        } elseif (is_null($this->public) || empty($this->public)) {
            throw new RuntimeException('Bạn Cần Có Key Mới Có Thể Hoạt Động !');
        }

        $key = @file_get_contents($this->public);
        if ($key) {
            $key = openssl_get_publickey($key);
            openssl_public_decrypt(base64_decode($data), $result, $key);

            return $result;
        }
    }
    //MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg
}
$system = 'online'; // chỉnh thành demo thì nó sẽ là trang web demo và sẽ không thao tác được ( khi dùng kinh doanh đối với mã nguồn thì không nên bật )
$tele_token = '6282331285:AAGyqT7p_ou4PQ0fU-oo45qC-4SK3KXi5Dw';
$tele_chatid = '5941621526';
function sendTele($message)
{
    global $tele_token,$tele_chatid;
    $data = http_build_query([
        'chat_id' => $tele_chatid,
        'text' => $message,
    ]);
    $url = 'https://api.telegram.org/bot' . $tele_token . '/sendMessage';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if ($data) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function templateTele($content)
{
    return "Bạn Có Thông Báo Mới !
Nội Dung : " .
        $content .
        "
Thời Gian : " .
        date('d/m/Y H:i:s');
}

//MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg
if(check_string(isset($_SESSION['username']))) { 
    $MinhChien = new MinhChien;
    $getUser = $MinhChien->get_row(" SELECT * FROM `users` WHERE username = '".$_SESSION['username']."' ");
    $my_username = 'True';
    $id  = $getUser['id'];
    $my_user  = $getUser['username'];
    $username = $getUser['username'];
    $my_email  = $getUser['email'];
    $my_money = $getUser['money'];
    $my_level = $getUser['capbac'];
    $my_capbac = $getUser['capbac'];
    if(!$getUser) {
        session_start();
        session_destroy();
        header('location: /');
    }
    
    else if($getUser['bannd'] >= 1){
        die('Tài Khoản Của Bạn Đã Vị Khóa Vì Vi Phạm Điều Khoản Của Chúng Tôi !');
        exit;
    }
    
    else if ($getUser['money'] < 0) {
        $MinhChien->update("users", array(
            'bannd' => 1
        ), "username = '$my_user' ");
        session_start();
        session_destroy();
        header('location: /');
        die();
    }
//MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg

} else {
    $my_level = NULL;
    $my_money = 0;
}


$MinhChien = new MinhChien;
$base_url = 'https://'.$_SERVER['SERVER_NAME'].'/';
$url_site_name = strtoupper($_SERVER['SERVER_NAME']);

$time = date("Y/m/d H:i:s");

function level($number){
    if($number == '0'){
        return 'Thành Viên';
    }else if($number == '3'){
        return 'Quản Trị Viên';
    }else{
        return 'Khác';
    }
}

function statru_user($number){
    if($number == 0){
        return '<span class="badge badge-success">Hoạt Động</span>';
    }else {
        return '<span class="badge badge-danger">Đã Bị Band</span>';
    }
}

function chuyentien($data){
    if($data == 'xuli'){
        return '<span class="badge badge-warning">Đang Xử Lí</span>';   ///trạng thái rút tiền
    } if($data == 'thanhcong'){
        return '<span class="badge badge-success">Thành Công</span>';  ///trạng thái rút tiền
    } if($data == 'thatbai') {
        return '<span class="badge badge-danger">Thất Bại</span>';   ///trạng thái rút tiền
    } else {
        return '<span class="badge badge-danger">Lỗi</span>';       ///trạng thái rút tiền
    }
}

function status($data){
    if($data == 'win'){
        return '<span class="badge badge-success">Thắng</span>';
    } if($data == 'lose'){
        return '<span class="badge badge-danger">Thua</span>';
    } else {
        return '<span class="badge badge-warning">Khác</span>';
    }
}

function chanle($data){
    if($data == 'chan'){
        return '<code>2</code> - <code>4</code> - <code>6</code> - <code>8</code>';
    } else if($data == 'chan2'){
        return '<code>0</code> - <code>2</code> - <code>4</code> - <code>6</code> - <code>8</code>';
    } else if($data == 'le'){
        return '<code>1</code> - <code>3</code> - <code>5</code> - <code>7</code>';
    } else if($data == 'le2'){
        return '<code>1</code> - <code>3</code> - <code>5</code> - <code>7</code> - <code>9</code>';
    } else {
        return '<span class="badge badge-warning">Khác</span>';
    }
}

function taixiu($data){
    if($data == 'tai'){
        return '<code>5</code> - <code>6</code> - <code>7</code> - <code>8</code>';
    } else if($data == 'tai2'){
        return '<code>5</code> - <code>6</code> - <code>7</code> - <code>8</code> - <code>9</code>';
    } else if($data == 'xiu'){
        return '<code>1</code> - <code>2</code> - <code>3</code> - <code>4</code>';
    } else if($data == 'xiu2'){
        return '<code>0</code> - <code>1</code> - <code>2</code> - <code>3</code> - <code>4</code>';
    } else {
        return '<span class="badge badge-warning">Khác</span>';
    }
}

function xien($data){
    if($data == 'cx'){
        return '<code>0</code> - <code>2</code> - <code>4</code>';
    } else if($data == 'lt'){
        return '<code>5</code> - <code>7</code> - <code>9</code>';
    } else if($data == 'ct'){
        return '<code>6</code> - <code>8</code>';
    } else if($data == 'lx'){
        return '<code>1</code> - <code>3</code>';
    } else {
        return '<span class="badge badge-warning">Khác</span>';
    }
}

function motphanba($data){
    if($data == 'N1'){
        return '<code>1</code> - <code>2</code> - <code>3</code>';
    } else if($data == 'N2'){
        return '<code>4</code> - <code>5</code> - <code>6</code>';
    } else if($data == 'N3'){
        return '<code>7</code> - <code>8</code> - <code>9</code>';
    } else if($data == 'N0'){
        return '<code>0</code>';
    } else {
        return '<span class="badge badge-warning">Khác</span>';
    }
}
function tong3so($data){
    if($data == 'T1'){
        return '<code>02</code> - <code>13</code> - <code>17</code> - <code>19</code> </br> 
        <code>21</code> - <code>29</code> - <code>35</code> - <code>37</code> - <code>47</code> </br> 
        <code>49</code> - <code>51</code> - <code>54</code> - <code>57</code> - <code>63</code> </br> 
        <code>64</code> - <code>74</code> - <code>83</code> - <code>91</code> - <code>95</code> - <code>96</code>';
    } else if($data == 'T2'){
        return '<code>66</code> - <code>99</code>';
    } else if($data == 'T3'){
        return '<code>123</code> - <code>234</code> - <code>456</code> - <code>678</code> - <code>789</code>';
    } else {
        return '<span class="badge badge-warning">Khác</span>';
    }
}

function status_user($number){
    if($number == 0){
        return 'Active';
    }else {
        return 'Temporary';
    }
}

//MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg

function BASE_URL($url) {
    global $base_url;
    return $base_url.$url;
}


function tien($price) {
    return str_replace(",", ".", number_format($price));
}

//MÃ NGUỒN ĐƯỢC XÂY DỰNG BỞI XI TRUM - ZALO 0363456420 - TELEGRAM XI TRUM https://t.me/gggygvg

function curl_get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}

function random($string, $int) {  
    return substr(str_shuffle($string), 0, $int);
}

function check_url($url) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_HEADER, 1);
    curl_setopt($c, CURLOPT_NOBODY, 1);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
    if(!curl_exec($c))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function getip() {
return $_SERVER['REMOTE_ADDR'];
}

function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
 }
return $str;
}

// Lọc input chuỗi (__STRING__)
function check_string($data) {
    return str_replace(array('<', "'", '>', '?', "\\", '--', 'eval(', '<php'), array('', '', '', '', '', '', '', '', ''), htmlspecialchars(addslashes(strip_tags($data))));
}

function xoadau($strTitle) {
$strTitle=strtolower($strTitle);
$strTitle=trim($strTitle);
$strTitle=str_replace(' ','-',$strTitle);
$strTitle=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/",'y',$strTitle);
$strTitle=preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/",'y',$strTitle);
$strTitle=str_replace('đ','d',$strTitle);
$strTitle=str_replace('Đ','d',$strTitle);
$strTitle=preg_replace("/[^-a-zA-Z0-9]/",'',$strTitle);
return $strTitle;
}