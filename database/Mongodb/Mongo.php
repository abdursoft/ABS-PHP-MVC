<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */


namespace DB\Mongodb;

use Exception;
use MongoDB\Client;

date_default_timezone_set(DB_SERVER_TIMEZONE);
class Mongo
{
    public static $db = array();
    public static function setDb()
    {
        try {
            $mb = MONDB;
            self::$db = (new Client(MONHOST))->$mb;
        } catch (Exception) {
            header("Location: " . BASE_URL . "connection");
        }
    }
}
