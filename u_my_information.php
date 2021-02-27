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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="member_css/my.css"/>

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

	<!--fetch data code -->
	<?php
	    include("conn.php");
		mysqli_set_charset($con, 'utf8');
		
		$result = mysqli_query($con,"Select * from information where User_ID=$id");
	
	while ($user_information = $result->fetch_assoc()):?>
	

	<?php
	$path = $user_information["Hero_Displaypath"];
	$H_path = $user_information['H_Picture_Path'];
	$G_path = $user_information['H_Gif_Path'];
	?>

	
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
	<a href="u_my_information_view.php" class="button_cancel">取消更改</a>



	<form action="u_my_information_edit.php" method="post" enctype="multipart/form-data"> 
	<input hidden name="uid" type="int" value="<?php echo $id ?>">
	<div class="whole_container">
		<div class="whole_container_left">


	
			<div class="H1">个人信息</div>

			<div class='main-container1'>

				<div class='left-column-1' style="padding: 0px;">     
 
					<img width='120' height='150' id="photo" src='<?= $user_information['Photo_Path'] ?>'>

				</div>

				<div class='right-column-1' style="padding-bottom: 0px;">
					

					<div class='right-1' style="padding-bottom: 0px;">
						<div>
							<span class='white'>游戏昵称: 
							<input type="text" name="name" required="required" value="<?php echo $user_information['Name']; ?>"></span>
						</div>

						<div>
							<span class='white'>年龄: 
							<input type="text" name="age" required="required" value="<?php echo $user_information['Age']; ?>"></span>
						</div>

						<div style="padding-bottom: 0px;">
						 <span class="white" >修改照片：
						 <input id="preimg" style="font-size:10px" type="file" name="photo" accept="image/*"></span>
						</div>
					</div>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
					<script>
						function readURL(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							
							reader.onload = function(e) {
							$('#photo').attr('src', e.target.result);
							}
							
							reader.readAsDataURL(input.files[0]); // convert to base64 string
						}
						}


						$("#preimg").change(function() {
						readURL(this);
						});
					</script>
			
					<div class='right-2'>
						<div>
							<span class='white'>性别: 
							<?php  
							if ($user_information['Gender'] == "男"){
							echo "<input type='radio' checked id='male' name='gender' value='男'>
							<label>男</label>
							<input type='radio' id='female' name='gender' value='女'>
							<label>女</label>";
							}else{
							echo 
							"<input type='radio' id='male' name='gender' value='男'>
							<label>男</label>
							<input type='radio' checked id='female' name='gender' value='女'>
							<label>女</label>";
							} 
							?>
								
							</span>
						</div>
						<div>
							<span class='white'>微信: 
							<input type="text" name="contact" required="required" value="<?php echo $user_information['contact']; ?>"></span>
						</div>
					</div>
				

				</div>
				
			</div>
				<div class="H2">游戏信息</div>						
				<div class='main-container2'>
					

					<div class='main-container2_left-1'>
						<div>
							<span class="white">战队职业: 
							<input type="text" style="background: #ccc;"name="team_position" readonly required="required" value="<?php echo $user_information['Team_Position']; ?>"></span>
						</div>

						<div>
							<?php $range = $user_information['Range_General']; ?>
							<span class="white">最高段位:
							<select name="range_general">
								<option value="倔强青铜" <?php if($range == "倔强青铜"){echo "selected=selected"; }?>>倔强青铜</option>
								<option value="秩序白银" <?php if($range == "秩序白银"){echo "selected=selected"; }?>>秩序白银</option>
								<option value="尊贵铂金" <?php if($range == "尊贵铂金"){echo "selected=selected"; }?>>尊贵铂金</option>
								<option value="荣耀黄金" <?php if($range == "荣耀黄金"){echo "selected=selected"; }?>>荣耀黄金</option>
								<option value="永恒钻石" <?php if($range == "永恒钻石"){echo "selected=selected"; }?>>永恒钻石</option>
								<option value="至尊星耀" <?php if($range == "至尊星耀"){echo "selected=selected" ;}?>>至尊星耀</option>
								<option value="最强王者" <?php if($range == "最强王者"){echo "selected=selected"; }?>>最强王者</option>
								<option value="荣耀王者" <?php if($range == "荣耀王者"){echo "selected=selected"; }?>>荣耀王者</option>
							</select>
								
							</span>
						</div>
						

						<div>
						<?php $range_team = $user_information['Range_Team']; ?>
							<span class="white" >战队段位: 勇士
							<script>
									var dbrange = <?php echo $range_team; ?>;
									var range = 0
									document.write("<select name='range_team' style='width: 63px;' >");
									for (var i=1; i <=20; i++)
									{
										range++;

										if(dbrange == range){ 
										   document.write("<option selected=selected value="+ range + ">" + range + "段</option>");
										   }

										if(range == dbrange){
											continue;
										}
										document.write("<option value="+ range + ">" + range + "段</option>");
											

									}
									document.write("</select>");
							
							</script>
							</span>
						</div>
					</div>
				


					<div class='main-container2_left-2'>	
									
						<div>
							<?php $patner = $user_information['Patner']; ?>
							<span class="white">想找伙伴:
							<select name="patner" style="width:128px;">
								<option value="开黑队友" <?php if($patner == "开黑队友"){echo "selected=selected"; }?>>开黑队友</option>
								<option value="师父" <?php if($patner == "师父"){echo "selected=selected"; }?>>师父</option>
								<option value="徒弟" <?php if($patner == "徒弟"){echo "selected=selected"; }?>>徒弟</option>
								<option value="情侣" <?php if($patner == "情侣"){echo "selected=selected"; }?>>情侣</option>
							</select>
						</div>

						<div>
							<?php
							$HP1 = $user_information['Hero_Position_1'];
							$HP2 = $user_information['Hero_Position_2'];
							?>
							<span class="white">擅长职业:
							<select name="hero_position_1" style="width:62px;">
								<option value="坦克" <?php if($HP1 == "坦克"){echo "selected=selected"; }?>>坦克</option>
								<option value="战士" <?php if($HP1 == "战士"){echo "selected=selected"; }?>>战士</option>
								<option value="刺客" <?php if($HP1 == "刺客"){echo "selected=selected"; }?>>刺客</option>
								<option value="法师" <?php if($HP1 == "法师"){echo "selected=selected"; }?>>法师</option>
								<option value="射手" <?php if($HP1 == "射手"){echo "selected=selected"; }?>>射手</option>
								<option value="辅助" <?php if($HP1 == "辅助"){echo "selected=selected"; }?>>辅助</option>
							</select>
							<select name="hero_position_2" style="width:62px;">
								<option value="坦克" <?php if($HP2 == "坦克"){echo "selected=selected"; }?>>坦克</option>
								<option value="战士" <?php if($HP2 == "师父"){echo "selected=selected"; }?>>战士</option>
								<option value="刺客" <?php if($HP2 == "刺客"){echo "selected=selected"; }?>>刺客</option>
								<option value="法师" <?php if($HP2 == "法师"){echo "selected=selected"; }?>>法师</option>
								<option value="射手" <?php if($HP2 == "射手"){echo "selected=selected"; }?>>射手</option>
								<option value="辅助" <?php if($HP2 == "辅助"){echo "selected=selected"; }?>>辅助</option>
							</select>
						</div>

						<div>
						    <?php 
							$AT1 = $user_information['Available_Time_1'];
							$At2 = $user_information['Available_Time_2'];
							?>
							<span class="white">常在时段:  
							<select name="available_time_1" style="width:62px;">
								<option value="每天" <?php if($AT1 == "每天"){echo "selected=selected"; }?>>每天</option>
								<option value="工作日" <?php if($AT1 == "工作日"){echo "selected=selected"; }?>>工作日</option>
								<option value="周末" <?php if($AT1 == "周末"){echo "selected=selected"; }?>>周末</option>
							</select>
							<select name="available_time_2" style="width:62px;">
								<option value="全天" <?php if($At2 == "全天"){echo "selected=selected"; }?>>全天</option>
								<option value="上午" <?php if($At2 == "上午"){echo "selected=selected"; }?>>上午</option>
								<option value="中午" <?php if($At2 == "中午"){echo "selected=selected"; }?>>中午</option>
								<option value="晚上" <?php if($At2 == "晚上"){echo "selected=selected"; }?>>晚上</option>
							</select>
						</div>


						
					</div>	
					
					<div class='main-container2_left-3'>
						<div>
							<span class='white'>签名:
							<textarea name="message" rows="4" required="required"><?php echo $user_information['Message']; ?></textarea></span>
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
					<img width='40' id="H1" height='40' class="bd" src='<?= $user_information['Hero_Path1'] ?>'>
					<input hidden name='he_1' id='He_1' value='<?= $user_information['Hero_Path1'] ?>' >
					<div>
						<?php
							$RH1 = $user_information['Range_H1'];
						
							echo "<img width='40' height='40' alt='' id='RH1' class='bd' src='$RH1'>";
							echo "<input hidden name='hero_1' id='Rhero1' value='$RH1'>";

							echo "<input hidden name='hero_show' id='hv' value='$path'>";
							echo "<input hidden name='hero_pp' id='hv1' value='$H_path'>";
							echo "<input hidden name='hero_vp' id='Ipv' value='$G_path'>";
							
						?>
					</div>
				</div>


				<div class='container_right'>
					<span class="white" style='margin-left: 27px'>常用英雄: </span>
				</div>

				<div class='container_right'>
				<img width='40' id="H2" height='40' class="bd" src='<?= $user_information['Hero_Path2'] ?>'>
				<input name='he_2' hidden id='He_2' value='<?= $user_information['Hero_Path2'] ?>' >
					<div>
					<?php
						$RH2 = $user_information['Range_H2'];
					
						echo "<img id='RH2' width='40' height='40' class='bd' src='$RH2'>";
						echo "<input hidden name='hero_2' id='Rhero2' value='$RH2'>";
						?>
					</div>
				</div>

				<div class='container_right'>
				<img width='40' height='40' id="h3" class="bd" src='<?= $user_information['Hero_Path3'] ?>'>
				<input name='he_3' hidden id='He_3' value='<?= $user_information['Hero_Path3'] ?>' >
					<div>
					<?php
						$RH3 = $user_information['Range_H3'];
					
						echo "<img id='RH3' width='40' height='40' class='bd' src='$RH3'>";
						echo "<input hidden name='hero_3' id='Rhero3' value='$RH3'>";
						?>
					</div>
				</div>

				<div class='container_right'>
				<img width='40' height='40' id="h4" class="bd" src='<?= $user_information['Hero_Path4'] ?>'>
				<input name='he_4' hidden id='He_4' value='<?= $user_information['Hero_Path4'] ?>' >
					<div>
					<?php
						$RH4 = $user_information['Range_H4'];
						
						echo "<img id='RH4' width='40' height='40' class='bd' src='$RH4'>";
						echo "<input hidden name='hero_4' id='Rhero4' value='$RH4'>";
						?>
						
					</div>

				</div>
			

				<div class="container_right">
					
						<span style="padding-left: 10px; color: white;">英雄展示:</span>
						<button1  title="壁纸" class="btn" onclick="myfunction1()"><i class="fa fa-image"></i></button1>
						<button1  id="nvp" title="动画" class="btn1" onclick="myfunction2()"><i class="fa fa-play"></i></button1>
						<script>
							function myfunction1(){
								var picture_path = document.getElementById("hv1").value;
								if(picture_path == ''){
									alert("英雄暂不支持壁纸显示 ！");
								}else{
								document.getElementById("hv").value = picture_path;
								document.getElementById('image-container').style.backgroundImage = 'url('+ picture_path + ')';
								}
								
							}
							function myfunction2(){
								var Gif_path = document.getElementById("Ipv").value;
								if(Gif_path == ''){
									alert("由于经费不足，英雄暂不支持动画展示 ！");
								}else{
									document.getElementById("hv").value = Gif_path;
									document.getElementById('image-container').style.backgroundImage = 'url('+ Gif_path + ')';
								}
							}
							</script>
					<div>
						<a class="button" href="" onclick="hihi()">英雄高光时刻</a>
						<script>
						function hihi(){
							alert("由于经费问题，暂不支持上传影片。");
						}
						<script>
					</div>
				</div>
			

			</div>
		</div>

		<div class="whole_container_right">
			<div id="image-container"></div>
		</div>
	</div>

