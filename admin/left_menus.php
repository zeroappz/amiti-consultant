<div class="col-md-2">
	<div class="list-group">
		<a href="dashboard.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
		Dashboard <span class="badge"><?php echo $post->totalPost()+$category->totalCategory()+$user->totalUser()+$setting->totalSetting()+$slider->totalSliders()+$job->totalJobs() ;?></span>
		</a>
		<a href="categories.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Categories<span class="badge"><?php echo $category->totalCategory(); ?></span></a>
		<a href="posts.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> News & Updates<span class="badge"><?php echo $post->totalPost(); ?></span></a>
		<a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users Group<span class="badge"><?php echo $user->totalUser(); ?></span></a>
		<a href="settings.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> General Setting<span class="badge"><?php echo $setting->totalSetting(); ?></span></a>
		<a href="slider.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Slider Setting<span class="badge"><?php echo $slider->totalSliders(); ?></span></a>
		<a href="job.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Job Setting<span class="badge"><?php echo $job->totalJobs(); ?></span></a>
	</div>
</div>