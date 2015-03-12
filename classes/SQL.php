<?php
namespace Full\Classes;

use Full\Classes\LogEcxeption;

class SQL {

    private $dbh;
    private $class = 'stdClass';

    public function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:dbname=ШП;host=localhost', 'root', '');
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e) {
            throw new \PDOException('Нет подключения к базе данных..');
    }

    }

    public function className($className) {

        $this->class = $className;
    }

    public function query($sql, $parameters=[]) {

            $res = $this->dbh->prepare($sql);
            $res->execute($parameters);
            return $res->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function queryOther($sql, $parameters=[]) {

        $res = $this->dbh->prepare($sql);
        return $res->execute($parameters);
    }
}