</div>
	<input style="border:none;" name="upload" type="submit" value="保存修改" class="button_save" >
    </form>
 
 <?php endwhile; ?>

 <style>


  	#index-gallery{
	float:left;
	margin-left: 20px;
  	border: 1px blue solid;
  	max-width: 1470px;
	box-sizing: border-box;
	padding: 10px;
	display: none;
	  }

	#index-gallery.open{
	display: inline;
	}

	.item {
    width:80px;
    text-align:center;
    display:block;
    background-color: transparent;
	margin-bottom: 5px;
    margin-right: 5px;
    margin-left: 5px;
    float:left;
  }

  .buttonh1{
	  
	float: left;
	cursor: pointer;
  	-webkit-transition-duration: 0.4s; 
  	transition-duration: 0.4s;
  }

  .buttonh1:hover{
	box-shadow: 0 16px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	float:left;
  }
   
	</style>

	<!-- Hero H1 -->
 <?php
	include("conn.php");
	mysqli_set_charset($con, 'utf8');
	
	$result_h = mysqli_query($con,"Select * from hero");?>

	<div id="index-gallery">
		<h3 style="color:white; margin-bottom: 10px;">选择你的本名英雄：</h3>
		<?php
	
		while ($hero_information = $result_h->fetch_assoc()):?>

		
				<div class="item">
					
				<a class="buttonh1" id='<?= $hero_information['Hero_ID'] ?>' onClick="reply_click(this.id)" src='<?= $hero_information['Hero_Photo_Path'] ?>' ptp='<?= $hero_information['Hero_Video_Path'] ?>' pv='<?= $hero_information['Hero_Gif'] ?>'>
					<img height='78' width='100' id='<?= $hero_information['Hero_ID'] ?>' onClick="reply_click(this.id)" src='<?= $hero_information['Hero_Photo_Path'] ?>' alt=""/>
					<p id='<?= $hero_information['Hero_ID'] ?>' onClick="reply_click(this.id)" style="color:white;"><?= $hero_information['Hero_Name'] ?></p></a>
				</div>
			
			

		<?php endwhile; ?>
	</div>
	
		
	<script>
			var button = document.getElementById('H1');
			var item = document.getElementById('index-gallery');

			button.onclick = function(){
				item2.className = "";
				item3.className = "";
				item4.className = "";
				itemrh4.className = "";
				itemrh3.className = "";
				itemrh2.className = "";
				itemrh1.className = "";
				

				if(item.className == "open"){
					item.className = "";
				}else{
					item.className = "open";
					
					item.scrollIntoView();
				}
				
			}


			

		function reply_click(clicked_id){

			var h1id = document.getElementById(clicked_id).getAttribute("src");
			var pt =  document.getElementById(clicked_id).getAttribute("ptp");
			var pv = document.getElementById(clicked_id).getAttribute("pv");

  			document.getElementById("H1").src = h1id;
			document.getElementById("He_1").setAttribute('value', h1id);
			

			document.getElementById("hv").value = pt;
			document.getElementById("hv1").setAttribute('value', pt);
			document.getElementById("Ipv").setAttribute('value', pv);
			document.getElementById('image-container').style.backgroundImage = 'url('+ pt + ')';
			
	
			item.className = "";
			
		}
		</script>



	<!-- Hero H2 -->
