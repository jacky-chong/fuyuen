<?php
include("conn.php");
mysqli_set_charset($con, 'utf8');
session_start();

$username = $con -> real_escape_string($_POST['username']);
$password = $con -> real_escape_string($_POST['password']);

$sql="SELECT * FROM user WHERE BINARY Username='$username' and Password='$password'";
$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)<=0)
{ 
  echo "<script>alert('Wrong username or password.');";
  die("window.history.go(-1);</script>");
}

if($row=mysqli_fetch_array($result))
{
  $permission = $row['Permission'];
    $password_1 = $row['Password'];
   $_SESSION['user']=$row['Username'];
   $_SESSION['role']=$row['Role'];
   $_SESSION['uid']=$row['User_ID'];
   $id = $_SESSION['uid'];
  
  if(empty($permission)){
    if($password_1==$_POST['password']){
          if($_SESSION['role']==="1"){
          
              echo "<script>alert('Welcome back ".$_SESSION['user']."');";
              echo "window.location.href='home.php';</script>";
              }
          else if($_SESSION['role']==="2") {
              echo "<script>alert('Welcome back ".$_SESSION['user']."');";
              echo"window.location.href='user_index.php';</script>";
              }
    }else{
          echo "<script>alert('Wrong username or password.');";
          die("window.history.go(-1);</script>");       
    }

    
  }else{
    echo "<script>alert('账户未通过审核，请稍后再试。');";
    die("window.history.go(-1);</script>");
  }    
}


?>


