<?php
use Full\Classes\LogEcxeption;

require_once __DIR__ . '/autoload.php';

$log = new LogEcxeption;
echo $log->readLog();
