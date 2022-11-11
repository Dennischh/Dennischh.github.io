<?php
	include_once('header.php');
?>
		
	<main>
		<div class="main-content">
			<aside>
				<div class="col-md-2 col-md-offset-0">
				
				<div class="continent">
					<h4>Region</h4>	
					<ul class="nav nav-stacked ">
						<li><a href="#">Hong Kong Island</a></li>
						<li><a href="#">Kowloon</a></li>
						<li><a href="#">New Territoies</a></li>
						<li><a href="#">Outlying Islands</a></li>
					</ul>
				</div>
			
				<div class="popular">
					<h4>Districts of Hong Kong</h4>
					<ul class="nav nav-stacked">
					<li><a href="#">Sha Tin</a></li>
					<li><a href="#">Sai Kung</a></li>
					<li><a href="#">Tsuen Wan</a></li>
					<li><a href="#">Yuen Long</a></li>
					<li><a href="#">Kwun Tong</a></li>
					<li><a href="#">Sham Shui Po</a></li>
					<li><a href="#">Wong Tai Sin</a></li>
					<li><a href="#">Central and Western</a></li>
					<li><a href="#">Wan Chai</a></li>
					<li><a href="#">North District</a></li>
					</ul>
				</div>
			
				</div>
			</aside>
			
			<?php
				include_once 'post.php';
			?>
		
			<div class="col-md-10 col-md-offset-0">
				<h3>Hot Spots</h3>
				
				<?php include_once 'spotprint.php'; ?>

			</div>
		</div>
	</main>
	
	<?php 
		include_once('footer.php'); 
	?>


	</body>
	<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
</html>