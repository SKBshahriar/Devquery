<?php
/**
 * Created by PhpStorm.
 * User: Sakib
 * Date: 9/4/2018
 * Time: 10:59 PM
 */

session_start();
$_SESSION['loggedin']= 1;
$_SESSION['user_name'] = $_POST['username'];

header('Location: home.php');
?>