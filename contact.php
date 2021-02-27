<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>EndGam - Gaming Magazine Template</title>
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
	<link rel="stylesheet" href="css/myaccount.css"/>


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
				<a href="home.php" class="site-logo">
					<img src="./img/logo.png" alt="">
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
					<?php } ?>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="home.php">首页</a></li>
						<li><a href="member.php">战队成员</a>
							
						</li>
						<li><a href="my_information_view.php">我的资料</a></li>
						<li><a href="account.php">账户管理</a></li>
						<li><a href="contact.php">我的账户</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
		<div class="page-info">
			<h2>我的账户</h2>
			<div class="site-breadcrumb">
				<a href="home.php">首页</a>  /
				<span>我的账户</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->
	<?php
	include("conn.php");
	mysqli_set_charset($con, "utf8");
	$result = mysqli_query($con, "select Username, Password from user where User_ID = $id") or die($con->error);
	while ($username = $result -> fetch_assoc()):	
	?>
	<form method="POST" action="pass_upd.php">
		<input hidden name="id" value="<?php echo $id ?>">
		<input hidden type="password" name="org" value="<?php echo $username['Password'] ?>">
	<div class="login-box">
		<h1>修改密码</h1>

            <div class="box1">
                <i class="fas fa-user"></i>

                <input  style="color:black;" readonly type="text" placeholder="用户名" required name="username" value="<?php echo $username['Username'] ?>">
            </div>
            <div class="box1">
                <i class="fas fa-key"></i>
                <input type="password" placeholder="输入旧密码" required name="oldpassword" value="">
            </div>
			<div class="box1" style="margin-top: 20px;">
                <i class="fas fa-key"></i>
                <input type="password" placeholder="输入新密码" minlength="8" required name="newpassword" value="">
            </div>
			<div class="box1">
                <i class="fas fa-key"></i>
                <input type="password" placeholder="新密码确认" minlength="8" required name="clfpassword" value="">
            </div>
           <input type="submit" value="修改" class="btns">
		   
        </div>
		</form>
	
		<?php mysqli_close($con); endwhile ?>

		

	

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
