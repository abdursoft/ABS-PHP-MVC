<?php
namespace System;
class Auth
{
  public static $time;

  public static function init()
  {
    if(!isset($_SESSION)){
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

  public static function active($route){
    if(self::get('route') == $route){
      echo 'nav-active';
    }else{
      echo '';
    }
  }

  public static function token($key){
    if (isset($_SESSION[$key])) {
      echo  $_SESSION[$key];
    } else {
      echo null;
    }
  }

  public static function chSession($token,$redirect)
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

  public static function redirect($path){
    header("Location:".$path);
  }

  public static function unset($key){
    unset($_SESSION[$key]);
  }

  public static function destroy()
  {
    session_unset();
    session_destroy();
  }
}
?>