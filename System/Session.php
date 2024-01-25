<?php

/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */


namespace System;

class Session
{
  public static $time;

  public static function init()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
  }

  public static function set($key, $value)
  {
    self::init();
    $_SESSION[$key] = $value;
  }

  public static function get($key)
  {
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    } else {
      return false;
    }
  }

  public static function active($route)
  {
    if (self::get('route') == $route) {
      echo 'nav-active';
    } else {
      echo '';
    }
  }

  public static function token($key)
  {
    if (isset($_SESSION[$key])) {
      echo  $_SESSION[$key];
    } else {
      echo null;
    }
  }

  public static function chSession($token, $redirect)
  {
    self::init();
    if (self::get($token) == false) {
      self::destroy();
      self::redirect($redirect);
    }
  }

  public static function refreshAuth()
  {
    if (time() > strtotime((TOKEN_PERIOD * 60) + self::$time)) {
      self::destroy();
      self::redirect('Login');
    } else {
      self::$time = time() + (TOKEN_PERIOD * 60);
    }
  }

  public static function redirect($path)
  {
    header("Location:" . $path);
  }

  public static function captcha($length = 5)
  {
    function generateRandomString($length)
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 5)];
      }
      return $randomString;
    }

    $text = generateRandomString($length);
    $_SESSION["vercode"] = $text;
    $height = 50;
    $width = 200;
    $image_p = imagecreate($width, $height);
    imagecolorallocate($image_p, 255, 255, 255);
    $black = imagecolorallocate($image_p, 0, 125, 120);
    $white = imagecolorallocate($image_p, 255, 255, 255);
    $font_size = 35;
    imagestring($image_p, $font_size, 80, 15, $text, $black);
    return imagejpeg($image_p, Null, 90);
  }

  public static function unset($key)
  {
    unset($_SESSION[$key]);
  }

  public static function destroy()
  {
    session_unset();
    session_destroy();
  }
}
