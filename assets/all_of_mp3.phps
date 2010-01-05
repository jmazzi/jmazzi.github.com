#!/usr/bin/php -q
<?php

if($argv[1] == "") {
    exit("Give me a dir\n");
}
@mkdir($argv[1]);
@chmod($argv[1], 0755);
chdir($argv[1]);

$id = "";
$pw = "";
$to = "http%3A%2F%2FWWW.ALLOFMP3.COM%2FINDEX.SHTML%3F";

$downloads = "http://secure.allofmp3.com/mylinks.shtml";
$postfields = "login=$id&password=$pw&tourl=$downloads"; 
$fp = fopen("/tmp/all_of_mp3_downloads", "w");

$ch = curl_init();
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/all_of_mp3"); 
curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/all_of_mp3"); 
curl_setopt($ch, CURLOPT_URL, "http://login.allofmp3.com/login.shtml?logging=on"); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields); 
curl_exec($ch);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_URL, $downloads);
$o = curl_exec($ch);
curl_close($ch);
fclose($fp);

$file = file_get_contents("/tmp/all_of_mp3_downloads");
$info = strip_tags($file);
$split = explode("http://", $info);
foreach($split as $mp3) {
    $mp3 = trim($mp3);
    if(empty($mp3) || !preg_match("/\.mp3/", $mp3)) continue;
    $url = "http://".$mp3;
    $filename = eregi_replace("http://.*/", "", $url);
    echo "Downloading: $filename";
    echo "\n";
    system("wget  \"$url\""); 
    
}

?>
