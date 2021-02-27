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
	<link rel="stylesheet" href="css/style.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/user_table.css"/>

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
				<a href="home.php" class="site-logo">
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
						<li><a href="home.php">首页</a></li>
						<li><a href="member.php">战队成员</a>
							
						</li>
						<li><a href="my_information_view.php">我的资料</a></li>
						<li><a href="account.php">账户管理</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->
    <?php
    include("conn.php");
    $s_user = $_POST['username'];
    ?>
    
	<form action="account_search.php" method="POST">
	<div class="search_group">
		<div class="search_col">
		<input type=text name="username" value="<?php echo $s_user ?>" placeholder="输入用户名">
		</div>
		
		<input class="btn" type="submit" value="Search">
		
	</div>
	</form>

	<?php
	
		mysqli_set_charset($con, "utf8");
		$result = mysqli_query($con, "select * from user LEFT JOIN information on user.User_ID = information.User_ID 
		where User.Username like '%$s_user%'")
		 or die($con->error);?>

 <table id='customers'>
  <tr>
    <th>用户名</th>
    <th>账户状态</th>
    <th>战队职业</th>
	<th>操作</th>
  </tr>
  <?php	while ($userif = $result->fetch_assoc()){
   	echo "<tr>";
	echo "<td>" . $userif['Username'] . "</td>";
    echo "<td>";
	if(empty($userif['Permission'])){
		echo "活跃";
	}elseif($userif['Permission']==1){
		echo "待审核";
	}elseif($userif['Permission']==2){
		echo "冻结";
	}
	"</td>";
	echo "<td>";
	if(empty($userif['Team_Position'])){
		echo "未创建名片";
	}elseif($userif['Team_Position']=='队长'){echo "队长";}
		elseif($userif['Team_Position']=='队长'){echo "队长";}
		elseif($userif['Team_Position']=='副队'){echo "副队";} 
		elseif($userif['Team_Position']=='领队'){echo "领队";} 
		elseif($userif['Team_Position']=='精英'){echo "精英";} 
		elseif($userif['Team_Position']=='队员'){echo "队员";} 
	"</td>";
    echo "<td><a style='color:purple;' class='button1' href=\"account_edit.php?id=";
    echo $userif['User_ID'];
    echo "\">编辑</a></td>";
  	echo "</tr>"; }
	echo "</table>";
?>

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/0.jfif">
		<div class="page-info">
			<h2>账户管理</h2>
			<div class="site-breadcrumb">
				<a href="home.php">首页</a>  /
				<span>账户管理</span>
			</div>
		</div>
	</section>
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
