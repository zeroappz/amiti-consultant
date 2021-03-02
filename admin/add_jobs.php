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





$job->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';
$saveMessage = '';

if(!empty($_POST["savePost"]) && $_POST["title"]!=''&& $_POST["description"]!='') {
    

	$job->title = $_POST["title"];
	$job->role = $_POST["role"];
	$job->description = $_POST["description"];
	$job->salaryfrom = $_POST["salaryfrom"];
	$job->salaryto = $_POST["salaryto"];
	$job->expfrom = $_POST["expfrom"];
	$job->expto = $_POST["expto"];
   
	if($job->id) {	
		//echo $job->update();
		if($job->update()) {
			$saveMessage = "Job details updated successfully!";
		}else{
            $saveMessage = "Something went wrong";
        }
	} else {
       // echo $insert;
		$job->userid = $_SESSION["userid"];
			
		$lastInserId = $job->insert();
		if($lastInserId) {
			$job->id = $lastInserId;
			$saveMessage = "Job details saved successfully!";
		}
	}
}

$jobdetails = $job->getJob();

include('inc/header.php');
?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/slider.js"></script>	
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
	<div class="container" style="width:100%;">
		<div class="row">	
			<?php include "left_menus.php"; ?>
			<div class="col-md-10">
				<div class="panel panel-default">
				  <div class="panel-heading" style="background-color:  #0071BD;">
					<h3 class="panel-title">Add New Job</h3>
				  </div>
				  <div class="panel-body">
				  
					<form method="post" id="postForm">							
						<?php if ($saveMessage != '') { ?>
							<div id="login-alert" class="alert alert-success col-sm-12"><?php echo $saveMessage; ?></div>                            
						<?php } ?>
						<div class="form-group">
							<label for="title" class="control-label">Title</label>
							<input type="text" class="form-control" id="title" name="title" value="<?php echo $jobdetails['title']; ?>" placeholder="Post title..">							
						</div>

						<div class="form-group">
							<label for="role" class="control-label">Role</label>
							<input type="text" class="form-control" id="role" name="role" value="<?php echo $jobdetails['role']; ?>" placeholder="Post role..">							
						</div>
						
						<div class="form-group">
							<label for="description" class="control-label">Description</label>							
							<textarea class="form-control" rows="5" id="description" name="description" placeholder="Post description.."><?php echo $jobdetails['description']; ?></textarea>					
						</div>	

						<div class="form-group">
							<label for="salary" class="control-label">Salary Range</label>
							<input type="number" class="form-control" id="salary" name="salaryfrom" value="<?php echo $jobdetails['salaryfrom']; ?>" placeholder="Range from..">		
							<input type="number" class="form-control" id="salary" name="salaryto" value="<?php echo $jobdetails['salaryto']; ?>" placeholder="Range to..">												
						</div>
                        
						<div class="form-group">
							<label for="exp" class="control-label">Experience</label>
							<input type="number" class="form-control" id="exp" name="expfrom" value="<?php echo $jobdetails['expfrom']; ?>" placeholder="Post experience.."><span>in Yrs</span>							
							<input type="number" class="form-control" id="exp" name="expto" value="<?php echo $jobdetails['expto']; ?>" placeholder="Post experience..">	<span>in Yrs</span>							
                        </div>					
												
						<input type="submit" name="savePost" id="savePost" class="btn btn-info" value="Save" />											
					</form>				
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('inc/footer.php');?>
