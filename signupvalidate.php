<?php
/**
 * Created by PhpStorm.
 * User: Sakib
 * Date: 9/2/2018
 * Time: 12:35 AM
 */


include 'dbconnect.php';


$first_name = $_POST['firstname'];
$last_name =  $_POST['lastname'];
$user_name = $_POST['username'];
$email = $_POST['email'];
$profile_tag = $_POST['profiletag'];
$password = $_POST['pwd'];
$date = date("Y-m-d");

$sql = "insert into user(first_name,last_name,user_name,password,date_of_join,email,profile_tag) values('$first_name','$last_name','$user_name','$password','$date','$email','$profile_tag')";

$db->query($sql);


$tags = $_POST['tags'];

foreach ($tags as $tag){
    $sql = "insert into interest(tag_name,user_name) values('$tag','$user_name')";
    $db->query($sql);
}
header('Location: index.php');
?>