<style>


	#index-gallery2{
	float:left;
	margin-left: 20px;
	border: 1px blue solid;
	max-width: 1470px;
	box-sizing: border-box;
	padding: 10px;
	display: none;
	}

	#index-gallery2.open{
	display: inline;
	}

	.item2 {
	width:80px;
	text-align:center;
	display:block;
	background-color: transparent;
	margin-bottom: 5px;
	margin-right: 5px;
	margin-left: 5px;
	float:left;
	}

	.buttonh2{

	float: left;
	cursor: pointer;
	-webkit-transition-duration: 0.4s; 
	transition-duration: 0.4s;
	}

	.buttonh2:hover{
	box-shadow: 0 16px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	float:left;
}

</style>


	<?php
	$result_h = mysqli_query($con,"Select * from hero");?>

	<div id="index-gallery2">
		<h3 style="color:white; margin-bottom: 10px;">选择你第一位常用英雄：</h3>
		<?php

		while ($hero_information = $result_h->fetch_assoc()):?>

		
				<div class="item2">
					
				<a class="buttonh2" id='<?= $hero_information['Hero_ID'] ?>' onClick="reply_click2(this.id)" src='<?= $hero_information['Hero_Photo_Path'] ?>'>
					<img height='78' width='100' id='<?= $hero_information['Hero_ID'] ?>' onClick="reply_click2(this.id)" src='<?= $hero_information['Hero_Photo_Path'] ?>' alt=""/>
					<p id='<?= $hero_information['Hero_ID'] ?>' onClick="reply_click2(this.id)" style="color:white;"><?= $hero_information['Hero_Name'] ?></p></a>
				</div>
		
		

		<?php endwhile; ?>
	</div>
	<script>
			var button2 = document.getElementById('H2');
			var item2 = document.getElementById('index-gallery2');

			button2.onclick = function(){
				item.className = "";
				item3.className = "";
				item4.className = "";
				itemrh4.className = "";
				itemrh3.className = "";
				itemrh2.className = "";
				itemrh1.className = "";
  				
				if(item2.className == "open"){
					item2.className = "";
				}else{
					item2.className = "open";
				
					item2.scrollIntoView();
				}
				
			}


			

		function reply_click2(clicked_id){

			var h2id = document.getElementById(clicked_id).getAttribute("src");
  			document.getElementById("H2").src = h2id;
			document.getElementById("He_2").setAttribute('value', h2id);
			
			  item2.className = "";

		}
	</script>


