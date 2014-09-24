<?php

namespace controller;

/**
 * Description of ValidarGet
 *
 * @author Isael Sousa <faelp22@hotmail.com>
 */
class ValidarGet {

    //put your code here

    public static function success() {
        
    }

    public static function error() {
        if (!isset($_GET['error'])):
            return FALSE;
        endif;
        switch ($_GET['error']):
            case 'file_size':
                $alert_type = "danger";
                $alert_title = "Arquivo muito grande! ";
                $alert_mensagem = 'Nosso limite é de 50 MegaBytes';
                include_once \PROJECT_PATH . 'view/alerts/alert.phtml';
                break;
        endswitch;
    }

    public static function op() {
        
    }

    public static function info() {
        
    }

}
