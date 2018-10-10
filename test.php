<?php
/**
 * Created by PhpStorm.
 * User: Sakib
 * Date: 9/5/2018
 * Time: 2:29 AM
 */
session_start();
include 'dbconnect.php';
$user_name =  $_SESSION['user_name'];

$sql ="select * from my_post where user_name='$user_name'";
$result = $db->query($sql);
$res = $result->fetch_assoc();

while($res){
    echo $res['post_id'];
    $res = $result->fetch_assoc();
}
?>