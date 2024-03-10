<?php

/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

namespace DB\Mongodb;

use PDO;

class MNDatabase extends Mongo
{
    // Email Validation
    public static function email_verify($email)
    {
        //like as abdur.com@gmail.com
        $regexp = "/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
        if (!preg_match($regexp, $email)) {
            return false;
        } else {
            return true;
        }
    }

    // Data Insertation
    public static function addData($table, $input)
    {
        $insertOneResult = self::$db->$table->insertOne($input);
        return ($insertOneResult->getInsertedId());
    }

    public static function getLastID($name)
    {
        return self::$db->lastInsertId($name);
    }

    // Data updatation
    public static function updateData($table, $input, $key, $value)
    {
        return self::$db->$table->findOneAndUpdate([
            $key => $value,
        ], [
            '$set' => $input,
        ]);
    }

    // Data updatation
    public static function updateManyData($table, $input, $key, $value)
    {
        return self::$db->$table->updateMany([
            $key => $value,
        ], [
            '$set' => $input,
        ]);
    }

    public static function updateManyCondition($table, $input, $condition)
    {
        return self::$db->$table->updateMany($condition, [
            '$set' => $input,
        ]);
    }

    // Data updatationCondition
    public static function updateDataCondition($table, $data, $condition)
    {
        return self::$db->$table->findOneAndUpdate(
            $condition,
            [
                '$set' => $data,
            ]
        );
    }

    public static function select($sql)
    {
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return (object) $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public static function selectAll($sql)
    {
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return (object) $stmt->fetchALl(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function selectRow($table)
    {
        $rows = self::$db->$table->count();
        return $rows;
    }

    public static function selectById($table, $id)
    {
        $sql  = "SELECT * FROM $table WHERE id=:id";
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function aggregate($table1, $table2, $primary_Key, $secondary_key, $lookup_as,$pipeline)
    {
        return self::$db->$table1->aggregate([
            $pipeline,
            [
                '$lookup' => [
                    'from'         => $table2,
                    'localField'   => $secondary_key,
                    'foreignField' => $primary_Key,
                    'as'           => $lookup_as,
                ]
            ],
            [
                '$unwind' => "$$lookup_as",
            ],
        ]);
    }

    // Data SelectingObject
    public static function dataSelectObject($table, $condition = null, array $option = [null])
    {
        if (is_array($condition)) {
            $result = self::$db->$table->find(
                $condition,
                $option
            );
        } else {
            $result = self::$db->$table->find(
                [],
                $option
            );
        }
        return ($result);
    }

    // Data SelectingObject
    public static function countRows($table, $condition)
    {
        $rows = self::$db->$table->count($condition);
        return $rows;
    }

    // Single Data SelectingObject
    public static function singleDataObject($table, $key_name, $key_value, $order_id = null)
    {
        $result = self::$db->$table->findOne([
            $key_name => $key_value,
        ]);
        return ($result);
    }

    // Single Data SelectingObject
    public static function singleDataObjectCondition($table, array $condition)
    {
        $result = self::$db->$table->findOne($condition);
        return ($result);
    }

    // Data Deletion
    public static function dataDelete($table, $del_key, $del_value)
    {
        return self::$db->$table->findOneAndDelete([
            $del_key => $del_value,
        ]);
    }

    // Data Deletion
    public static function dataDeleteCondition($table, array $condition)
    {
        return self::$db->$table->findOneAndDelete($condition);
    }

    public static function distinctTable($table, $key, $condition = null)
    {
        return self::$db->$table->distinct($key, $condition);
    }

    public static function innerJoinData($firstTable, $secondTable, $id, $key, $joinKey)
    {
        $sql = "SELECT $firstTable.*, $secondTable.u_secret FROM $firstTable INNER JOIN $secondTable ON $firstTable.user_id = $secondTable.u_token WHERE $firstTable.id= '3'";
        return self::selectAll($sql);
    }

    public static function innerJoinKey($firstTable, $secondTable, $thirdtable, $key, $massKey)
    {
        $sql = "SELECT a.*, b.channel_name,b.u_profile,b.u_token,c.* FROM $firstTable a  LEFT JOIN $secondTable b ON a.$key = b.$massKey LEFT JOIN $thirdtable c ON a.$key = c.$key";
        return self::selectAll($sql);
    }

    public static function leftJoin($table1, $table2, $key1, $key2, $token_key, $token)
    {
        $data = (array) self::$db->$table1->find([
            $token_key => $token,
        ]);

        $data1 = (array) self::$db->$table2->find([
            $key2 => $data[$key1],
        ]);
        return (object) array_merge($data, $data1);
    }

    public static function innerJoinKeySignle($tables, $keys, $key_value)
    {
        // $sql = "SELECT a.*, b.channel_name,b.u_profile,b.u_token,c.* FROM $firstTable a  LEFT JOIN $secondTable b ON a.$key = b.$massKey LEFT JOIN $thirdtable c ON a.$key = c.$key";

        $s = "SELECT stream.* users.* views.*  FROM stream stream LEFT JOIN users users ON stream.user_id = users.u_token LEFT JOIN views views ON stream.stream_id = views.content_id";

        $sql = "SELECT ";
        if (is_array($tables)) {
            for ($i = 0; $i < count($tables); $i++) {
                $sql .= substr($tables[$i], 0, -1) . ".*, ";
            }
            $sql = substr($sql, 0, -2);
            $sql .= " FROM $tables[0] " . substr($tables[0], 0, -1) . " ";
            for ($i = 0; $i < count($tables); $i++) {
                if ($i > 0) {
                    $key = explode(',', $keys[$i]);
                    $sql .= "LEFT JOIN $tables[$i] " . substr($tables[$i], 0, -1) . " ON " . substr($tables[0], 0, -1) . ".$key[0] = " . substr($tables[$i], 0, -1) . ".$key[1] ";
                }
            }
            $ky = explode(',', $keys[0]);
            $sql .= " WHERE " . substr($tables[0], 0, -1) . "." . $ky[1] . " = '$key_value' ORDER BY id DESC";
        }
        // return $sql;
        return self::selectAll($sql);
    }

    public static function innerJoinKeyAll($tables, $keys, $key_value)
    {
        for ($i = 0; $i < count($tables); $i++) {
        }
    }

    public static function innerJoinMultipleKey($tables, $keys, $key, $key_value, $mKeys)
    {
        $sql = "SELECT ";
        if (is_array($tables)) {
            for ($i = 0; $i < count($tables); $i++) {
                $sql .= substr($tables[$i], 0, -1) . ".*, ";
            }
            $sql = substr($sql, 0, -2);
            $sql .= " FROM $tables[0] " . substr($tables[0], 0, -1) . " ";
            for ($i = 0; $i < count($tables); $i++) {
                if ($i > 0) {
                    for ($j = 0; $j < count($mKeys); $j++) {
                    }
                    $key = explode(',', $keys[$i]);
                    $sql .= "LEFT JOIN $tables[$i] " . substr($tables[$i], 0, -1) . " ON " . substr($tables[0], 0, -1) . ".$key[0] = " . substr($tables[$i], 0, -1) . ".$key[1] ";
                }
            }
            $ky = explode(',', $keys[0]);
            $sql .= " WHERE " . substr($tables[0], 0, -1) . "." . $ky[1] . " = '$key_value' ORDER BY id DESC";
        }
    }
}

MNDatabase::setDb();
