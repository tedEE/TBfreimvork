<?php

namespace tbf\App\Core;

class Db
{
    public $dbh;
    public function __construct()
    {
        $config = (include __DIR__ . '/../../config/db.php')['db'];
        $this->dbh = new \PDO(
            'mysql:host='.$config['host'] .';dbname=' .$config['dbname'],
            $config['user'],
            $config['password']);
    }

    public function execute($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
    }

    public function query($sql, $data = [], $class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS,$class );
    }

 }