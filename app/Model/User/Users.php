<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
namespace App\Model\User;

use DB\DBServer;

class Users extends DBServer
{
    public static function all($key,$limit=null){
        return self::$db::dataSelectObject(self::getTable(),$key,$limit);
    }

    public static function single($key,$value,$order_id){
        return self::$db::singleDataObject(self::getTable(),$key,$value,$order_id);
    }

    public static function singleCondition($condition){
        return self::$db::singleDataObjectCondition(self::getTable(),$condition);
    }

    public static function create($data)
    {
        return self::$db::addData(self::getTable(), $data);
    }

    public static function update($data, $key, $value)
    {
        return self::$db::updateData(self::getTable(), $data, $key, $value);
    }

    public static function updateCondition($data, $condition)
    {
        return self::$db::updateDataCondition(self::getTable(), $data, $condition);
    }

    public static function delete($key, $value)
    {
        return self::$db::dataDelete(self::getTable(), $key, $value);
    }

    public static function deleteCondition($condition)
    {
        return self::$db::dataDeleteCondition(self::getTable(), $condition);
    }
    
    public static function distinct($key,$condition=null){
        return self::$db::distinctTable(self::getTable(),$key,$condition);
    }

    public static function rows($condition=null)
    {
        return self::$db::countRows(self::getTable(),$condition);
    }

    public static function getID($key){
        return self::$db::getLastID(self::getTable(),$key);
    }

    public static function getTable()
    {
        $class = get_called_class();
        $class = explode('\\', $class);
        return strtolower(end($class));
    }
}
