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

    public static function all($condition,array $option = []){
        return self::$db::dataSelectObject(self::getTable(),$condition,$option);
    }

    public static function single($key,$value,$order_id){
        return self::$db::singleDataObject(self::getTable(),$key,$value,$order_id);
    }


    public static function create($data)
    {
        return self::$db::addData(self::getTable(), $data);
    }

    public static function update($data, $key, $value)
    {
        return self::$db::updateData(self::getTable(), $data, $key, $value);
    }


    public static function delete($key, $value)
    {
        return self::$db::dataDelete(self::getTable(), $key, $value);
    }

    public static function distinct($key){
        return self::$db::distinctTable(self::getTable(),$key);
    }

    public static function rows()
    {
        return self::$db::selectRow(self::getTable());
    }

    public static function getID(){
        return self::$db::getLastID(self::getTable());
    }

    public static function getTable()
    {
        $class = get_called_class();
        $class = explode('\\', $class);
        return strtolower(end($class));
    }
}
