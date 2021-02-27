<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>EndGam - Gaming Magazine Template</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

	<!-- Table Stylesheets -->



	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="user_index.php" class="site-logo">
					<img src="./img/captur.png" alt="">
				</a>
				<nav class="top-nav-area w-100">
				
					<div class="user-panel" >
					<?php
					session_start();
					$id = $_SESSION['uid'];
					//if not logged in, display "Login" hyperlink
					if(isset($_SESSION['user']))
					{ ?>
						<a href="logout.php">注销</a>
						

					<?php } 
					else 
					{ ?>
						<a href="logout.php">登入</a>
					<?php echo "<script>window.location.replace('login.html')</script>";} ?>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
                    <li><a href="user_index.php">首页</a></li>
						<li><a href="u_member.php">战队成员</a></li>
						<li><a href="u_my_information_view.php">我的资料</a></li>
						<li><a href="u_myaccount.php">我的账户</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/0.jfif">
		<div class="page-info">
			<h2>战队成员</h2>
			<div class="site-breadcrumb">
				<a href="user_index.php">首页</a>  /
				<span>战队成员</span>
			</div>
		</div>
	</section>
	<!-- Page top section end-->

	<!-- table section -->
	<link rel="stylesheet" href="table_css/table.css"/>
	<?php
	

	include("conn.php");
	mysqli_set_charset($con, 'utf8');
	
	$result = mysqli_query($con, "Select* from information order by Team_Position='队长' DESC, Team_Position='副队' DESC,Team_Position='领队' DESC, Team_Position='精英' DESC, Team_Position='队员' DESC")	
	or die($con->error);

	?><div class='main-container1'><?php
	while ($user_information = $result->fetch_assoc()):?>

	<section id="wholepage">
		
	 <div class='table_container'>
		  
		<div class='content1'>
			
			<div class='left-column'>        
				<img width='120' height='150' src='<?= $user_information['Photo_Path'] ?>'>
			</div>
		
			<div class='right-column'>
				
					<div class="info_padding">
						<div class="info_left">
							<span class='white' >游戏昵称:
							<?= $user_information['Name']; ?></span>
							<span class="white" style='float:right; width:70%;'>战队职业:
							<?= $user_information['Team_Position']; ?></span>
						</div>
					</div>

					<div class="info_padding">
						<div class="info_left">
							<span class='white'>年龄:
							<?= $user_information['Age'];?></span>
							<span class="white" style='float:right; width:70%;'>最高段位:
							<?= $user_information['Range_General']; ?> 
							<?php
							$general_range = $user_information["Range_General"];
							if ($general_range == "倔强青铜"){
								echo "<img src=img/L1.png >";
							} elseif ($general_range == "秩序白银"){
								echo "<img src=img/L2.png >";
							} elseif ($general_range == "尊贵铂金"){
								echo "<img src=img/L3.png >";
							} elseif ($general_range == "荣耀黄金"){
								echo "<img src=img/L4.png >";
							} elseif ($general_range == "永恒钻石"){
								echo "<img src=img/L5.png >";
							} elseif ($general_range == "至尊星耀"){
								echo "<img src=img/L6.png >";
							} elseif ($general_range == "最强王者"){
								echo "<img src=img/L7.png >";
							} else{
								echo "<img src=img/L8.png >";
							}
							?>
							</span>
						</div>
					</div>

					<div class="info_padding">
						<div class="info_left">
							<span class='white'>性别:
							<?= $user_information['Gender'];?> </span><?php 
							$abc = $user_information['Gender'];
							$man_symbol = "img/man1.png";
							$women_symbol = "img/women1.png";
							if ($abc == "男"){
								echo "<img src=\"$man_symbol\"/>";
							} else{
								echo "<img src=\"$women_symbol\"/>";
							}
							 ?>
							 </span>	
							<span class="white" style='float:right; width:70%;'>战队段位: 勇士
							<?=$user_information['Range_Team']; ?>段 
							<?php
							$range_team = $user_information['Range_Team'];
							if ($range_team < 6) {
								echo "<img src=img/Z1.png>";
							} elseif ($range_team < 11) {
								echo "<img src=img/Z2.png>";
							} elseif ($range_team < 16) {
								echo "<img src=img/Z3.png>";
							} else {
								echo "<img src=img/Z4.png>";
							}
							?>
							</span>
						</div>
					</div>

					<div style="padding-top: 10px;">
							<span class='white'>签名:
							<?= $user_information['Message'];?></span>
						
					</div>
					
					

					<?php
		
					echo "<a style='color:white;' class='button1' href=\"u_member_information.php?id=";
					echo $user_information['If_ID'];
					echo "\">成员信息</a>"
					
					?>
			</div>
			
	    </div>
	</div>
	</section>	 
	
	 <?php endwhile; ?>

 
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.sticky-sidebar.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
