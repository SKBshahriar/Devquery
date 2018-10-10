<?php
/**
 * Created by PhpStorm.
 * User: Sakib
 * Date: 9/10/2018
 * Time: 4:26 AM
 */

include 'dbconnect.php';
session_start();
if(isset($_POST['ask'])){
    $community_id = $_POST['community_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $datetime = date("Y-m-d H:i:s");


    $sql = "insert into post(post_title,post_description,img,posted_on) values('$title','$description',1,'$datetime')";
    $db->query($sql);

    $sql = "SELECT MAX(post_id) as temp FROM post";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    $p_id = $res['temp'];
    $user_name = $_SESSION['user_name'];
    $sql = "insert into community_post(post_id,community_id,user_name) values('$p_id','$community_id','$user_name')";
    $db->query($sql);

    uploadPhoto($p_id);


    

    $str = "community_id={$community_id}";
    header('Location: community_home.php?'.$str);

}



function uploadPhoto($p_id){

    $src = $_FILES["photo"]["tmp_name"];
    if (getimagesize($src) === false)
        return false;

    $target = "postimg/$p_id.jpg";
    move_uploaded_file($src, $target);
}

?>