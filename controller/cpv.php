<?php

namespace controller;

class cpv {

    public static function get_nome() {
        return 'Olá';
    }

    public static function get_description() {
        return 'sistema de downlaod para escolas';
    }

    public static function get_author() {
        return 'Isael Sousa';
    }

    public static function get_icon() {
        return 'favicon.png';
    }

    public static function get_title() {
        return 'Fura Proxy v-0.7-Alpha';
    }

    public static function get_css($baseURL, $baseFile) {
        return '<link href="'.$baseURL.$baseFile.'" rel="stylesheet">';
    }

    public static function get_js($baseURL, $baseFile) {
        return '<script type="text/javascript" src="'.$baseURL.$baseFile.'"></script>';
    }
    
    public static function get_remote_filesize($url) {
        
            static $regex = '/^Content-Length: *+\K\d++$/im';
            
            if (!$fp = @fopen($url, 'rb')):
                return false;
            endif;
            
            if (isset($http_response_header) && preg_match($regex, implode("\n", $http_response_header), $matches)):
                return (int)$matches[0];
            endif;
            
            return strlen(stream_get_contents($fp));
    }
    
    public static function garbageCollector($path, $timeCliente){
        $diretorio = dir($path);
        while ($arquivo = $diretorio->read()):
            if ($arquivo != '.' and $arquivo != '..' and $arquivo != null and $arquivo != 'index.php'):
                $temp = filemtime($path.$arquivo);
                $tempC = \model\Date::nDate();
                $tempC->setTimestamp($temp);
                $tempD = $tempC->diff(\model\Date::nDate('now'));
                if($tempD->i >= $timeCliente):
                    \model\CommonDir::rmd($path, $arquivo);
                endif;
            endif;
        endwhile;
        $diretorio->close();
    }

}