<?php

require __DIR__ . '/vendor/autoload.php';


//This is how we get what page we should be on based on URL.
$GLOBALS['url_loc'] = explode('/', htmlspecialchars(strtok($_SERVER['REQUEST_URI'], '?'), ENT_QUOTES));

$GLOBALS['config']['url_offset'] = 0;
$GLOBALS['devmode'] = 1; 


$GLOBALS['config']['url'] = "https://imperfectgamers.org";

$GLOBALS['db_conf']['db_host'] = "127.0.0.1";
$GLOBALS['db_conf']['port'] = "3306";
$GLOBALS['db_conf']['db_db'] = "imperfectgamers";
$GLOBALS['db_conf']['db_user'] = "root";
$GLOBALS['db_conf']['db_pass'] = "";
$GLOBALS['db_conf']['db_charset'] = "utf8";

$GLOBALS['config']['private_folder'] = '../../private';
$GLOBALS['config']['avatar_folder'] = "/usr/www/igfastdl/postogon-cdn/assets/img/profile_pictures";
$GLOBALS['config']['service_folder'] = "/usr/www/igfastdl/postogon-cdn/assets/img/service_logos";
$GLOBALS['config']['avatar_url'] = "https://cdn.postogon.com/assets/img/profile_pictures";
$GLOBALS['config']['public_html_folder'] = "/usr/www/igfastdl/imperfectgamers-prototype";


 
//General settings
$GLOBALS['config']['avatar_max_size'] = '156';
$GLOBALS['config']['default_avatar'] = 'default.jpeg';

if($GLOBALS['config']['url_offset'] > 0){
    $x = 0; while($x < ($GLOBALS['config']['url_offset'])){ unset($GLOBALS['url_loc'][$x]); $x++; }
    $GLOBALS['url_loc'] = array_values($GLOBALS['url_loc']);
}
//Do not touch -- These are settings we should define or set, but not adjust unless we absolutely need to.
$GLOBALS['errors'] = array();

$GLOBALS['messages'] = array(); //Main array for all status messages
$GLOBALS['messages']['error'] = array(); //Main array for all status messages
$GLOBALS['messages']['warning'] = array(); //Main array for all status messages
$GLOBALS['messages']['success'] = array(); //Main array for all status messages

if(!ob_start("ob_gzhandler")) ob_start();
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once("../functions/functions.general.php");
include_once("../classes/class.user.php");
include_once("../classes/class.database.php");		
include_once("../classes/class.general.php");	
include_once("../classes/class.settings.php");	
include_once("../classes/class.PermissionUtil.php");	
include_once("../classes/class.forum.php");	
include_once("../functions/functions.sitemap.php");
