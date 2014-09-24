<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of Date
 *
 * @author Isael Sousa <faelp22@hotmail.com>
 */
class Date extends \DateTime{
    //put your code here
    
    public static function nDate(){
        return new \DateTime();
    }
    
}