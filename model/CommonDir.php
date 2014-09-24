<?php

/**
 * Description of mkdir_common
 * Sistem para criação e remoção de diretorios.
 * @author Isael Sousa <faelp22@hotmail.com>
 */
namespace model;

abstract class CommonDir {

    public static function mkd($path, $name, $per) {
        if (\is_dir($path . $name)):
            return 'Erro pasta já existente';
        else:
            \mkdir($path . $name, $per);
            if (\is_dir($path . $name)):
                return TRUE;
            else:
                return 'Erro ao cria pasta: verifique as permições do local';
            endif;
        endif;
    }// End mkd

    public static function rmd($path, $name) {
        if (\is_dir($path . $name)):
            $diretorio = dir($path.$name);
            while ($arquivo = $diretorio->read()):
                if ($arquivo != '.' and $arquivo != '..' and $arquivo != null):
                //rename($path.$name.DS.$arquivo, $path.'trash'.DS.$arquivo);
                array_map("unlink", glob($path.$name.\DS.'*'));
                endif;
            endwhile;
            \rmdir($path . $name);
            $diretorio->close();
            return TRUE;
        else:
            return 'Erro diretorio não existe';
        endif;
    }// End rmd
    
}// End common_dir
