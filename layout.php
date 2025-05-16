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
	<link rel="stylesheet" href="style.css">
	<title>Admin</title>
</head>

<body>
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="/php/Kaipron/Assets/images/logo.png" alt="Logo" width="100" class="logo">
		</a>
		<ul class="side-menu top">
			<li class="<?= $page === 'dashboard.php' ? 'active' : '' ?>">
				<a href="/php/Kaipron/kaipronAdmin/dashboard.php">
					<i class='bx bxs-dashboard bx-sm'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="<?= $page === 'product.php' ? 'active' : '' ?>">
				<a href="/php/Kaipron/kaipronAdmin/Product/product.php">
					<i class='bx bxs-shopping-bag-alt bx-sm'></i>
					<span class="text">Our Products</span>
				</a>
			</li>
			<li class="<?= $page === 'gallery.php' ? 'active' : '' ?>">
				<a href="/php/Kaipron/kaipronAdmin/gallery/gallery.php">
					<i class='bx bxs-landscape bx-sm'></i>
					<span class="text">Gallery</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu bottom">
			<li>
				<a href="/php/Kaipron/kaipronAdmin/user/logout.php" class="logout">
					<i class='bx bx-power-off bx-sm bx-burst-hover'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>

	<section id="content">
		<nav>
			<i class='bx bx-menu bx-sm' id="menu-toggle"></i>
			<form action="#">
				<div class="form-input">
					<h3>Admin Panel</h3>
				</div>
			</form>
			<a href="#" class="profile" id="profileIcon">
				<img src="/php/Kaipron/Assets/images/user.jpg" alt="Profile">
			</a>
			<div class="profile-menu" id="profileMenu">
				<ul>
					<!-- <li><a href="#">My Profile</a></li>
					<li><a href="#">Settings</a></li> -->
					<li><a href="/php/Kaipron/kaipronAdmin/user/logout.php">Log Out</a></li>
				</ul>
			</div>
		</nav>
	</section>

	<script>
	document.addEventListener("DOMContentLoaded", () => {
		const toggleBtn = document.getElementById('menu-toggle');
		const sidebar = document.getElementById('sidebar');
		const content = document.getElementById('content');
		const profileIcon = document.getElementById("profileIcon");
		const profileMenu = document.getElementById("profileMenu");

		if (toggleBtn && sidebar) {
			toggleBtn.addEventListener('click', () => {
				sidebar.classList.toggle('show');
				sidebar.classList.toggle('active');
				if (content) content.classList.toggle('shifted');
			});
		}

		// Profile menu toggle
		if (profileIcon && profileMenu) {
			profileIcon.addEventListener("click", (e) => {
				e.preventDefault();
				profileMenu.classList.toggle("show");
			});
		}

		// Close sidebar if clicking outside (mobile UX)
		document.addEventListener('click', (e) => {
			if (
				sidebar.classList.contains('show') &&
				!sidebar.contains(e.target) &&
				!toggleBtn.contains(e.target)
			) {
				sidebar.classList.remove('show', 'active');
				if (content) content.classList.remove('shifted');
			}
		});
	});
</script>


</body>

</html>