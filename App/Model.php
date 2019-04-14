<?php

namespace tbf\App;

use tbf\App\Db;
abstract class Model
{

    public $id;
    const TABLE = "";
    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE ;
        return $db->query($sql, [] ,static::class);
    }

    public static function findById($id)
    {
        $data = [':id' => $id];
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        return $db->query($sql, $data ,static::class);
    }

    public function insert()
    {
        $fields = get_object_vars($this); //возвращает поля текущего обЪкта
        $cols = [];
        $data = [];

        foreach ($fields as $name => $value){
            if ('id' == $name){
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;

        }
        var_dump($cols);
        var_dump($data);

        $sql = ('INSERT INTO ' . static::TABLE . '('. implode(', ', $cols).')VALUES ('.implode(', ', array_keys($data)).')') ;

        echo $sql;

        $db = new Db();
//        $db->execute($sql, $data);
    }

    public function update($id, $row ,$data )
    {
        $res = [
            ':id' => $id,
            ':data' => $data
        ];

        $sql = ('UPDATE '  .'`' . static::TABLE  . '`' . ' SET `'. $row. '` = :data WHERE `id` = :id' ) ;
        echo $sql;
        $db = new Db();
        $db->execute($sql, $res);
    }
}