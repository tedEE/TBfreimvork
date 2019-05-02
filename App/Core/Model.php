<?php
namespace tbf\App\Core;

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
        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }
//        xprint($cols, 'insert $cols');
//        xprint($data, 'insert $data');
        $sql = ('INSERT INTO ' . static::TABLE . '('. implode(', ', $cols).')VALUES ('.implode(', ', array_keys($data)).')') ;
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function delete ($id )
    {
        $res = [
            ':id' => $id
        ];
        $sql = ('DELETE FROM `' . static::TABLE . '` WHERE `' . static::TABLE . '` . `id` = :id' ) ;
        $db = new Db();
        $db->execute($sql, $res);
    }

    public function execSql ($sql, $data = [])
    {
        $db = new Db();
        $db->execute($sql, $data);
    }

    /**
     * Пока работает только так ->update( $data , ['id' => 38] );
     * надо допилить чтб можно было id передавать как int
     * @param $data
     * @param $sampling_field
     */
	    public function update($data, $sampling_field )
    {
        $fields = '';
        $wherwFields = [];

        if (!is_int($sampling_field)) {
            foreach ($sampling_field as $key => $val) {
                $wherwFields = "`$key` = :$key";
            }
        }

        foreach ($data as $name => $value) {
            $res[':' . $name] = $value;
        }
        foreach ($sampling_field as $name => $value) {
            $sampling[':' . $name] = $value;
        }

        foreach ($data as $key => $val) {
            $fields .= '`' . $key . '`' . '=:' . $key . ', ';
        }

        $res = array_merge($res, $sampling);


        $fields = rtrim($fields); // удаление пустой строки
        $fields = rtrim($fields, ',');// удаление лишней запятой
        $sql = ('UPDATE '  .'`' . static::TABLE  . '`' . " SET $fields WHERE $wherwFields" ) ;

        $db = new Db();
        $db->execute($sql, $res);

    }


}