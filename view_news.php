<?php 
include_once 'config/Database.php';
include_once 'class/Articles.php';
$database = new Database();
$db = $database->getConnection();

$article = new Articles($db);

$article->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $article->getArticles();

include('includes/head_include.php');

?>
<title>Amiti Corp | News</title>
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">

<body>
	<div class="boxed_wrapper">
		<!-- Preloader -->
		<div class="loader-wrap">
			<div class="preloader">
				<!--  <div class="preloader-close">Preloader Close</div>-->
			</div>
			<div class="layer layer-one"><span class="overlay"></span></div>
			<div class="layer layer-two"><span class="overlay"></span></div>
			<div class="layer layer-three"><span class="overlay"></span></div>
		</div>
		<?php
		include "includes/header_menu.php";
		include "includes/mobile_menu.php";
		?>

<section class="service-details">
<div class="container">		
	<div id="blog" class="row">     
		<div id="blog" class="row">	
		<?php 
		while ($post = $result->fetch_assoc()) {
			$date = date_create($post['created']);
			$message = str_replace("\n\r", "<br><br>", $post['message']);
		?>
			<div class="col-md-10 blogShort">
			<h2><?php echo $post['title']; ?></h2>
			<em><strong>Published on</strong>: <?php echo date_format($date, "d F Y");	?></em>
			<em  style="padding-left: 20px;"><strong>Category:</strong> <a href="#" target="_blank"><?php echo $post['category']; ?></a></em>
			<br><br>
			<article>
				<p><?php echo $message; ?> 	</p>
			</article>		
			</div>
		<?php } ?>   
		
		<div class="col-md-12 gap10"></div>
		
	</div>
</div>
</section>

		<!------------------------Footer------------------------------------------------------------------------>

		<?php
		include "includes/footer.php"
		?>

		<!--Scroll to top-->
		<button class="scroll-top scroll-to-target " data-target="html "><i class="flaticon-up-arrow-1 "></i>Top</button>
	</div>

	<?php
	include "includes/scripts_include.php"
	?>

</body>
<!-- End of .page_wrapper -->

</html>
