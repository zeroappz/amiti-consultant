<?php
include_once 'config/Database.php';
include_once 'class/Slider.php';
$database = new Database();
$db = $database->getConnection();

$slider = new Slider($db);

if(!empty($_POST['action']) && $_POST['action'] == 'sliderListing') {
	$slider->getSliderListing();
}
if(!empty($_POST['action']) && $_POST['action'] == 'sliderDelete') {
	$slider->id = (isset($_POST['sliderId']) && $_POST['sliderId']) ? $_POST['sliderId'] : '0';
	$slider->delete();
}
?>