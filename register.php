<?php
include("conn.php");
mysqli_set_charset($con, 'utf8');
$P1 = $_POST['password'];
$P2 = $_POST['password1'];

if($P1 !== $P2){
    echo "<script>alert('密码不一致， 请确保密码输入一致 !');";
    die ("window.history.go(-1);</script>");
}

$RID = $_POST['registedid'];
 $sql = "select * from register where R_ID = '$RID'";
 $result = mysqli_query($con, $sql);

 if(mysqli_num_rows($result)<=0)
{ 
  echo "<script>alert('验证码无效， 请向队长或副队长索取验证码。');";
  die("window.history.go(-1);</script>");
}

$username = $_POST['username'];
 $sql1 = "select * from user where Username = '$username'";
 $result1 = mysqli_query($con, $sql1);

 if(mysqli_num_rows($result1)>0)
 { 
   echo "<script>alert('用户名已被注册，请使用其他用户名。');";
   die("window.history.go(-1);</script>");
 }

 $sql2 = "select ID from register where R_ID = '$RID'";
 $result2 = mysqli_query($con, $sql2);
 while ($row = $result2->fetch_assoc()) {
    if($row['ID'] == 1){
       $confirm=1;
    }else{
        $confirm=2;
    }
}

if($confirm == 2){
    $insql = "INSERT INTO `user`(Username, Password, Role) 
    VALUES ('$username','$P1',2)";
    if (!mysqli_query($con,$insql))
    {
        die('Error: ' . mysqli_error($con));
    }else{
        mysqli_close($con);
        echo"<script>
        alert('成功注册账户， 请登入。');
        window.location.replace('login.html');
        </script>";
    }
    
}

if($confirm == 1){
    $insql = "INSERT INTO `user`(Username, Password, Role, Permission) 
    VALUES ('$username','$P1',1,1)";
    if (!mysqli_query($con,$insql))
    {
        die('Error: ' . mysqli_error($con));
    }else{
        mysqli_close($con);
        echo"<script>
        alert('成功注册管理员账户， 账号等待管理员审核。');
        window.location.replace('login.html');
        </script>";
    }
    
}

?>
