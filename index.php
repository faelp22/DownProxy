<?php
session_start();

// Setup autoloading
require 'init_autoloader.php';

/**
 * Start pricipal do sistema.
 * @author Isael Sousa <faelp22@hotmail.com>
 */

\controller\ListeningGet::error();

$timeCliente = 10;
$limitSizeFile = 200;

$time = \model\Date::nDate('now');
$path = \PROJECT_PATH . 'temp' . \DS;
$index = \PROJECT_INDEX;
$msgTitle = \controller\CoreProcess::get_title();

if (isset($_SESSION['proxy'])):
    $avv = $_SESSION['proxy'];
    $diff = $avv->diff(\model\Date::nDate('now'));
    if ($diff->i >= $timeCliente):
        \model\CommonDir::rmd($path, $_SESSION['folder']);
        \session_regenerate_id();
        $_SESSION['proxy'] = $time;
        $_SESSION['folder'] = uniqid($time->getTimestamp());
        \model\CommonDir::mkd($path, $_SESSION['folder'], 0755);
    endif;
else:
    $_SESSION['proxy'] = $time;
    $_SESSION['folder'] = \uniqid($time->getTimestamp());
    \model\CommonDir::mkd($path, $_SESSION['folder'], 0755);
endif;

//Garbage collector
if(isset($_SESSION['folder'])):
    \model\GarbageCollector::garbageCollectorInit($path, $timeCliente);
endif;

if (isset($_POST['url'])):
    $fileUrl = ($_POST['url']);
    $fileName = \trim($_POST['nome']);
    if($fileName == NULL):
        $fileName = \common_hash\GenIdHash::genIdHash(6);
    endif;
    $fileName .= '.'.\common_hash\GenIdHash::genIdHash(3);
    $fileSize = \controller\CoreProcess::get_remote_filesize($fileUrl);
    if(($fileSize / 1024) / 1024 >= $limitSizeFile):
        header('Location: '.\PROJECT_INDEX.'?error=file_size');
    else:
        \model\GetFile::get_File($path.$_SESSION['folder'].\DS, $fileUrl, $fileName);
    endif;
endif;

function get_css() {
    global $index;
    echo \controller\CoreProcess::get_css($index, 'view/bootstrap/css/bootstrap.min.css');
    echo \controller\CoreProcess::get_css($index, 'view/main.css');
}

function get_js() {
    global $index;
    echo \controller\CoreProcess::get_js($index, 'view/jquery/jquery-2.1.1.min.js');
    echo \controller\CoreProcess::get_js($index, 'view/bootstrap/js/bootstrap.min.js');
    echo \controller\CoreProcess::get_js($index, 'view/main.js');
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
            $temp2 = \filemtime($path . $pasta . \DS . $arquivo);
            $temp2C = \model\Date::nDate();
            $temp2C->setTimezone(new DateTimezone("America/Fortaleza"));
            $temp2C->setTimestamp($temp2);
            echo '<td>' . $temp2C->format('d/m/Y H:i:s') . '</td>';
            echo '</tr>';
            $n++;
        endif;
    endwhile;
    $diretorio->close();
}

require_once 'view/layout.php';