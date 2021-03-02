<?php

include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Post.php';
include_once 'class/Category.php';
include_once 'class/Setting.php';
include_once 'class/Slider.php';
include_once 'class/Jobs.php';

error_reporting(0);

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$post = new Post($db);
$category = new Category($db);
$setting = new Setting($db);
$slider = new Slider($db);
$job = new Job($db);

if(!$user->loggedIn()) {
	header("location: index.php");
}

$setting = new Setting($db);

$setting->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$saveMessage = '';

if(!empty($_POST["settingSave"]) && $_POST["businessName"]!='') {
	$setting->business_name = $_POST["businessName"];
	$setting->contact_no = $_POST["contactNo"];
	$setting->firm_email = $_POST["email"];	
	$setting->fb_url = $_POST["fb"];
	$setting->yt_url = $_POST["yt"];	
	$setting->lin_url = $_POST["lin"];		
	$setting->twt_url = $_POST["twt"];	
	$setting->street = $_POST["street"];	
	$setting->city = $_POST["city"];
	$setting->state = $_POST["state"];	
	$setting->country = $_POST["country"];		
	$setting->zipcode = $_POST["zipcode"];	
	if($setting->id) {			
		if($setting->update()) {
			$saveMessage = "setting updated successfully!";
		}
	}
	else {		
		$lastInserId = $setting->insert();
		if($lastInserId) {
			$setting->id = $lastInserId;
			$saveMessage = "setting saved successfully!";
		}
	}
}

$settingDetails = $setting->getSetting();
 
include('inc/header.php');
?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/posts.js"></script>	
<link href="css/style.css" rel="stylesheet" type="text/css" >  
</head>
<body>
<?php include "menus.php"; ?>
<header id="header">
	<div class="container">
		<div class="row">
        <div class="col-md-10">
          <a href="../index.html" class="brand-link">
            <img src="./img/logo.png" alt="Amiti Logo" class="brand-image img-circle elevation-3" style="opacity: .8;background: white;">
          </a>
        </div>
			<br>			
		</div>
	</div>
</header>
<br>
<section id="main">
	<div class="container"  style="width:100%;">
		<div class="row">	
		<?php include "left_menus.php"; ?>
			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-heading" style="background-color:  #0071BD;">
					<h3 class="panel-title">Add / Edit setting</h3>
				  </div>
				  <div class="panel-body">
				  
					<form method="post" id="postForm">							
						<?php if ($saveMessage != '') { ?>
							<div id="login-alert" class="alert alert-success col-sm-12"><?php echo $saveMessage; ?></div>                            
						<?php } ?>
						
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Business Name</label>
							<input type="text" class="form-control" id="businessName" name="businessName" value="<?php echo $settingDetails['business_name']; ?>" placeholder="business name..">							
						</div>	
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Contact No.</label>
							<input type="text" class="form-control" id="contactNo" name="contactNo" value="<?php echo $settingDetails['contact_no']; ?>" placeholder="contact">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Email</label>
							<input type="text" class="form-control" id="email" name="email" value="<?php echo $settingDetails['firm_email']; ?>" placeholder="email">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Facebook URL</label>
							<input type="text" class="form-control" id="fb" name="fb" value="<?php echo $settingDetails['fb_url']; ?>" placeholder="fb">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Youtube URL</label>
							<input type="text" class="form-control" id="yt" name="yt" value="<?php echo $settingDetails['yt_url']; ?>" placeholder="yt">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Linkedin URL</label>
							<input type="text" class="form-control" id="lin" name="lin" value="<?php echo $settingDetails['lin_url']; ?>" placeholder="lin">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Twitter URL</label>
							<input type="text" class="form-control" id="twt" name="twt" value="<?php echo $settingDetails['twt_url']; ?>" placeholder="twt">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Street</label>
							<input type="text" class="form-control" id="street" name="street" value="<?php echo $settingDetails['street']; ?>" placeholder="street">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">City</label>
							<input type="text" class="form-control" id="city" name="city" value="<?php echo $settingDetails['city']; ?>" placeholder="city">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">State</label>
							<input type="text" class="form-control" id="state" name="state" value="<?php echo $settingDetails['state']; ?>" placeholder="state">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Country</label>
							<input type="text" class="form-control" id="country" name="country" value="<?php echo $settingDetails['country']; ?>" placeholder="country">							
						</div>
						<div class="form-group col-md-6">
							<label for="title" class="control-label">Zip Code</label>
							<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $settingDetails['zipcode']; ?>" placeholder="zipcode">							
						</div>

						
						<input type="submit" name="settingSave" id="settingSave" class="btn btn-info" value="Save" />											
					</form>				
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('inc/footer.php');?>