<!-- Hero H3 -->


	<style>


		#index-gallery3{
		float:left;
		margin-left: 20px;
		border: 1px blue solid;
		max-width: 1470px;
		box-sizing: border-box;
		padding: 10px;
		display: none;
		}

		#index-gallery3.open{
		display: inline;
		}

		.item3 {
		width:80px;
		text-align:center;
		display:block;
		background-color: transparent;
		margin-bottom: 5px;
		margin-right: 5px;
		margin-left: 5px;
		float:left;
		}

		.buttonh3{
		float: left;
		cursor: pointer;
		-webkit-transition-duration: 0.4s; 
		transition-duration: 0.4s;
		}

		.buttonh3:hover{
		box-shadow: 0 16px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
		float:left;
		}

	</style>


<?php
	$result_h3 = mysqli_query($con,"Select * from hero");?>

	<div id="index-gallery3">
		<h3 style="color:white; margin-bottom: 10px;">选择你第二位常用英雄：</h3>

		<?php

		while ($hero_information3 = $result_h3->fetch_assoc()):?>

	
			<div class="item3">
				
			<a class="buttonh3" id='<?= $hero_information3['Hero_ID'] ?>' onClick="reply_click3(this.id)" src='<?= $hero_information3['Hero_Photo_Path'] ?>'>
				<img height='78' width='100' id='<?= $hero_information3['Hero_ID'] ?>' onClick="reply_click3(this.id)" src='<?= $hero_information3['Hero_Photo_Path'] ?>' alt=""/>
				<p id='<?= $hero_information3['Hero_ID'] ?>' onClick="reply_click3(this.id)" style="color:white;"><?= $hero_information3['Hero_Name'] ?></p></a>
			</div>
		
		

		<?php endwhile; ?>
	</div>

		<script>
			var button3 = document.getElementById('h3');
			var item3 = document.getElementById('index-gallery3');
			
			button3.onclick = function(){
				item2.className = "";
				item.className = "";
				item4.className = "";
				itemrh4.className = "";
				itemrh3.className = "";
				itemrh2.className = "";
				itemrh1.className = "";

				if(item3.className == "open"){
					item3.className = "";
				}else{
					item3.className = "open";
				
					item3.scrollIntoView();
				}
			}

			function reply_click3(clicked_id){

			var h3id = document.getElementById(clicked_id).getAttribute("src");
			document.getElementById("h3").src = h3id;
			document.getElementById("He_3").setAttribute('value', h3id);
			item3.className = "";
			}
			

		</script>


	<!-- hero 4 -->
