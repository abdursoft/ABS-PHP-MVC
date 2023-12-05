<?php 
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
namespace System\I18;

use System\Auth;

class Text{

    public static function setLang($language){
        $_SESSION['lang'] = $language;
    }

    public static function show($key){
        $language = Auth::get('lang') ?? LANGUAGE;
        if(file_exists('system/I18/text/'.$language.'.php')){
            include 'system/I18/text/'.$language.'.php';
            return $_lang[$key];
        }else{
           include 'system/I18/text/en.php';
           return $_lang[$key];
        }
    }
}
