<?php

namespace model;

/**
 * Description of GetFile
 * Class par fazer downlaod de arquivos remotos
 * @author Isael Sousa <faelp22@hotmail.com>
 */

class GetFile {
    //put your code here
    
    public static function  get_File($Path, $Url, $nameFile){
        
        $cURL = \curl_init();
        \curl_setopt_array($cURL, array(\CURLOPT_RETURNTRANSFER => true, CURLOPT_URL => $Url));
        $file = curl_exec($cURL);
        \curl_close($cURL);
        $result = \file_put_contents($Path.$nameFile, $file);
        
        return $result;
        
    }//End get_File
     
}
