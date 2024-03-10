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
define('DATABASE_SERVER','mysql'); //supported database mysql,pgsql,mongodb,firebase

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

// AWS Bucket Credentials 
define('AWS_KEY', 'AKIAWYXPPPGV7L6WRZXB');
define('AWS_SECRET','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');
define('AWS_BUCKET_INPUT','xvoox-upload');
define('AWS_BUCKET_OUTPUT','xvoox-upload-store');
define('AWS_REGION','us-east-1');
define('AWS_HOST','https://d1qjop26vbxqxj.cloudfront.net');
define('AWS_PIPELINE','1684746968672-c4z1yk');
define('AWS_PRESET_ID','1684771800607-2ilzcg');

// cloudflare credentials 
define('CLOUD_REGION','Asia-Pacific');
define('CLOUD_BUCKET','temp');
define('CLOUD_IMAGE_BUCKET','xvoox-image');
define('CLOUD_VIDEO_BUCKET','xvoox-video');
define('CLOUD_TOKEN','wSmLFp37XP9Uct7dMb-WLuKA0BQ3HEA0SBDQmcD9');
define('CLOUD_ACCESS_KEY','01a5c9ff20a9b97a807c3a1a017a730d');
define('CLOUDE_SECRET_KEY','86317a46340d852721070f2187a9fdfb9aa8eee3b9f437fc83de10ce126611b2');
define('CLOUD_ENDPOINT','https://722d8cdd43b34b655c9d3f0908aa47ad.r2.cloudflarestorage.com');
define('CLOUD_BUCKET_HOST','https://pub-a9c1ee78e9ef47e2ad361b4bec7588e7.r2.dev/');
define('CLOUD_TEMP_URL','https://temp.tvupload.tv/');
define('CLOUD_IMAGE_URL','https://pub-2cddc97fe91d4891aefcf3394d39c71b.r2.dev/');
define('CLOUD_VIDEO_URL','https://pub-cc5d6e0276124a75bd10755e715a65e5.r2.dev/');

// coconut api
define('COCONUT_API_KEY','k-32d7d82529a2ffca033b21dd61b3c44b');

// jWT configuration 
define('JWT_ALG','HS256');
define('JWT_SECRET','ronyMe_2k23');
define('JWT_INTERVAL',10);
define('JWT_EXPAIR',3600);