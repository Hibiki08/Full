<?php
use Full\Classes\E404Exception;
use Full\Classes\LogEcxeption;
use Full\Classes\View;

require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathAll = explode('/', $path);

$ctrl = !empty($pathAll[1]) ? $pathAll[1] : 'News';
$act = !empty($pathAll[2]) ? $pathAll[2] : 'All';

$controllerName = 'Full\Controllers\\' . $ctrl;

try {
    $controller = new $controllerName;

    $action = 'action' . $act;
    $controller->$action();
}
catch (E404Exception $e) {

    $date = date('m-d-Y/H-i-s');
    $file = $e->getFile();
    $line = $e->getLine();
    $message = $e->getMessage();

    $log = new LogEcxeption();
    $log->dataLog($date, $file, $line, $message);

    $view = new View();
    $view->error = $e->getMessage();
    $view->display('404.php');
}
catch (\PDOException $e) {
    header('HTTP/1.0 403 Forbidden');

    $date = date('m-d-Y/H-i-s');
    $file = $e->getFile();
    $line = $e->getLine();
    $message = $e->getMessage();

    $log = new LogEcxeption;
    $log->dataLog($date, $file, $line, $message);

    $view = new View();
    $view->error = $e->getMessage();
    $view->display('403.php');
    die;
}
