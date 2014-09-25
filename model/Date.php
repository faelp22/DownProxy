<?php

namespace model;

/**
 * Description of Date
 * Sistema para tratamento de datas.
 * @author Isael Sousa <faelp22@hotmail.com>
 */

class Date extends \DateTime{
    
    public static function nDate(){
        return new \DateTime();
    }// End nDate
    
}// End Date