<?php 
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

//  localization 
define("LANGUAGE",'bn');

//Set base url
define("BASE_URL",'http://localhost/collage/'); //set root directory/domain
define("SITE_TITLE",'MIUI23'); //site name or title
define("FAV_ICON",BASE_URL."assets/images/premium.png"); //site name or title

//Database credentials
define("DB",'abs_collage'); //Database Name
define("HOST",'localhost'); //Database Host Name
define("USER",'root'); //Database User Name
define("PASSWORD",''); //Database Password

//Authentication 
define("TOKEN_PERIOD",20); //Expired session in minutes

//SMTP mail credentials and information
define("MAIL_HOST",'mail.crickbd.live'); //Server Or gmail SMTP HOST
define("MAIL_PORT",587); //Server SMTP Port
define("MAIL_USERNAME",'noreply@crickbd.live'); //User Mail Name
define("MAIL_SUPPORT",'support@crickbd.live'); //Contact Mail Name
define("MAIL_PASSWORD",'j#@9Ta#sqv?mL~^'); //Mail Password
define("MAIL_WEBSITE",'crickbd.live'); //Website Name
define("MAIL_TEAM","CRICKBD"); //Support Team Name
define("MAIL_CONTACT","+8801892311511"); //Contact Phone Number
define("MAIL_OWNER_ADSRESS","Mithapukur, Rangpur,BANGLADESH"); //Office Address

//Bkash credentials
define('BKASH_APP_KEY','4f6o0cjiki2rfm34kfdadl1eqq'); //Bkash App Key
define("BKASH_APP_SECRET",'2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b'); //Bkash App Secret
define("BKASH_PROXY","TokenizedCheckout"); //Bkash Proxy
define("BKASH_USERNAME",'sandboxTokenizedUser02'); //Bkash User Name
define("BKASH_PASSWORD",'sandboxTokenizedUser02@12345'); //Bkash Password
define("BKASH_IFRAME",true); //True For Iframe and false For Tokenized 
define("BKASH_SANDBOX",true); //True for Sandbox and false For Production