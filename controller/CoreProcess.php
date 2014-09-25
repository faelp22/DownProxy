<?php

namespace controller;

/**
 * Descrição
 * Núcleo de processamento, responsavel por coletar informações e tratalas.
 * @author Isael Sousa <faelp22@hotmail.com>
 */

class CoreProcess {

    public static function get_nome($a) {
        return $a;
    }// End get_nome

    public static function get_description() {
        return 'sistema de downlaod para escolas'; // refactore
    }// End get_description

    public static function get_author() {
        return 'Isael Sousa'; // refactore
    }// End get_author

    public static function get_icon() {
        return 'favicon.png'; // refactore
    }// End get_icon

    public static function get_title() {
        return 'DownProxy v-1.0 Release'; // refactore
    }// End get_title

    public static function get_css($baseURL, $baseFile) {
        return '<link href="'.$baseURL.$baseFile.'" rel="stylesheet">';
    }// End get_css

    public static function get_js($baseURL, $baseFile) {
        return '<script type="text/javascript" src="'.$baseURL.$baseFile.'"></script>';
    }// End get_js
    
    public static function get_remote_filesize($url) { // refactore
        
            static $regex = '/^Content-Length: *+\K\d++$/im';
            
            if (!$fp = @fopen($url, 'rb')):
                return false;
            endif;
            
            if (isset($http_response_header) && preg_match($regex, implode("\n", $http_response_header), $matches)):
                return (int)$matches[0];
            endif;
            
            return strlen(stream_get_contents($fp));
    }// End get_remote_filesize
    
}// End CoreProcess