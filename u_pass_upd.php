<?php
$id = $_POST['id'];
$org = $_POST['org'];
$old_pass = $_POST['oldpassword'];
$new_pass = $_POST['newpassword'];
$clf_pass = $_POST['clfpassword'];

if ($old_pass !== $org){
    echo "<script>alert('密码错误，请再次输入');</script>";
    echo "<script>window.history.go(-1);</script>";

}elseif ($new_pass !== $clf_pass){
    echo "<script>alert('新密码不一致，请再次输入');</script>";
    echo "<script>window.history.go(-1);</script>";
}else{
    include("conn.php");
    mysqli_set_charset($con, "utf8");
    $sql = "update user set Password='$new_pass' where User_ID=$id";
    if(mysqli_query($con, $sql)){
    echo "<script>alert('密码修改成功，请重新登入。');</script>";
    echo "<script>window.location.replace('login.html');</script>";
    mysqli_close($con);
    }else{
    echo "<script>alert('Sorry, there was an error uploading your file. Please contact adminstration !');</script>";
    echo "<script>window.history.go(-1);</script>";
}
}


?>