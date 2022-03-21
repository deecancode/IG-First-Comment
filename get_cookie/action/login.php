<?php
require "../../config.php";
session_start();
error_reporting(0);
$post_username = $_POST['username'];
$post_password = $_POST['password'];

if (empty($post_password)) {
    $msg = 'Mohon mengisi form dengan benar';
    $msg = '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
             <b>Gagal!</b> ' . $msg . '.
            </div>';
    $array = json_encode(['result' => 0, 'content' => $msg]);
    echo $array;
} else {
    if ($_POST['username']) {
        $login = json_decode(instagram_logins($post_username, $post_password));
    } else {
        $login = json_decode(instagram_login($post_password));
    }
    //print_r($login);
    if ($login->status != false) {
        $cookies = $login->cookies;
        $useragent = $login->useragent;
        saveCookie('../../'.$cookieFile, "$cookies|$useragent");
        $device_id = generateDeviceId(0);
        $id = $login->id;
        $iduser = $id;
        $username = $login->user;
        $reff = $_POST['id'];
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['cookies'] = $cookies;
            $_SESSION['useragent'] = $useragent;
            $msg = 'Cronjob ready to run';
            $msg = '<div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                         <b>Sukses!</b> ' . $msg . '.
                        </div>';
            $array = json_encode(['result' => 1, 'content' => $msg, 'redirect' => null]);
            echo $array;
    } else {
        if ($_POST['username']) {
            $msg = $login->msg;
            $cekpoint = 0;
            if ($msg == 'Cekpoint') {
                $cekpoint = 1;
            }
            $msg = '<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                             <b>Gagal!</b> ' . $msg . '.
                            </div>';
            $array = json_encode(['result' => 0, 'content' => $msg, 'cekpoint' => $cekpoint]);
            echo $array;
        } else {
            $msg = 'Token Salah';
            $msg = '<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                             <b>Gagal!</b> ' . $msg . '.
                            </div>';
            $array = json_encode(['result' => 0, 'content' => $msg]);
            echo $array;
        }
    }
}
