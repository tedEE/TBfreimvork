<?php

namespace tbf\App\Core;

abstract class Model
{

    protected $id;
    protected $db;
    const TABLE = "";

    public function __construct()
    {
        $this->db = new Db();
    }

    protected function requestExecution($sql ,$res)
    {
        $this->db->execute($sql, $res);
    }
    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE ;
        return $db->query($sql, [] ,static::class);
    }

    /**
     * @param $id
     * @return null
     */
    public static function findById($id)
    {
        $data = [':id' => $id];
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query($sql, $data ,static::class);
        return $data ? $data[0] : null;
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