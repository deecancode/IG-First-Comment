<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require '../../config.php';
function cekpoint ($url, $data, $csrf, $cookies, $ua){
	$a = curl_init();
    curl_setopt($a, CURLOPT_URL, $url);
    curl_setopt($a, CURLOPT_USERAGENT, $ua);
	curl_setopt($a, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($a, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($a, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($a, CURLOPT_HEADER, 1);
    curl_setopt($a, CURLOPT_COOKIE, $cookies);
    if($data){
    curl_setopt($a, CURLOPT_POST, 1);	
    curl_setopt($a, CURLOPT_POSTFIELDS, $data);
    }
    if($csrf){
    curl_setopt($a, CURLOPT_HTTPHEADER, array(
            'Connection: keep-alive',
            'Proxy-Connection: keep-alive',
            'Accept-Language: en-US,en',
            'x-csrftoken: '.$csrf,
            'x-instagram-ajax: 1',
            'Referer: '.$url,
            'x-requested-with: XMLHttpRequest',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    ));
    }
    $b = curl_exec($a);
    return $b;
}

if(isset($_POST['langkah_2'])){
    session_start();
    $ua = $_SESSION['c_ua'];
    $url = $_SESSION['c_url'];
    $token = $_SESSION['c_token'];
    $pw = $_SESSION['c_password'];
    $cookies = $_SESSION['c_cookie'];
    
    $data = 'security_code='.$_POST['security_code'];
    $cekpoint = cekpoint($url, $data, $token, $cookies, $ua);
    //print_r($cekpoint);
    if (strpos($cekpoint, 'status": "ok"') !== false) {
    preg_match_all('%ookie: (.*?);%', $cekpoint, $d);
        $cookiesx = '';
        for ($o = 0; $o < count($d[0]); $o++) {
            $cookiesx .= $d[1][$o] . ";";
        }
        preg_match_all('/ds\_user\_id\=(.*?)\;/', $cookiesx, $id);
        $a = request(1, $ua, 'users/'.$id[1][0].'/info/', $cookiesx);
        //print_r($a);
        $a = json_decode($a[1]);
        if($a->status == 'ok') {
            
            $cekpoint = 0;
            $vigne['id'] = $id[1][0];
            $vigne['useragent'] = $ua;
            $vigne['user'] = $a->user->username;
            $vigne['cookies'] = $cookiesx;

            saveCookie('../../'.$cookieFile, "$cookiesx|$ua");

            $_SESSION['id'] = $id[1][0];
            $_SESSION['username'] = $a->user->username;
            $_SESSION['cookies'] = $cookiesx;
            $_SESSION['useragent'] = $ua;

            $hasil = json_encode($vigne);

            $c_id = $id[1][0];
            $c_user = $a->user->username;

            //print_r(mysql_error());
         
            //print_r(hasil); 
            $android['result'] = true;
            $android['content'] = "Cronjob ready to run";
            $android['content'] = '<div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                         <b>Sukses!</b> ' . $android['content'] . '.
                        </div>';
            $android['user'] = $vigne['user'];
            $android['id'] = $vigne['id'];
            $android['redirect'] = null;
            print_r(json_encode($android));  
        }else{
            $android['result'] = false;
            $android['content'] = "Cookie death, Please relogin";
            $android['content'] = '<div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                         <b>Peringatan!</b> ' . $android['content'] . '.
                        </div>';
            print_r(json_encode($android));
        }
    }else{
        $android['result'] = false;
        $android['content'] = "Verification code wrong";
        $android['content'] = '<div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                         <b>Gagal!</b> ' . $android['content'] . '.
                        </div>';
        print_r(json_encode($android)); 
    }
    
}
if(isset($_POST['langkah_1'])){
    session_start();

    $ua = $_SESSION['c_ua'];
    $url = $_SESSION['c_url'];
    $token = $_SESSION['c_token'];
    $pw = $_SESSION['c_password'];
    $cookies = $_SESSION['c_cookie'];
    
    $metode = $_POST['verifikasi'];
    $pilihan = $metode;
    $data = 'choice='.$pilihan;
    $cekpoint = cekpoint($url, $data, $token, $cookies, $ua);
    //print_r($cekpoint);
    if (strpos($cekpoint, 'status": "ok"') !== false) {
        $android['result'] = true;
        $android['content'] = "Verification code sent";
        $android['content'] = '<div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                         <b>Sukses!</b> ' . $android['content'] . '.
                        </div>';
        print_r(json_encode($android)); 
    }else{
        $android['result'] = true;
        $android['content'] = "Verification code sent";
        $android['content'] = '<div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                         <b>Info!</b> ' . $android['content'] . '.
                        </div>';
        print_r(json_encode($android)); 
    }
}