<?php
define('__ROOTPATH__', __DIR__);

spl_autoload_register();
use App\Controller\Controller;
use App\Controller\PageController;

$controller = new Controller();
$controller->route();

?>