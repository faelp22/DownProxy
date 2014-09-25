<?php
\define('PROJECT_NAME', 'DownProxy');
\define('PROJECT_ROOT', 'proxy');
\define('DS', \DIRECTORY_SEPARATOR);
\define('PROJECT_INDEX', 'http://'.$_SERVER['SERVER_NAME'].\DS.\PROJECT_ROOT.\DS);
\define('PROJECT_PATH', \dirname(__DIR__).\DS);