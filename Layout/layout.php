<?php
$link = $_SERVER['PHP_SELF'];
$link_array = explode('/', $link);
$page = end($link_array);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>
	<link rel="stylesheet" href="../style.css">

	<title>Admin</title>
</head>

<body>

	<section id="sidebar">
		<a href="#" class="brand">
			<!-- <i class='bx bxs-smile  bx-lg'></i>
			<span class="text">AdminHub</span> -->
			<img src="https://www.kaipron.com/gall/logo.png" alt="" style="width: 158px; margin:0px 30px;margin-top:5vw">
		</a>


		
		<ul class="side-menu top">

			<li class=" <?php
					if ($page === 'dashboard.php') {
						echo 'active';
					} ?>">
				<a href="../Dashboard/dashboard.php">
					<i class='bx bxs-dashboard bx-sm'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class=" <?php
					if ($page === 'product.php') {
						echo 'active';
					} ?>">
				<a href="../Product/product.php">
					<i class='bx bxs-shopping-bag-alt bx-sm'></i>
					<span class="text">Our Products</span>
				</a>
			</li>
			<li class=" <?php
					if ($page === 'gallery.php') {
						echo 'active';
					} ?>">
				<a href="../Gallery/gallery.php">
					<i class='bx bxs-landscape bx-sm'></i>
					<span class="text">Gallery</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu bottom">
			<li>
				<a href="#" class="logout">
					<i class='bx bx-power-off bx-sm bx-burst-hover'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>

	<section id="content">
		<nav>
			<i class='bx bx-menu bx-sm'></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" class="checkbox" id="switch-mode" hidden />
			<label class="swith-lm" for="switch-mode">
				<i class="bx bxs-moon"></i>
				<i class="bx bx-sun"></i>
				<div class="ball"></div>
			</label>

			<a href="#" class="profile" id="profileIcon">
				<img src="https://placehold.co/600x400/png" alt="Profile">
			</a>
			<div class="profile-menu" id="profileMenu">
				<ul>
					<li><a href="#">My Profile</a></li>
					<li><a href="#">Settings</a></li>
					<li><a href="#">Log Out</a></li>
				</ul>
			</div>
		</nav>
	</section>

	<script src="../script.js"></script>
</body>

</html>