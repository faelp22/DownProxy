<?php

namespace model;

/**
 * Description of GetFile
 * Class para fazer downlaod de arquivos remotos
 * @author Isael Sousa <faelp22@hotmail.com>
 */
class GetFile {

    public static function get_File($Path, $Url, $nameFile) {

        echo "Loading ...";

        ob_flush();
        flush();

        $cURL = \curl_init();

        /**
         * Aprimoramento do cURL para complexidade de difetremte tipos de servidores.
         * e situações.
         */
        \curl_setopt($cURL, \CURLOPT_URL, $Url);
        \curl_setopt($cURL, \CURLOPT_TIMEOUT, 120);
        \curl_setopt($cURL, \CURLOPT_HEADER, 0);
        \curl_setopt($cURL, \CURLOPT_FOLLOWLOCATION, true);
        \curl_setopt($cURL, \CURLOPT_MAXREDIRS, 2);
        \curl_setopt($cURL, \CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        \curl_setopt($cURL, \CURLOPT_CONNECTTIMEOUT, 7);
        \curl_setopt($cURL, \CURLOPT_CONNECTTIMEOUT_MS, 7000);
        \curl_setopt($cURL, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($cURL, \CURLOPT_FORBID_REUSE, true);
        \curl_setopt($cURL, \CURLOPT_FRESH_CONNECT, true);
        \curl_setopt($cURL, \CURLOPT_NOPROGRESS, false);
        \curl_setopt($cURL, \CURLOPT_INFILE, true);
        \curl_setopt($cURL, \CURLOPT_PROGRESSFUNCTION, 'progress');
        
        $file = \curl_exec($cURL);
        \curl_close($cURL);
        
        self::progress($resource, $download_size, $downloaded, $upload_size, $uploaded);

        echo "Done";
        ob_flush();
        flush();

//            if(!curl_errno($cURL)):
//                $info = curl_getinfo($cURL);
//                echo $info['size_download'];
//                echo '<br />';
//                
//            endif;


        

        if ($file != FALSE):
            $result = \file_put_contents($Path . $nameFile, $file);
        else:
            return FALSE;
        endif;
        return TRUE;
    }
    
    public static function progress($resource, $download_size, $downloaded, $upload_size, $uploaded) {
            if ($download_size > 0)
                echo $downloaded / $download_size * 100;
            ob_flush();
            flush();
            sleep(1); // just to see effect
        }

//End get_File
}
