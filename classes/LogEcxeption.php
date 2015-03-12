<?php
namespace Full\Classes;

class LogEcxeption
    extends \ErrorException {

    public function dataLog ($date, $file, $line, $message) {

        $res = 'ДАТА/ВРЕМЯ: ' . $date . "\r\n" .
            ' АДРЕС ФАЙЛА: ' . $file . "\r\n" .
            ' СТРОКА ОШИБКИ: ' . $line . "\r\n" .
            ' СООБЩЕНИЕ: ' . "'" . $message . "'" . "\r\n" ;
        file_put_contents(__DIR__ . '/../Error.txt', $res, FILE_APPEND);
    }

    public function readLog() {

        return file_get_contents(__DIR__ . '/../Error.txt');
    }

} 