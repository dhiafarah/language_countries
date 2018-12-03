<?php 
require_once("src\Entity\Country.php");
require_once("src\View\View.php");
require_once("Config\config.php");
require_once("src\Controller\Controller.php");

error_reporting(E_ERROR | E_PARSE);
$view= new \View\View();
$controller= new \Controller\Controller();
$controller->init($view, $argv);


?>