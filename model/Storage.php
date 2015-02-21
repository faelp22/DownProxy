<?php
namespace model;

/**
 * Description of Storage
 *
 * @author Isael Sousa <faelp22@hotmail.com>
 */

class Storage {
    
    public static function sgbd_PDO($a){
        $b = new \PDO($a);
        return $b;
    }
}
