<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

namespace DB;
use DB\Mongodb\MNDatabase;
use DB\Mysql\Database;
use DB\Postgresql\PGDatabase; 

class DBServer{
    public static $db = array();
    public static function setDb(){
        {
            switch(DATABASE_SERVER){
                case 'mysql':
                    self::$db = new Database;
                    break;
                case 'pgsql':
                    self::$db = new PGDatabase;
                    break;
                case 'mongodb':
                    self::$db = new MNDatabase;
            }
        }
    }
}

$db_server = new DBServer();
$db_server::setDb();