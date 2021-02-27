<?php

include("conn.php");
$id = $_POST['uid'];

$user_name = $_POST['name'];
$user_age = $_POST['age'];

$user_gender = $_POST['gender'];
$user_contact = $_POST['contact'];

$user_team_position = $_POST['team_position'];
$user_range_general = $_POST['range_general'];
$user_range_team = $_POST['range_team'];
$user_patner = $_POST['patner'];
$user_hero_position_1 = $_POST['hero_position_1'];
$user_hero_position_2 = $_POST['hero_position_2'];
$user_available_time_1 = $_POST['available_time_1'];
$user_available_time_2 = $_POST['available_time_2'];
$user_message = $_POST['message'];

$user_hero_1 = $_POST['hero_1'];
$user_hero_2 = $_POST['hero_2'];
$user_hero_3 = $_POST['hero_3'];
$user_hero_4 = $_POST['hero_4'];

$user_he_1 = $_POST['he_1'];
$user_he_2 = $_POST['he_2'];
$user_he_3 = $_POST['he_3'];
$user_he_4 = $_POST['he_4'];

$user_hero_show = $_POST['hero_show'];
$user_hero_picturepath = $_POST['hero_pp'];
$user_hero_videopath = $_POST['hero_vp'];

$target_dir = "User_Photo/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 1;


if ($_FILES["photo"]["size"] == 0){
    $sql1 = "UPDATE information set Name='$user_name', Age='$user_age', Gender='$user_gender', contact='$user_contact',
    Range_General='$user_range_general', Range_Team='$user_range_team', Message='$user_message', 
    Hero_Position_1='$user_hero_position_1', Hero_Position_2='$user_hero_position_2', Available_Time_1='$user_available_time_1',
    Available_Time_2='$user_available_time_2', Patner='$user_patner', Range_H1='$user_hero_1', Range_H2='$user_hero_2', 
    Range_H3='$user_hero_3', Range_H4='$user_hero_4', Hero_Path1 = '$user_he_1', Hero_Path2='$user_he_2', Hero_Path3='$user_he_3', Hero_Path4='$user_he_4', 
    Hero_Displaypath='$user_hero_show', H_Picture_Path='$user_hero_picturepath', H_Gif_Path='$user_hero_videopath'
    where User_ID = '$id';";
    mysqli_set_charset($con, 'utf8');
    if (mysqli_query($con, $sql1))
    {

        echo "<script>alert('Your file was uploaded successfully.');</script>";
        echo "<script>window.location.replace('my_information_view.php');</script>";
    mysqli_close($con);
    
    }
  
}else{

    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
    
        if ($_FILES["photo"]["size"] > 5000000) {
            echo "<script>alert('Sorry, your file was not uploaded. Image size cannot bigger than 5MB. Please select an image file and upload again.');</script>";
            $uploadOk = 0;
        }else{
            $uploadOk == 1;
        }
        
        
    } else {
    echo "<script>alert('Sorry, your file was not uploaded. File is not an image. Please select an image file and upload again.');</script>";
    
    $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
        echo "<script>window.history.go(-1);</script>";
       
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {

            $sql = "UPDATE information set Name='$user_name', Age='$user_age', Gender='$user_gender', contact='$user_contact',
            Range_General='$user_range_general', Range_Team='$user_range_team', Message='$user_message', 
            Hero_Position_1='$user_hero_position_1', Hero_Position_2='$user_hero_position_2', Available_Time_1='$user_available_time_1',
            Available_Time_2='$user_available_time_2', Patner='$user_patner', Photo_Path='$target_file', Range_H1='$user_hero_1', Range_H2='$user_hero_2', 
            Range_H3='$user_hero_3', Range_H4='$user_hero_4', Hero_Path1 = '$user_he_1', Hero_Path2='$user_he_2', Hero_Path3='$user_he_3', Hero_Path4='$user_he_4',
            Hero_Displaypath='$user_hero_show', H_Picture_Path='$user_hero_picturepath', H_Gif_Path='$user_hero_videopath'
            where User_ID = '$id';";
            mysqli_set_charset($con, 'utf8');
            if (mysqli_query($con, $sql))
            {
                echo "<script>alert('Your file was uploaded successfully.');</script>";
                echo "<script>window.location.replace('my_information_view.php');</script>";
            mysqli_close($con);
            
            }
           
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file. Please contact adminstration !');</script>";
            echo "<script>window.history.go(-1);</script>";
        }
    }

}

?>



