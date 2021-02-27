<?php
include("conn.php");
$id = intval($_GET['id']);
mysqli_set_charset($con, "utf8");

$sql = "Delete from information where User_ID = $id";

if (mysqli_query($con, $sql))
{
    echo "<script>alert('Your file was deleted successfully.');</script>";
    echo "<script>window.location.replace('my_information_view.php');</script>";
    mysqli_close($con);

}else{
    echo "<script>alert('Sorry, there was an error deleting your file. Please contact adminstration !');</script>";
    echo "<script>window.history.go(-1);</script>";
}
?>