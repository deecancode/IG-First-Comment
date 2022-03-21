<?php
error_reporting(0);
require 'config.php';
$data['bloks_versioning_id'] = 'a4b4b8345a67599efe117ad96b8a9cb357bb51ac3ee00c3a48be37ce10f2bb4c';
$send = json_decode(request(1, $useragent, 'feed/timeline/', $cookie, json_encode($data))[1], 1);
//print_r($send); die();
$timeline = $send['items'];
$komens = file_get_contents($komentar);
$logs = file_get_contents($saveFile);
$komen = explode("\n", str_replace("\r", "", $komens));
$komen = array($komen)[0]; 
$i=0;
while($i <= $total-1){
    if ($code = $timeline[$i]['code']) {
        $rand = rand(0, count($komen)-1);
        $text = $komen[$rand];
        $media_id = $timeline[$i]['id'];
        $id = $timeline[$i]['user']['pk'];
        $comment_count = $timeline[$i]['comment_count'];
        $username = $timeline[$i]['user']['username'];
        $result = "$media_id|$code|$id|$username|$text|$comment_count";
        if (strpos($logs, $media_id) !== false) {
            $status = 'ALREADY';
            $msg = '[SUDAH DIKOMENTAR]';
        }else{
            if ($first_koment) {
                $status = 'RUN | FIRST COMMENT';
                if ($comment_count === 0) {
                    sleep($delay); 
                    $comment = json_decode(request(1, $useragent, 'media/' . $media_id . '/comment/', $cookie, generateSignature(json_encode(['comment_text' => $text])))[1],1);
                }
            }else{
                $status = 'RUN';
                sleep($delay);
                $comment = json_decode(request(1, $useragent, 'media/' . $media_id . '/comment/', $cookie, generateSignature(json_encode(['comment_text' => $text])))[1],1);
            }            
            if($comment['status'] == 'ok'){
                saveData($saveFile, $result);
                $msg = '[SUKSES KOMENTAR]';
            }else{
                $msg = '['.$comment['message'].']';
            }
        }
        echo "<pre>[$status] $msg $result</pre>";
    }
    $i++;
    sleep(0); ob_flush(); flush();
}