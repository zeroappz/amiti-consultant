<?php
include_once 'config/Database.php';
include_once 'class/Setting.php';
$database = new Database();
$db = $database->getConnection();

$setting = new Setting($db);

if(!empty($_POST['action']) && $_POST['action'] == 'settingListing') {
	$setting->getSettingListing();
}
if(!empty($_POST['action']) && $_POST['action'] == 'settingDelete') {
	$setting->id = (isset($_POST['settingId']) && $_POST['settingId']) ? $_POST['settingId'] : '0';
	$setting->delete();
}
?>