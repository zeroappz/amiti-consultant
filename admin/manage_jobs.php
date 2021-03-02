<?php
include_once 'config/Database.php';
include_once 'class/Jobs.php';
$database = new Database();
$db = $database->getConnection();

$job = new Job($db);

if(!empty($_POST['action']) && $_POST['action'] == 'jobsListing') {
	$job->getJobsListing();
}
if(!empty($_POST['action']) && $_POST['action'] == 'jobDelete') {
	$job->id = (isset($_POST['jobId']) && $_POST['jobId']) ? $_POST['jobId'] : '0';
	$job->delete();
}
?>