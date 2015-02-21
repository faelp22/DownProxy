<?php
echo "<pre>";
echo "Loading ...";
ob_flush();
flush();
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://cdn.mysql.com/Downloads/Connector-J/mysql-connector-java-5.1.32.zip");
//curl_setopt($ch, CURLOPT_BUFFERSIZE,128);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'progress');
curl_setopt($ch, CURLOPT_WRITEFUNCTION, 'body');
curl_setopt($ch, CURLOPT_NOPROGRESS, false); // needed to make progress function work
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$html = curl_exec($ch);
curl_close($ch);


function progress($resource, $download_size, $downloaded, $upload_size, $uploaded) {
    if ($download_size > 0)
        echo $downloaded / $download_size * 100;
    ob_flush();
    flush();
    sleep(1); // just to see effect
    echo '<br />';
}

echo "</pre>";
echo "Done";
ob_flush();
flush();
//
//ob_start(); 
//echo "test"; 
////show_source(__FILE__); 
//ob_flush(); 
//$url = 'http://download.piriform.com/ccsetup311.exe'; // 3mb file; 
//$url2 = 'http://ftp.tu-chemnitz.de/pub/openoffice-extended/localized/pl/3.3.0/OOo_3.3.0_Win_x86_install-wJRE_pl.exe'; //148 mb file 
//$url3 = 'http://ftp.gwdg.de/pub/linux/slackware/slackware-10.2-iso/slackware-10.2-install-d2.iso'; // >600 mb file 
//$url4 = 'http://cdn.mysql.com/Downloads/Connector-J/mysql-connector-java-5.1.32.zip';
//
//function progress($totaldownload, $downloaded, $us, $ud) { 
// static $last; 
// $ind =  @round($downloaded/$totaldownload*100); //at the begining division by zero - to correct 
// if($last < $ind) echo $ind . "%<br />";       //if percentage change ->print 
// ob_flush(); 
// $last = $ind; //Remember last percentage number 
//} 
//
//function body($ch, $string) { 
// $length = strlen($string); 
// // join body chunks  
// // global $data; 
// // $data .= $string; 
// return $length; 
//} 
//
//function connect($url) { 
// $ch = curl_init(); 
// $opts = array(CURLOPT_RETURNTRANSFER => false, 
//        CURLOPT_URL => $url, 
//        CURLOPT_NOPROGRESS => false, 
//        CURLOPT_PROGRESSFUNCTION => 'progress', 
//        CURLOPT_WRITEFUNCTION => 'body' 
//        ); 
// curl_setopt_array($ch, $opts); 
// curl_exec($ch); 
// curl_close($ch); 
//} 
//
//connect($url4);  
//
////echo strlen($data); 
//ob_end_clean(); 
