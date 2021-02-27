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
				<a href="home.html" class="site-logo">
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
							<ul class="sub-menu">
								<li><a href="">Game Singel</a></li>
							</ul>
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
	<?php
	include("conn.php");
	$id = intval($_GET['id']);
		mysqli_set_charset($con, "utf8");
		$result = mysqli_query($con, "select * from user LEFT JOIN information on user.User_ID = information.User_ID
		where user.User_ID=$id") or die($con->error);

	echo "<form method='POST' action='account_update.php'>";
	echo "<table id='customers'>
  <tr>
    <th>用户名</th>
    <th>账户状态</th>
    <th>战队职业</th>
	<th>密码</th>
  </tr>" ?>
  <?php	while ($userif = $result->fetch_assoc()){
   	echo "<tr>";
	echo "<td>" . $userif['Username'] . "</td>";
    echo "<td><select name='pms'>
	<option value='0'"; if(empty($userif['Permission'])){echo "selected";} echo ">活跃</option>
	<option value='1'"; if($userif['Permission']==1){echo "selected";} echo ">待审核</option>
	<option value='2'"; if($userif['Permission']==2){echo "selected";} echo ">冻结</option>
	</select></td>";
	if(empty($userif['Team_Position'])){
		echo "<td>未创建名片</td>";
	}else{
		echo "<td><select name='tp'>
		<option value='队长'"; if($userif['Team_Position']=='队长'){echo "selected";} echo ">队长</option>
		<option value='副队'"; if($userif['Team_Position']=='副队'){echo "selected";} echo ">副队</option>
		<option value='领队'"; if($userif['Team_Position']=='领队'){echo "selected";} echo ">领队</option>
		<option value='精英'"; if($userif['Team_Position']=='精英'){echo "selected";} echo ">精英</option>
		<option value='队员'"; if($userif['Team_Position']=='队员'){echo "selected";} echo ">队员</option>
		</select></td>";
	}?>
	<td style='width: 15%;'><input name='psd' id='psd' type='password' readonly value="<?php echo $userif['Password'];?>"></td>
	<?php 
  	echo "</tr>"; }
	echo "</table>";
	?>
	<input type="number" name="id"hidden value="<?php echo $id ;?>">
	<input class="cps" type="button" value="重置密码" onclick="newpass()">
	<input class="cfm" type="submit" value="确定">
	</form>
	<script>
	function newpass()
    {
      var x = Math.floor(10000000 + Math.random() * 90000000);
	  var y = "text";
      document.getElementById("psd").value = x;
	  document.getElementById("psd").type = y;
    }
	</script>


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/0.jfif">
		<div class="page-info">
			<h2>账户管理</h2>
			<div class="site-breadcrumb">
				<a href="home.php">首页</a>  /
				<a>账户管理</a>	/
				<span>更改资料</span>
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