<style>
	#index-gallery4{
	float:left;
	margin-left: 20px;
	border: 1px blue solid;
	max-width: 1470px;
	box-sizing: border-box;
	padding: 10px;
	display: none;
	}

	#index-gallery4.open{
	display: inline;
	}

	.item4{
	width:80px;
	text-align:center;
	display:block;
	background-color: transparent;
	margin-bottom: 5px;
	margin-right: 5px;
	margin-left: 5px;
	float:left;
	}

	.buttonh4{
	float: left;
	cursor: pointer;
	-webkit-transition-duration: 0.4s; 
	transition-duration: 0.4s;
	}

	.buttonh4:hover{
	box-shadow: 0 16px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	float:left;
	}

	</style>


	<?php
	$result_h4 = mysqli_query($con,"Select * from hero");?>

	<div id="index-gallery4">
	<h3 style="color:white; margin-bottom: 10px;">选择你第三位常用英雄：</h3>
	
	<?php 
	while ($hero_information4 = $result_h4->fetch_assoc()):
	?>



	<div class="item4">
		
	<a class="buttonh4" id='<?= $hero_information4['Hero_ID'] ?>' onClick="reply_click4(this.id)" src='<?= $hero_information4['Hero_Photo_Path'] ?>'>
		<img height='78' width='100' id='<?= $hero_information4['Hero_ID'] ?>' onClick="reply_click4(this.id)" src='<?= $hero_information4['Hero_Photo_Path'] ?>' alt=""/>
		<p id='<?= $hero_information4['Hero_ID'] ?>' onClick="reply_click4(this.id)" style="color:white;"><?= $hero_information4['Hero_Name'] ?></p></a>
	</div>



<?php endwhile; ?>
</div>



<script>
	var button4 = document.getElementById('h4');
	var item4 = document.getElementById('index-gallery4');
	
	button4.onclick = function(){
		item2.className = "";
		item3.className = "";
		item.className = "";
		itemrh4.className = "";
		itemrh3.className = "";
		itemrh2.className = "";
		itemrh1.className = "";

		if(item4.className == "open"){
			item4.className = "";
		}else{
			item4.className = "open";
		
			item4.scrollIntoView();
		}
	}

	function reply_click4(clicked_id){

	var h4id = document.getElementById(clicked_id).getAttribute("src");
	document.getElementById("h4").src = h4id;
	document.getElementById("He_4").setAttribute('value', h4id);
	item4.className = "";
	}
	



</script>

<!-- 本名英雄荣耀 -->
<style>
#RH1-gallery{
	float:left;
	margin-left: 20px;
  	border: 1px blue solid;
  	max-width: 1470px;
	box-sizing: border-box;
	padding: 10px;
	display: none;
	  }

	#RH1-gallery.open{
	display: inline;
	}

	.itemrh1 {
    width:80px;
    text-align:center;
    display:block;
    background-color: transparent;
	margin-bottom: 5px;
    margin-right: 5px;
    margin-left: 5px;
    float:left;
	}

  .RH1-button{  
	float: left;
	cursor: pointer;
  	-webkit-transition-duration: 0.4s; 
  	transition-duration: 0.4s;
  }

  .RH1-button:hover{
	box-shadow: 0 16px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	float:left;
  }
