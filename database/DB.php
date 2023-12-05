<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
namespace DB;

use PDO;
use PDOException;
date_default_timezone_set("Asia/Dhaka");
class DB{
    public static $db = array();
    public static function setDb(){
        {
            try{
                $dsn = "mysql:dbname=".DB."; host=".HOST;
                self::$db = new PDO( $dsn,  USER,  PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(PDOException $ex){
                header("Location: ".BASE_URL."connection");
            }
        }
    }
}