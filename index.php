<?php

//Отображаем все ошибки
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
//session_destroy(); 
//Подключяем системные файлы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/SiteController.php');
require_once(ROOT.'/db.php');

$runer = new SiteController();
$runer->actionIndex();

 