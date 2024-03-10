<?php
namespace DB\Firebase;

use Kreait\Firebase\Factory;

date_default_timezone_set(DB_SERVER_TIMEZONE);

class Firebase{
    public static $db = array();
    public static function setDb(){
        try {
            $fr = (new Factory())
            ->withServiceAccount('database/Firebase/sdk.json')
            ->withDatabaseUri('https://xvoox-14b60-default-rtdb.firebaseio.com');   
            self::$db = $fr->createDatabase(); 
        } catch (\Throwable $th) {
            print_r($th->getMessage());
            die;
            header("Location: /connection");
        }
    }
}