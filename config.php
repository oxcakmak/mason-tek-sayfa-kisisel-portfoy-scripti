<?php
@ob_start();
@session_start();
date_default_timezone_set('Europe/Istanbul');
require_once('PDODb.php');
$dbh = new PDODb([
	'type' => 'mysql',
	'host' => 'localhost',
	'username' => 'oxcakma1_oxcakmak', 
	'password' => '#SFG?A_~*S^Q@}2&+z',
	'dbname'=> 'oxcakma1_mason',
	'charset' => 'utf8'
]);
define("BASE_URL", "https://demo.oxcakmak.com/mason/"); //Website Address (Ex.: https://example.com/)
define("INDEX_ASSETS_FOLDER", BASE_URL.'assets/index/');
define("PANEL_ASSETS_FOLDER", BASE_URL.'assets/panel/');
define("ACTION_URL", BASE_URL.'action');
/* Language File */
include("language/tr_TR.php");
/* Functions File */
include("function.oxcakmak.lib.php");
$oxcakmak = new oxcakmak;
/* User */
if(isset($_SESSION['session'])){
	if($oxcakmak->checkIsMail($_SESSION['user'])){
		$dbh->where("user_email", $_SESSION['user']);
	}else{
		$dbh->where("user_username", $_SESSION['user']);
	}
	$userRow = $dbh->getOne("user");
	define("USER_USERNAME", $userRow['user_username']);
	define("USER_EMAIL", $userRow['user_email']);
	define("USER_PASSWORD", $userRow['user_password']);
	define("USER_STATUS", $userRow['user_status']);
	define("USER_ROLE", $userRow['user_role']);
}
/* Settings */
$dbh->where("setting_name", "setting");
$settingRow = $dbh->getOne("setting");
define("ST_META_TITLE", $settingRow['setting_meta_title']);
define("ST_META_DESCRIPTION", $settingRow['setting_meta_description']);
define("ST_META_KEYWORD", $settingRow['setting_meta_keyword']);
define("ST_META_STUCK", $settingRow['setting_meta_stuck']);
define("ST_META_SPERATOR", $settingRow['setting_meta_sperator']);
define("ST_FOOTER", $settingRow['setting_footer']);
define("ST_BANNER_IMAGE", $settingRow['setting_banner_image']);
define("ST_BANNER_TITLE", $settingRow['setting_banner_title']);
define("ST_BANNER_FIRST", $settingRow['setting_banner_first']);
define("ST_ABOUT_NAME", $settingRow['setting_about_name']);
define("ST_ABOUT_JOB", $settingRow['setting_about_job']);
define("ST_ABOUT_CONTENT", $settingRow['setting_about_content']);
define("ST_ABOUT_IMAGE", $settingRow['setting_about_image']);
define("ST_CONTACT_LOCATION", $settingRow['setting_contact_location']);
define("ST_CONTACT_PHONE", $settingRow['setting_contact_phone']);
define("ST_CONTACT_EMAIL", $settingRow['setting_contact_email']);
define("ST_PARTICLES_STATUS", $settingRow['setting_particles_status']);
define("ST_PRELOADER_STATUS", $settingRow['setting_preloader_status']);

/*
define("ST_", $settingRow['setting_']);

*/
/* Demo Mode */
define("DEMO_MODE", 1);
?>