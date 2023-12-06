<?php

/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

namespace System;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

include "vendor/autoload.php";


class Auth
{
    public static $time;

    public static function jwtAUTH($data, $audience)
    {
        self::$time = time();
        $payload = [
            "iss"   => $_SERVER['HTTP_HOST'],
            'iat'   => self::$time,
            'nbf'   => self::$time + JWT_INTERVAL,
            'exp'   => self::$time + JWT_EXPAIR,
            'aud'   => $audience,
            'data'  => $data
        ];

        $token = JWT::encode($payload, JWT_SECRET, JWT_ALG);
        return $token;
    }

    public static function jwtDecode($token)
    {
        JWT::$leeway = 50;
        $decode = JWT::decode($token, new Key(JWT_SECRET, JWT_ALG));
        return $decode;
    }

    public static function found($token)
    {
        try {
            $data = self::jwtDecode($token);
            return $data;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function getHeader()
    {
        $header = getallheaders();
        if ($header['Authorization'] != '') {
            $token = self::found(self::tokenSanitizer($header['Authorization']));
            if (is_array($token) || is_object($token)) {
                return $token;
            } else {
                if($token == 'Expired token'){
                    try {
                        $tok = self::refreshToken(self::tokenSanitizer($header['Authorization']));
                        print_r($tok);
                    } catch (\Throwable $th) {
                        echo self::response([
                            'status' => 0,
                            'message' => $th->getMessage(),
                        ], 500);
                    }
                }else{
                    echo self::response([
                        'status' => 0,
                        'message' => $token,
                    ], 500);
                }
            }
        } else {
            echo self::response([
                'status' => 0,
                'message' => 'Unauthorized Token!'
            ], 500);
        }
    }

    public static function tokenSanitizer($token)
    {
        return trim(str_replace('Bearer', '', $token));
    }

    public static function response(array $data, $code)
    {
        http_response_code($code);
        header('Content-type:application/json');
        echo json_encode($data);
        die;
    }

    public static function refreshToken($token)
    {
        $header = getallheaders();
        if ($header['Authorization'] != '') {
            try {
                $decoded = JWT::decode(self::tokenSanitizer($token), new Key(JWT_SECRET, JWT_ALG));
            } catch (\Firebase\JWT\ExpiredException $e) {
                JWT::$leeway = 720;
                $decoded = (array) JWT::decode(self::tokenSanitizer($token), new Key(JWT_SECRET, JWT_ALG));
                $decoded['iat'] = time();
                $decoded['exp'] = time() + JWT_EXPAIR;
                return JWT::encode($decoded,JWT_SECRET,JWT_ALG);
            } catch (\Exception $e) {
                echo self::response([
                    'status' => 0,
                    'message' => $e->getMessage(),
                ], 500);
            }
        }else{
            echo self::response([
                'status' => 0,
                'message' => "Unauthorized Token or Not Found",
            ], 500);
        }
    }
}
