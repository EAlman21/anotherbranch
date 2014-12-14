<?php
//------------------echo $_SERVER['DOCUMENT_ROOT'];
//DOC_ROOT will serve as a short hand for $_SERVER['DOCUMENT_ROOT']
//if your document root already prints a foward slash at the end the path, then you don't need the "/"
define('DOC_ROOT' , $_SERVER['DOCUMENT_ROOT'] . "/");
//depending on the system you use, DS will serve as a shorthand for the foward slash or the back slash.  
define('DS' , DIRECTORY_SEPARATOR);
//INCLUDES will servce as short hand to place the path of the Document Root
define('INCLUDES' , DOC_ROOT . 'comment/includes' . "/");
//MODELS_DIR will serve as a short hand to reach the models directory
define('MODELS_DIR', DOC_ROOT . "/" . 'comment' . "/" . 'mysql' . "/" . 'models' . "/");
define('MYSQL_DIR', DOC_ROOT . 'comment' . "/" . 'mysql' . "/");

require_once MYSQL_DIR . 'db_connect.php';//try to replace this with Ross' connect.php
?>