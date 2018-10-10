<?php
/**
 * Created by PhpStorm.
 * User: Sakib
 * Date: 9/5/2018
 * Time: 2:24 AM
 */

include 'dbconnect.php';
session_start();

if($_SESSION['loggedin'] != 1)
    header('Location: index.php');
$user_name = $_SESSION['user_name'];
$sql = "select * from following where user_name='$user_name'";
$result = $db->query($sql);
$res = $result->fetch_assoc();
$following = array();
$posts = array();
$interest = array();
while($res){
    array_push($following,$res['following_user_name']);
    $res = $result->fetch_assoc();

}

for($i = 0; $i < count($following); $i++){
    $sql = "select * from my_post where user_name='$following[$i]'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    while($res){
        array_push($posts,$res['post_id']);
        $res = $result->fetch_assoc();
    }

}



$sql = "select * from interest where user_name='$user_name'";
$result = $db->query($sql);
$res = $result->fetch_assoc();
while($res){

    $res = $result->fetch_assoc();
    array_push($interest,$res['tag_name']);
}

for($i = 0; $i < count($interest); $i++){
    $sql = "select * from post_tag where tag_name='$interest[$i]'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    while($res){
        array_push($posts,$res['post_id']);
        $res = $result->fetch_assoc();
    }
}






$sql ="select * from my_post where user_name='$user_name'";
$result = $db->query($sql);
$res = $result->fetch_assoc();
while($res){
    array_push($posts,$res['post_id']);
    $res = $result->fetch_assoc();
}




//$posts = array_unique($posts);

?>