<?php
// Setup autoloading
require 'init_autoloader.php';

function get_content() {
    
    echo \common_hash\GenIdHash::genIdHash();
    echo '<br />';
    echo \controller\cpv::get_nome();
    echo '<br />';
    echo \model\mat::soma(1, 2);
    
}

require_once 'view/index.php';