<?php
	session_start();
	include_once 'dbConnect.php';
?>
<html lang="en"><!-- http://127.0.0.1/GroupProject_GpD/groupproject.html -->
	<head>
		<meta charset="utf-8">
		<title>Group Project-Group D</title>

		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>

		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/groupproject.css"/>

	</head>

	<body data-new-gr-c-s-check-loaded="14.1083.0" data-gr-ext-installed="">

		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<header>
			<div id="mydiv" class="" style="top: 18px; left: 699px;">
				<div id="mydivheader"><img src="images/footer/gpicon.png"></div>
			</div>
		
			<nav class="navbar-inverse"> 
				<div class="container-fluid topHeaderRow">
					<ul class="nav navbar-nav navbar-right topHeaderRow">

					<?php
						if ($_SESSION){
							echo '<li><a href="functions.php?act=logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
						}
						else{
							echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
						}
					?>
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-star"></span> Favorites</a></li>
					</ul>
				</div>
			</nav>
		
			<nav class="navbar-inverse Navbar">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand n-brand" href="groupproject.php">Travels in Hong Kong (THK)</a>
					</div>
					<ul class="nav navbar-nav">
						<li class=""><a href="groupproject.php">Home</a></li>
						<li class=""><a href="about.php">About</a></li>
						<li class=""><a href="#">Contact</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Browse <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Hong Kong Island</a></li>
								<li><a href="#">Kowloon</a></li>
								<li><a href="#">New Territoies</a></li>
								<li><a href="#">Outlying Islands</a></li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-right" action="/action_page.php">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search" name="search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</nav>
		
		</header>