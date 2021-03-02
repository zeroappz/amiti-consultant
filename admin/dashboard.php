<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Post.php';
include_once 'class/Category.php';
include_once 'class/Setting.php';
include_once 'class/Slider.php';
include_once 'class/Jobs.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$post = new Post($db);
$category = new Category($db);
$setting = new Setting($db);
$slider = new Slider($db);
$job = new Job($db);

if (!$user->loggedIn()) {
  header("location: index.php");
}


include('inc/header.php');
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php include "menus.php"; ?>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <a href="../index.html" class="brand-link">
            <img src="./img/logo.png" alt="Amiti Logo" class="brand-image img-circle elevation-3" style="background: white;">
          </a>
        </div>
        <br>
        <div class="col-md-2">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Manage
              <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="posts.php">Add Post</a></li>
              <li><a href="categories.php">Add Category</a></li>
            </ul>
          </div>
        </div>
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
              <h3 class="panel-title">Dashboard</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $user->totalUser(); ?></h2>
                  <h4>Users</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $category->totalCategory(); ?></h2>
                  <h4>Categories</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?php echo $post->totalPost(); ?></h2>
                  <h4>Posts</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?php echo $setting->totalSetting(); ?></h2>
                  <h4>Settings</h4>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </section>


  <?php include('inc/footer.php'); ?>