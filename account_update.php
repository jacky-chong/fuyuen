<?php
include("conn.php");
$permission = $_POST['pms'];
$password = $_POST['psd'];
$id = $_POST['id'];




$sql = "update user set Password='$password', Permission='$permission' where User_ID = $id;";


mysqli_set_charset($con, 'utf8');
        if (mysqli_query($con, $sql)){

            if(empty($_POST['tp'])){
                echo "<script>alert('Your file was uploaded successfully.');</script>";
                echo "<script>window.location.replace('account.php');</script>";
                mysqli_close($con);
            }else{
                $position = $_POST['tp'];
                $sql2 = "update information set Team_Position = '$position' where User_ID = $id;";
                if(mysqli_query($con, $sql2)){
                    echo "<script>alert('Your file was uploaded successfully.');</script>";
                    echo "<script>window.location.replace('account.php');</script>";
                    mysqli_close($con);
                     }else{
                        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
                        echo "<script>window.history.go();</script>";
                     }
            }
            
           
           
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            echo "<script>window.history.go(-1);</script>";
        }

?>