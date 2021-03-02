<?php

include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Post.php';
include_once 'class/Category.php';
include_once 'class/Setting.php';
include_once 'class/Slider.php';
include_once 'class/Jobs.php';

//error_reporting(0);

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

$slider = new Slider($db);



$slider->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';
$saveMessage = '';

if(!empty($_POST["savePost"]) && $_POST["title"]!=''&& $_POST["description"]!='') {
    
	$filename = $_FILES['image1']['name'];
//echo $filename;
    
$new_filename="";
if(!empty($filename)){
    
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     $new_filename = "slider".'_'.time().'.'.$ext;
    
     move_uploaded_file($_FILES['image1']['tmp_name'], './img/slider/'.$new_filename);	
 }
	$slider->title = $_POST["title"];
	$slider->description = $_POST["description"];
	$slider->tagline = $_POST["tagline"];
    $slider->imagepath = $new_filename;
	if($slider->id) {	
		//echo $slider->update();
		if($slider->update()) {
			$saveMessage = "Slider details updated successfully!";
		}else{
            $saveMessage = "Something went wrong";
        }
	} else {
       // echo $insert;
		$slider->userid = $_SESSION["userid"];
			
		$lastInserId = $slider->insert();
		if($lastInserId) {
			$slider->id = $lastInserId;
			$saveMessage = "Slider details saved successfully!";
		}
	}
}

$sliderdetails = $slider->getSlider();

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
					<h3 class="panel-title">Add New Slider</h3>
				  </div>
				  <div class="panel-body">
				  
					<form method="post" id="postForm" enctype="multipart/form-data"	>						
						<?php if ($saveMessage != '') { ?>
							<div id="login-alert" class="alert alert-success col-sm-12"><?php echo $saveMessage; ?></div>                            
						<?php } ?>
						<div class="form-group">
							<label for="title" class="control-label">Title</label>
							<input type="text" class="form-control" id="title" name="title" value="<?php echo $sliderdetails['title']; ?>" placeholder="Post title..">							
						</div>
						
						<div class="form-group">
							<label for="description" class="control-label">Description</label>							
							<textarea class="form-control" rows="5" id="description" name="description" placeholder="Post description.."><?php echo $sliderdetails['description']; ?></textarea>					
						</div>	

						<div class="form-group">
							<label for="tagline" class="control-label">Tagline</label>
							<input type="text" class="form-control" id="tagline" name="tagline" value="<?php echo $sliderdetails['tagline']; ?>" placeholder="Post tagline..">							
                        </div>
                        
						<div class="form-group">
							<label for="image1">Image</label>
                            <img src="./img/slider/<?php echo $sliderdetails['image'];?>" alt="Select image..">
                            <input type="file" class="form-control" id="image1" name="image1">							
                            
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
