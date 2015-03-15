<?php

namespace model;
/**
 * Description of GetFile
 * Class para fazer downlaod de arquivos remotos
 * @author Isael Sousa <faelp22@hotmail.com>
 */
class GetFile {

    public static function get_File($Path, $Url, $nameFile) {
        $cURL = \curl_init();

        /**
         * Aprimoramento do cURL para complexidade de difetremte tipos de servidores.
         * e situações.
         */
        \curl_setopt_array($cURL, array(
            \CURLOPT_HEADER => false,
            \CURLOPT_RETURNTRANSFER => true,
            //\CURLOPT_FOLLOWLOCATION => true,
            \CURLOPT_REDIR_PROTOCOLS => true,
            \CURLOPT_FORBID_REUSE => true,
            \CURLOPT_FRESH_CONNECT => true,
            \CURLOPT_ENCODING => "",
            \CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
            \CURLOPT_AUTOREFERER => true,
            \CURLOPT_CONNECTTIMEOUT => 0,
            \CURLOPT_TIMEOUT => 0,
            \CURLOPT_MAXREDIRS => 10,
            \CURLOPT_SSL_VERIFYPEER => false,
            \CURLOPT_URL => $Url
                )
        );

        $file = \curl_exec($cURL);

//        \curl_setopt($cURL, \CURLOPT_HEADER, 0);
//        \curl_setopt($cURL, \CURLOPT_RETURNTRANSFER, 1);
//        \curl_setopt($cURL, \CURLOPT_CONNECTTIMEOUT, 0);
//        \curl_setopt($cURL, \CURLOPT_FOLLOWLOCATION, 1);
//        //\curl_setopt($cURL, CURLOPT_REDIR_PROTOCOLS, 1);
//        \curl_setopt($cURL, \CURLOPT_FORBID_REUSE, 1);
//        //\curl_setopt($cURL, \CURLOPT_PROGRESSFUNCTION, 'progress');
//        \curl_setopt($cURL, \CURLOPT_FRESH_CONNECT, 1);
//        \curl_setopt($cURL, \CURLOPT_URL, $Url);
//        \curl_setopt($cURL, \CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
//        $file = \curl_exec($cURL);
        \curl_close($cURL);

        //self::progress($resource, $download_size, $downloaded, $upload_size, $uploaded);
        
        if ($file != FALSE):
            \file_put_contents($Path . $nameFile, $file);
        else:
            return FALSE;
        endif;
        return TRUE;
    }

    /**
      public static function progress($resource, $download_size, $downloaded, $upload_size, $uploaded) {
      if ($download_size > 0)
      echo $downloaded / $download_size * 100;
      ob_flush();
      flush();
      sleep(1); // just to see effect
      }
     */
//End get_File
}
