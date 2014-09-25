<?php
namespace model;

/**
 * Description of GarbageCollector
 * Resposavel pela limpeça do sistema, sua execução é baseado no tempo definido,
 * o mesmo coleta informações do inode dos arquivo para comparar com o tempo definido.
 * @author Isael Sousa <faelp22@hotmail.com>
 */
class GarbageCollector {
    
    public static function garbageCollectorInit($path, $timeCliente){
        $dirPath = dir($path);
        while ($file = $dirPath->read()):
            if ($file != '.' and $file != '..' and $file != null and $file != 'index.php'):
                $temp = filemtime($path.$file);
                $tempC = \model\Date::nDate();
                $tempC->setTimestamp($temp);
                $tempD = $tempC->diff(\model\Date::nDate('now'));
                if($tempD->i >= $timeCliente):
                    \model\CommonDir::rmd($path, $file);
                endif;
            endif;
        endwhile;
        $dirPath->close();
    }// End garbageCollector
    
}// End GarbageCollector