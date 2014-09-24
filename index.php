<?php
session_start();
// Setup autoloading
require 'init_autoloader.php';

\controller\ValidarGet::error();

$timeCliente = 1;
$limitSizeFile = 50;
$time = \model\Date::nDate('now');
$path = \PROJECT_PATH . 'temp' . \DS;
$index = \PROJECT_INDEX;
$msgTitle = \controller\cpv::get_title();

if (isset($_SESSION['proxy'])):
    $avv = $_SESSION['proxy'];
    $diff = $avv->diff(\model\Date::nDate('now'));
    if ($diff->i >= $timeCliente):
        \model\CommonDir::rmd($path, $_SESSION['folder']);
        session_regenerate_id();
        $_SESSION['proxy'] = $time;
        $_SESSION['folder'] = uniqid($time->getTimestamp());
        \model\CommonDir::mkd($path, $_SESSION['folder'], 0755);
    endif;
else:
    $_SESSION['proxy'] = $time;
    $_SESSION['folder'] = uniqid($time->getTimestamp());
    \model\CommonDir::mkd($path, $_SESSION['folder'], 0755);
endif;

//Garbage collector
if(isset($_SESSION['folder'])):
    \controller\cpv::garbageCollector($path, $timeCliente);
endif;

if (isset($_POST['url'])):
    $fileUrl = $_POST['url'];
    $fileName = $_POST['nome'];
    
    $fileSize = \controller\cpv::get_remote_filesize($fileUrl);
    if(($fileSize / 1024)/1024 >= $limitSizeFile):
        header('Location: '.\PROJECT_INDEX.'?error=file_size');
    else:
        \model\GetFile::get_File($path.$_SESSION['folder'].\DS, $fileUrl, $fileName);
    endif;
endif;

function get_css() {
    global $index;
    echo \controller\cpv::get_css($index, 'view/bootstrap/css/bootstrap.min.css');
    echo \controller\cpv::get_css($index, 'view/main.css');
}

function get_js() {
    global $index;
    echo \controller\cpv::get_js($index, 'view/jquery/jquery-2.1.1.min.js');
    echo \controller\cpv::get_js($index, 'view/bootstrap/js/bootstrap.min.js');
    echo \controller\cpv::get_js($index, 'view/main.js');
}

function get_content() {
    global $path;
    $pasta = $_SESSION['folder'];
    $index =\PROJECT_INDEX.'temp'.\DS.$pasta;
    $diretorio = \dir($path . $pasta);
    $n = 1;
    while ($arquivo = $diretorio->read()):
        if ($arquivo != '.' and $arquivo != '..' and $arquivo != null):
            echo '<tr>';
            echo '<td>' . $n . '</td>';
            echo "<td><a href='" . $index . \DS . $arquivo . "'>" . $arquivo . "</a></td>";
            $temp2 = filemtime($path . $pasta . \DS . $arquivo);
            $temp2C = new DateTime();
            $temp2C->setTimezone(new DateTimezone("America/Fortaleza"));
            $temp2C->setTimestamp($temp2);
            echo '<td>' . $temp2C->format('d/m/Y H:i:s') . '</td>';
            echo '</tr>';
            $n++;
        endif;
    endwhile;
    $diretorio->close();
}

require_once 'view/index.php';