</style>

    <div id="RH1-gallery">
		<h3 style="color:white; margin-bottom: 10px;">选择你的本名英雄荣耀：</h3>
		
			<div class="itemrh1">
				<a class="RH1-button"  id='RH1L0' onClick="reply_clickrh1(this.id)" src='img/hero_logo/background.png'>
				<img height='50' width='50' id='RH1L0' onClick="reply_clickrh1(this.id)" src='img/hero_logo/background.png' alt=""/>
				</a>
				
			</div>
		
			<div class="itemrh1">
				<a class="RH1-button" id='RH1L1' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL1.png'>
					<img height='39' width='50' id='RH1L1' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL1.png' alt=""/>
				<p id='RH1L1' onClick="reply_clickrh1(this.id)" style="color:white;">初级荣耀</p></a>
				
			</div>

			<div class="itemrh1">
				<a class="RH1-button" id='RH1L2' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL2.png'>
					<img height='39' width='50' id='RH1L2' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL2.png' alt=""/>
					<p id='RH1L2' onClick="reply_clickrh1(this.id)" style="color:white;">中级荣耀</p></a>
			</div>	
			<div class="itemrh1">
				<a class="RH1-button" id='RH1L3' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL3.png'>
					<img height='39' width='50' id='RH1L3' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL3.png' alt=""/>
					<p id='RH1L3' onClick="reply_clickrh1(this.id)" style="color:white;">高级荣耀</p></a>
			</div>	
			<div class="itemrh1">
				<a class="RH1-button" id='RH1L4' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL4.png'>
					<img height='39' width='50' id='RH1L4' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL4.png' alt=""/>
					<p id='RH1L4' onClick="reply_clickrh1(this.id)" style="color:white;">顶级荣耀</p></a>
			</div>	
			<div class="itemrh1">
				<a class="RH1-button" id='RH1L5' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL5.png'>
					<img height='39' width='50' id='RH1L5' onClick="reply_clickrh1(this.id)" src='img/hero_logo/HL5.png' alt=""/>
					<p id='RH1L5' onClick="reply_clickrh1(this.id)" style="color:white;">国服最强</p></a>
			</div>	
		</div>	
			
			

				
			


    <script>
			var buttonrh1 = document.getElementById('RH1');
			var itemrh1 = document.getElementById('RH1-gallery');

			buttonrh1.onclick = function(){
				item2.className = "";
				item3.className = "";
				item4.className = "";
				item.className = "";

  				
				if(itemrh1.className == "open"){
					itemrh1.className = "";
				}else{
					itemrh1.className = "open";
					itemrh3.className = "";
					itemrh4.className = "";
					itemrh2.className = "";
					itemrh1.scrollIntoView();
				}
				
			}


			

		function reply_clickrh1(clicked_id){

				var rh1 = document.getElementById(clicked_id).getAttribute("src");
  				document.getElementById("RH1").src = rh1;
				document.getElementById("Rhero1").setAttribute('value', rh1);
			  itemrh1.className = "";
			


		}
	</script>

<!-- first hero L -->

<style>
#RH2-gallery{
	float:left;
	margin-left: 20px;
  	border: 1px blue solid;
  	max-width: 1470px;
	box-sizing: border-box;
	padding: 10px;
	display: none;
	  }

	#RH2-gallery.open{
	display: inline;
	}

	.itemrh2 {
    width:80px;
    text-align:center;
    display:block;
    background-color: transparent;
	margin-bottom: 5px;
    margin-right: 5px;
    margin-left: 5px;
    float:left;
	}

  .RH2-button{
	  
	float: left;
	cursor: pointer;
  	-webkit-transition-duration: 0.4s; 
  	transition-duration: 0.4s;
  }

  .RH2-button:hover{
	box-shadow: 0 16px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	float:left;
  }
