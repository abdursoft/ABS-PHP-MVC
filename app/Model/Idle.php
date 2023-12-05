<?php

namespace App\Model;

use DB\Database;

class Idle extends Database
{

    public static function all($condition){
        return Database::dataSelectObject(self::getTable(),$condition);
    }

    public static function single($key,$value,$order_id){
        return Database::singleDataObject(self::getTable(),$key,$value,$order_id);
    }

    public static function singleCondition($condition){
        return Database::singleDataObjectCondition(self::getTable(),$condition);
    }

    public static function create($data)
    {
        return Database::addData(self::getTable(), $data);
    }

    public static function update($data, $key, $value)
    {
        return Database::updateData(self::getTable(), $data, $key, $value);
    }

    public static function updateCondition($data, $condition)
    {
        return Database::updateDataCondition(self::getTable(), $data, $condition);
    }

    public static function delete($key, $value)
    {
        return Database::dataDelete(self::getTable(), $key, $value);
    }

    public static function deleteCondition($condition)
    {
        return Database::dataDeleteCondition(self::getTable(), $condition);
    }

    public static function rows()
    {
        return Database::selectRow(self::getTable());
    }

    public static function getID(){
        return Database::getLastID(self::getTable());
    }

    public static function getTable()
    {
        $class = get_called_class();
        $class = explode('\\', $class);
        return strtolower(end($class));
    }
}
