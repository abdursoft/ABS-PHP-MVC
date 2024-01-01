<?php 
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

//  localization 
define("LANGUAGE",'bn');

// application mood 
define('MOOD','web');

//Set base url
define("BASE_URL",'http://localhost/github/PHP-ABS-FRAMEWORK/ABS-PHP-MVC/'); //set root directory/domain
define("SITE_TITLE",'ABS MVC FRAMEWORK'); //site name or title
define("FAV_ICON",BASE_URL."assets/images/premium.png"); //site name or title
define('DEFAULT_KEYWORDS','crickbd cricket live score live cricket'); //Default keywords

// Server TimeZone 
define("DB_SERVER_TIMEZONE",'Asia/Dhaka');

// Database server 
define('DATABASE_SERVER','mongodb'); //supported database mysql,pgsql,mongodb

//MYSQL database credentials
define("DB",'abs_collage'); //Database Name
define("HOST",'localhost'); //Database Host Name
define("USER",'root'); //Database User Name
define("PASSWORD",''); //Database Password

//MYSQL database credentials
define("PGDB",'abs_collage'); //Database Name
define("PGHOST",'localhost'); //Database Host Name
define("PGUSER",'root'); //Database User Name
define("PGPASSWORD",''); //Database Password
define("PGPORT",''); //Database Password

// MONGODB database credentials 
define("MONDB",'xvoox'); //Database Name
define("MONHOST",'mongodb://localhost:27017'); //Database Host Name
define("MONUSER",'root'); //Database User Name
define("MONPASSWORD",''); //Database Password
define("MONPORT",''); //Database Password
define("MONSSL",''); //Database Password
define("MONREPLICASET",''); //Database Password
define("MONAUTHSOURCE",''); //Database Password

//Authentication 
define("TOKEN_PERIOD",20); //Expired session in minutes

//SMTP mail credentials and information
define("MAIL_HOST",'abs framework'); //Server Or gmail SMTP HOST
define("MAIL_PORT",587); //Server SMTP Port
define("MAIL_USERNAME",'noreply@abdursoft.com'); //User Mail Name
define("MAIL_SUPPORT",'support@abdursoft.com'); //Contact Mail Name
define("MAIL_PASSWORD",'ja#L~^'); //Mail Password
define("MAIL_WEBSITE",'abdursoft.com'); //Website Name
define("MAIL_TEAM","abdursoft"); //Support Team Name
define("MAIL_CONTACT","+8801892311511"); //Contact Phone Number
define("MAIL_OWNER_ADSRESS","Mithapukur, Rangpur,BANGLADESH"); //Office Address

//Bkash credentials
define('BKASH_APP_KEY','4f6o0'); //Bkash App Key
define("BKASH_APP_SECRET",'2is7hdktrg4b'); //Bkash App Secret
define("BKASH_PROXY","TokenizedCheckout"); //Bkash Proxy
define("BKASH_USERNAME",'sandboxTokenizedUser02'); //Bkash User Name
define("BKASH_PASSWORD",'sandboxTo@12345'); //Bkash Password
define("BKASH_SANDBOX",true); //True for Sandbox and false For Production

// jWT configuration 
define('JWT_ALG','HS256');
define('JWT_SECRET','ronyMe_2k23');
define('JWT_INTERVAL',10);
define('JWT_EXPAIR',3600);