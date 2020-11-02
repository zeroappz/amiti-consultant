<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Post.php';
include_once 'class/Category.php';
include_once 'class/Setting.php';
$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$post = new Post($db);
$category = new Category($db);
$setting = new Setting($db);

if(!$user->loggedIn()) {
	header("location: index.php");
}


include('inc/header.php');
?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/settings.js"></script>	
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
					<div class="panel-heading" style="background-color: #0071BD;">
						<h3 class="panel-title">Business Settings</h3>
					</div>
					<div class="panel-body">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-2" style="text-align:left;">
									<a href="add_settings.php" class="btn btn-default btn-xs">Add New</a>				
								</div>
							</div>
						</div>
						<table id="settingList" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>									
									<th>Company Name</th>																								
									<th>Contact</th>
                                    <th>Email</th>	
                                    <th>FB</th>									
									<th>Youtube</th>																								
									<th>Linkedin</th>
                                    <th>Twitter</th>	
                                    <th>Street</th>									
									<th>City</th>																								
									<th>State</th>
                                    <th>Country</th>	
                                    <th>Zipcode</th>																																	
									<th>Edit</th>
									<th>Delete</th>	
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('inc/footer.php');?>
