<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
namespace DB\Postgresql;

use PDO;

date_default_timezone_set(DB_SERVER_TIMEZONE);
class Postgress{
    public static $db = array();
    public static function setDb(){
        {
            try {
                $dsn = "pgsql:host=".PGHOST.";port=".PGPORT.";dbname=".PGDB.";";
                self::$db = new PDO( $dsn,  PGUSER,  PGPASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
}