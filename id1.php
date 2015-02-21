<?php
// Create a curl handle
//$ch = curl_init('http://www.yahoo.com/');
//
//// Execute
//curl_exec($ch);
//
//// Check if any error occured
//for($a=0; $a<=1000; $a++):
//    if(!curl_errno($ch) and $a == 1000)
//    {
//     $info = curl_getinfo($ch);
//     echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'];
//    }
//endfor;
//
//// Close handle
//curl_close($ch);




//$ch = curl_init();
// informar URL e outras funções ao CURL
//if(isset($_GET['watch'])):
//    curl_setopt($ch, CURLOPT_URL, 'http://www.youtube.com/'.$_GET['watch']);
//else:
//    curl_setopt($ch, CURLOPT_URL, "http://www.youtube.com/watch?v=MEn28PRyu8E");
//endif;
//curl_setopt($ch, CURLOPT_URL, "http://www.yahoo.com");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//// Acessar a URL e retornar a saída
//$output = curl_exec($ch);
//// liberar
//curl_close($ch);
//// Substituir ‘Google’ por ‘PHP Curl’
//$output = str_replace('Google', 'PHP Curl', $output);
//// Imprimir a saída
//
//
//echo '<pre>';
//    print_r (curl_getinfo($ch));
//echo '</pre>';
//
//
//echo $output;


// Create a curl handle
$ch = curl_init('http://www.yahoo.com/');

// Execute
curl_exec($ch);

// Check if any error occurred
if(!curl_errno($ch))
{
 $info = curl_getinfo($ch);
 
// foreach ($info as $k=>$v):
//     echo "$k=>$v";
//     echo '<br />';
// endforeach;

 echo 'Took ' . $info['size_download'] . ' seconds to send a request to ' . $info['url'];
}

// Close handle
curl_close($ch);