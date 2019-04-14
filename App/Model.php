<?php

namespace tbf\App;

use tbf\App\Db;
abstract class Model
{

    public $id;
    const TABLE = "";

    protected function requestExecution($sql ,$res)
    {
        $db = new Db();
        $db->execute($sql, $res);
    }
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
        $res = [];

        foreach ($fields as $name => $value){
            if ('id' == $name){
                continue;
            }
            $cols[] = $name;
            $res[':' . $name] = $value;

        }

        $sql = ('INSERT INTO ' . static::TABLE . '('. implode(', ', $cols).')VALUES ('.implode(', ', array_keys($res)).')') ;


        $this->requestExecution($sql , $res);
    }

    public function update($id, $row ,$data )
    {
        $res = [
            ':id' => $id,
            ':data' => $data
        ];

        $sql = ('UPDATE '  .'`' . static::TABLE  . '`' . ' SET `'. $row. '` = :data WHERE `id` = :id' ) ;
        $this->requestExecution($sql , $res);
    }



    public function delete ($id )
    {
        $res = [
            ':id' => $id
        ];

        $sql = ('DELETE FROM `' . static::TABLE . '` WHERE `' . static::TABLE . '` . `id` = :id' ) ;
        $this->requestExecution($sql , $res);
    }
}