</style>

    <div id="RH2-gallery">
		<h3 style="color:white; margin-bottom: 10px;">选择你的第一位英雄荣耀：</h3>
		
			<div class="itemrh2">
				<a class="RH2-button"  id='RH2L0' onClick="reply_clickrh2(this.id)" src='img/hero_logo/background.png'>
				<img height='50' width='50' id='RH2L0' onClick="reply_clickrh2(this.id)" src='img/hero_logo/background.png' alt=""/>
				</a>
				
			</div>
		
			<div class="itemrh2">
				<a class="RH2-button" id='RH2L1' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL1.png'>
					<img height='39' width='50' id='RH2L1' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL1.png' alt=""/>
				<p id='RH2L1' onClick="reply_clickrh2(this.id)" style="color:white;">初级荣耀</p></a>
				
			</div>

			<div class="itemrh2">
				<a class="RH2-button" id='RH2L2' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL2.png'>
					<img height='39' width='50' id='RH2L2' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL2.png' alt=""/>
					<p id='RH2L2' onClick="reply_clickrh2(this.id)" style="color:white;">中级荣耀</p></a>
			</div>	
			<div class="itemrh2">
				<a class="RH2-button" id='RH2L3' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL3.png'>
					<img height='39' width='50' id='RH2L3' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL3.png' alt=""/>
					<p id='RH2L3' onClick="reply_clickrh2(this.id)" style="color:white;">高级荣耀</p></a>
			</div>	
			<div class="itemrh2">
				<a class="RH2-button" id='RH2L4' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL4.png'>
					<img height='39' width='50' id='RH2L4' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL4.png' alt=""/>
					<p id='RH2L4' onClick="reply_clickrh2(this.id)" style="color:white;">顶级荣耀</p></a>
			</div>	
			<div class="itemrh2">
				<a class="RH2-button" id='RH2L5' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL5.png'>
					<img height='39' width='50' id='RH2L5' onClick="reply_clickrh2(this.id)" src='img/hero_logo/HL5.png' alt=""/>
					<p id='RH2L5' onClick="reply_clickrh2(this.id)" style="color:white;">国服最强</p></a>
			</div>	
	</div>	
			
			

				
			


    <script>
			var buttonrh2 = document.getElementById('RH2');
			var itemrh2 = document.getElementById('RH2-gallery');

			buttonrh2.onclick = function(){
				item2.className = "";
				item3.className = "";
				item4.className = "";
				item.className = "";
  				
				if(itemrh2.className == "open"){
					itemrh2.className = "";
				}else{
					itemrh2.className = "open";
					itemrh1.className = "";
					itemrh3.className = "";
					itemrh4.className = "";
					
					itemrh2.scrollIntoView();
				}
				
			}


			

		function reply_clickrh2(clicked_id){

			var rh2 = document.getElementById(clicked_id).getAttribute("src");
  			document.getElementById("RH2").src = rh2;
			document.getElementById("Rhero2").setAttribute('value', rh2);
			itemrh2.className = "";
		}
	</script>

<!-- second hero L--> 
<style>
#RH3-gallery{
	float:left;
	margin-left: 20px;
  	border: 1px blue solid;
  	max-width: 1470px;
	box-sizing: border-box;
	padding: 10px;
	display: none;
	  }

	#RH3-gallery.open{
	display: inline;
	}

	.itemrh3 {
    width:80px;
    text-align:center;
    display:block;
    background-color: transparent;
	margin-bottom: 5px;
    margin-right: 5px;
    margin-left: 5px;
    float:left;
	}

  .RH3-button{
	  
	float: left;
	cursor: pointer;
  	-webkit-transition-duration: 0.4s; 
  	transition-duration: 0.4s;
  }

  .RH3-button:hover{
	box-shadow: 0 16px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	float:left;
  }
</style>

    <div id="RH3-gallery">
		<h3 style="color:white; margin-bottom: 10px;">选择你的第二位英雄荣耀：</h3>
		
			<div class="itemrh3">
				<a class="RH3-button"  id='RH3L0' onClick="reply_clickrh3(this.id)" src='img/hero_logo/background.png'>
				<img height='50' width='50' id='RH3L0' onClick="reply_clickrh3(this.id)" src='img/hero_logo/background.png' alt=""/>
				</a>
				
			</div>
		
			<div class="itemrh3">
				<a class="RH3-button" id='RH3L1' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL1.png'>
					<img height='39' width='50' id='RH3L1' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL1.png' alt=""/>
				<p id='RH3L1' onClick="reply_clickrh3(this.id)" style="color:white;">初级荣耀</p></a>
				
			</div>

			<div class="itemrh3">
				<a class="RH3-button" id='RH3L2' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL2.png'>
					<img height='39' width='50' id='3' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL2.png' alt=""/>
					<p id='3' onClick="reply_clickrh3(this.id)" style="color:white;">中级荣耀</p></a>
			</div>	
			<div class="itemrh3">
				<a class="RH3-button" id='RH3L3' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL3.png'>
					<img height='39' width='50' id='RH3L3' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL3.png' alt=""/>
					<p id='RH3L3' onClick="reply_clickrh3(this.id)" style="color:white;">高级荣耀</p></a>
			</div>	
			<div class="itemrh3">
				<a class="RH3-button" id='RH3L4' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL4.png'>
					<img height='39' width='50' id='RH3L4' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL4.png' alt=""/>
					<p id='RH3L4' onClick="reply_clickrh3(this.id)" style="color:white;">顶级荣耀</p></a>
			</div>	
			<div class="itemrh3">
				<a class="RH3-button" id='RH3L5' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL5.png'>
					<img height='39' width='50' id='RH3L5' onClick="reply_clickrh3(this.id)" src='img/hero_logo/HL5.png' alt=""/>
					<p id='RH3L5' onClick="reply_clickrh3(this.id)" style="color:white;">国服最强</p></a>
			</div>	
		</div>		
			
			

				
			


    <script>
			var buttonrh3 = document.getElementById('RH3');
			var itemrh3 = document.getElementById('RH3-gallery');

			buttonrh3.onclick = function(){
				item2.className = "";
				item3.className = "";
				item4.className = "";
				item.className = "";
  				
				if(itemrh3.className == "open"){
					itemrh3.className = "";
				}else{
					itemrh3.className = "open";
					itemrh4.className = "";
					itemrh2.className = "";
					itemrh1.className = "";
					
					itemrh3.scrollIntoView();
				}
				
			}


			

		function reply_clickrh3(clicked_id){

			var rh3 = document.getElementById(clicked_id).getAttribute("src");
  			document.getElementById("RH3").src = rh3;
			  document.getElementById("Rhero3").setAttribute('value', rh3);
			  itemrh3.className = "";
	
			 
		}
	</script>

 <!-- Hero L 4 --> 
 <style>
