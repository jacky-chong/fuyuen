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
	<link rel="stylesheet" href="member_css/member_view.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

	<!-- Table Stylesheets -->



	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
<div id="grad">
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

	<!-- Check section -->
	<?php
	include("conn.php");
	$check_query = "select * from information where User_ID='$id'";
	$check_result = mysqli_query($con, $check_query);

	if(mysqli_num_rows($check_result)<=0){
		echo "<div class='middle'><a style='color:white;' class='newbtn' href=\"my_information_new.php?id=";
		echo $id;
		echo "\"><button class='button1 button2'></button></a></div>";
	}
	?>
	<!--fetch data code -->
	<?php
	    
		mysqli_set_charset($con, 'utf8');
	
		$result = mysqli_query($con,"Select * from information where User_ID=$id");
	
	while ($user_information = $result->fetch_assoc()):?>

	<?php
	$path = $user_information["Hero_Displaypath"];
	
	?>

	<audio id="myAudio">
  		<source src=<?= $user_information['Audio_Path'] ?> type="audio/mpeg">
		  Your browser does not support HTML5 video.
	</audio>
	<script>
	 var x = document.getElementById("myAudio"); 
		x.play();
	</script>

	<style>
	.whole_container{
    	display:flex;
	}
		#image-container {
		background-image: url(<?php echo "$path" ?>);
		background-size: 100% 100%;
		box-shadow: 25px 25px 50px 0 rgb(202, 117, 202) inset, -25px -25px 50px 0 rgb(78, 25, 109) inset; 
		width: 770px;
		height: 553px;
		margin-top: 170px;
		margin-right: 10px;
		}
		</style>
	

	<!-- Page top section -->
	<?php
	echo "<a style='color:white;' class='buttondlt' href=\"u_member_information_delete.php?id=";
	echo $id;
	echo "\">删除</a>"
	?>
	<a href="u_my_information.php" class="button_edit">编辑/修改</a>
	<div class="whole_container">
		<div class="whole_container_left">


	
			<div class="H1">个人信息</div>

			<div class='main-container1'>

				<div class='left-column-1' style="padding: 0px;">        
					<img width='120' height='150' src='<?= $user_information['Photo_Path'] ?>'>
				</div>

				<div class='right-column-1'>
					

					<div class='right-1'>
						<div>
							<span class='white'>游戏昵称: <?= $user_information['Name']; ?></span>
						</div>

						<div>
							<span class='white'>年龄: <?= $user_information['Age'];?></span>
						</div>
					</div>
			
					<div class='right-2'>
						<div>
							<span class='white'>性别: <?= $user_information['Gender'];?> 
								<?php 
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
						</div>
						<div>
							<span class='white'>微信: <?= $user_information['contact'];?></span>
						</div>
					</div>
				

				</div>
				
			</div>
				<div class="H2">游戏信息</div>						
				<div class='main-container2'>
					

					<div class='main-container2_left-1'>
						<div>
							<span class="white">战队职业: <?= $user_information['Team_Position']; ?></span>
						</div>

						<div>
							<span class="white">最高段位: <?= $user_information['Range_General']; ?> 
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
						

						<div>
							<span class="white">战队段位: 勇士<?=$user_information['Range_Team'];?>段 
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
				

					<div class='main-container2_left-2'>	
									
						<div>
							<span class="white">想找伙伴: <?= $user_information['Patner']; ?>
						</div>

						<div>
							<span class="white">擅长职业: <?= $user_information['Hero_Position_1']; ?> <?= $user_information['Hero_Position_2']; ?> 
						</div>

						<div>
							<span class="white">常在时段: <?= $user_information['Available_Time_1']; ?> <?= $user_information['Available_Time_2']; ?> 
						</div>


						
					</div>	
					
					<div class='main-container2_left-3'>
						<div>
							<span class='white'>签名: <?= $user_information['Message'];?></span>
						</div>
					</div>
				</div>
			
			<!-- hero section -->
			<div class="H3">英雄</div>	
			<div class='top_container'>
				
				<div class='container_right'>
					<span class="white">本命英雄: </hspan>
					<P style='margin-top:27px;color:white'>英雄荣耀：</P>
				</div>

				<div class='container_right'>
					<img width='40' height='40' class="bd" src='<?= $user_information['Hero_Path1'] ?>'>
					<div>
						<?php
							$RH1 = $user_information['Range_H1'];
							if ($RH1 == null){
								echo"<P style='margin-top:10px; color:black;'>暂无</P>";
							}else{
							echo "<img width='40' height='40' class='bd' src='$RH1'>";
							} 
						?>
					</div>
				</div>


				<div class='container_right'>
					<span class="white" style='margin-left: 27px'>常用英雄: </span>
				</div>

				<div class='container_right'>
				<img width='40' height='40' class="bd" src='<?= $user_information['Hero_Path2'] ?>'>
					<div>
					<?php
						$RH2 = $user_information['Range_H2'];
						if ($RH2 == null){
							echo"<P style='margin-top:10px; color:white;'>暂无</P>";
						}else{
						echo "<img width='40' height='40' class='bd' src='$RH2'>";
						} ?>
					</div>
				</div>

				<div class='container_right'>
				<img width='40' height='40' class="bd" src='<?= $user_information['Hero_Path3'] ?>'>
					<div>
					<?php
						$RH3 = $user_information['Range_H3'];
						if ($RH3 == null){
							echo"<P style='margin-top:10px; color:black;'>暂无</P>";
						}else{
						echo "<img width='40' height='40' class='bd' src='$RH3'>";
						} ?>
					</div>
				</div>

				<div class='container_right'>
				<img width='40' height='40' class="bd" src='<?= $user_information['Hero_Path4'] ?>'>
					<div>
					<?php
						$RH4 = $user_information['Range_H4'];
						if ($RH4 == null){
							echo"<P style='margin-top:10px; color:black;'>暂无</P>";
						}else{
						echo "<img width='40' height='40' class='bd' src='$RH4'>";
						} ?>
					</div>
					
				</div>
				<div class="a">
				<a class="button" href="">英雄高光时刻</a>
				</div>
			

			</div>
		</div>

		<div class="whole_container_right">
			<div id="image-container"></div>
		</div>
	</div>
</div>

 <?php endwhile; ?>
	<!-- Page top section end-->


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
						
	
	