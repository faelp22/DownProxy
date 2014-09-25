<?php

namespace controller;

/**
 * Description of ValidarGet
 * Sistema de escutas, o mesmo observar tudo que acontence atravez do get.
 * em seguida tratar suas ações.
 * @author Isael Sousa <faelp22@hotmail.com>
 */

class ListeningGet {

    public static function success() {
        return FALSE;
    }// End success

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
            case 'documente_not_found':
                $alert_type = "danger";
                $alert_title = "<h1>Error 404:</h1>! ";
                $alert_mensagem = 'Url solicitada não encontrda!';
                include_once \PROJECT_PATH . 'view/alerts/alert.phtml';
                break;
        endswitch;
    }// End error

    public static function op() {
        return FALSE;
    }// End op

    public static function info() {
        return FALSE;
    }// End info

}// End ListeningGet