#RH4-gallery{
	float:left;
	margin-left: 20px;
  	border: 1px blue solid;
  	max-width: 1470px;
	box-sizing: border-box;
	padding: 10px;
	display: none;
	  }

	#RH4-gallery.open{
	display: inline;
	}

	.itemrh4 {
    width:80px;
    text-align:center;
    display:block;
    background-color: transparent;
	margin-bottom: 5px;
    margin-right: 5px;
    margin-left: 5px;
    float:left;
	}

  .RH4-button{
	  
	float: left;
	cursor: pointer;
  	-webkit-transition-duration: 0.4s; 
  	transition-duration: 0.4s;
  }

  .RH4-button:hover{
	box-shadow: 0 16px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	float:left;
  }
</style>

    <div id="RH4-gallery">
		<h3 style="color:white; margin-bottom: 10px;">选择你的第三位英雄荣耀：</h3>
		
			<div class="itemrh4">
				<a class="RH4-button"  id='RH4L0' onClick="reply_clickrh4(this.id)" src='img/hero_logo/background.png'>
				<img height='50' width='50' id='RH4L0' onClick="reply_clickrh4(this.id)" src='img/hero_logo/background.png' alt=""/>
				</a>
				
			</div>
		
			<div class="itemrh4">
				<a class="RH4-button" id='RH4L1' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL1.png'>
					<img height='39' width='50' id='RH4L1' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL1.png' alt=""/>
				<p id='RH4L1' onClick="reply_clickrh4(this.id)" style="color:white;">初级荣耀</p></a>
				
			</div>

			<div class="itemrh4">
				<a class="RH4-button" id='RH4L2' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL2.png'>
					<img height='39' width='50' id='3' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL2.png' alt=""/>
					<p id='3' onClick="reply_clickrh4(this.id)" style="color:white;">中级荣耀</p></a>
			</div>	
			<div class="itemrh4">
				<a class="RH4-button" id='RH4L3' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL3.png'>
					<img height='39' width='50' id='RH4L3' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL3.png' alt=""/>
					<p id='RH4L3' onClick="reply_clickrh4(this.id)" style="color:white;">高级荣耀</p></a>
			</div>	
			<div class="itemrh4">
				<a class="RH4-button" id='RH4L4' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL4.png'>
					<img height='39' width='50' id='RH4L4' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL4.png' alt=""/>
					<p id='RH4L4' onClick="reply_clickrh4(this.id)" style="color:white;">顶级荣耀</p></a>
			</div>	
			<div class="itemrh4">
				<a class="RH4-button" id='RH4L5' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL5.png'>
					<img height='39' width='50' id='RH4L5' onClick="reply_clickrh4(this.id)" src='img/hero_logo/HL5.png' alt=""/>
					<p id='RH4L5' onClick="reply_clickrh4(this.id)" style="color:white;">国服最强</p></a>
			</div>	
			
	</div>		
			

				
			


    <script>
			var buttonrh4 = document.getElementById('RH4');
			var itemrh4 = document.getElementById('RH4-gallery');

			buttonrh4.onclick = function(){
				item2.className = "";
				item3.className = "";
				item4.className = "";
				item.className = "";
				if(itemrh4.className == "open"){
					itemrh4.className = "";
				}else{
					itemrh4.className = "open";
					itemrh3.className = "";
					itemrh2.className = "";
					itemrh1.className = "";
					
					itemrh4.scrollIntoView();
				}
				
			}


			

		function reply_clickrh4(clicked_id){

			var rh4 = document.getElementById(clicked_id).getAttribute("src");
  			document.getElementById("RH4").src = rh4;
			  document.getElementById("Rhero4").setAttribute('value', rh4);
			  itemrh4.className = "";
		}
	</script>

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
						
	
	