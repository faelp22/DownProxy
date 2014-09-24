<?php

namespace controller;

class cpv {

    public static function get_nome() {
        return 'Olá';
    }

    public static function get_description() {
        return 'Site base';
    }

    public static function get_author() {
        return 'Isael Sousa';
    }

    public static function get_icon() {
        return 'favicon.png';
    }

    public static function get_title() {
        return 'Base teste';
    }

    public static function get_css() {
        echo '<link href="http://localhost/SimpleSkeletonBase/view/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
        echo "\n \t";
        echo '<link href="http://localhost/SimpleSkeletonBase/view/main.css" rel="stylesheet">';
    }

    public static function get_js() {
        return '<link href="http://localhost/SimpleSkeletonBase/view/bootstrap/js/bootstrap.min.js" rel="stylesheet">';
    }

}
