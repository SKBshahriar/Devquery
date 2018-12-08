<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DevQuery</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
    <link rel="stylesheet" href="assets/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
    <link rel="stylesheet" href="assets/mobirise/css/style.css">
    <link rel="stylesheet" href="assets/mobirise-gallery/style.css">
    <link rel="stylesheet" href="assets/mobirise-slider/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        #nav-a
        {
            color: white;
        }
        #nav-a:hover
        {
            color: darkred;
        }

        .nf{
            display:none;
        }
        .notify {
            list-style: none;
            width: 100%;
            padding-left: 0;
            overflow: auto;
            height: 404px;
        }

        ul.notify li {
            position: relative;
        }

        ul.notify li a {
            text-decoration: none;
            color: darkblue;
            display: block;
            padding: 14px 13px;
            width: 100%;
            background: darkgray;
            border-bottom: 1px solid;
        }
        ul.notify li a:hover {
            background: whitesmoke;
        }

        .nf::before {
            content: '';
            border-bottom: 11px solid #4CAF50;
            border-right: 11px solid transparent;
            border-left: 9px solid transparent;
            position: absolute;
            left: 23px;
            bottom: -8px;
        }

        .nn {
            width: 550px;
            position: absolute;
            left: -414px;
            top: 50px;
            height: 493px;
        }

        button.btn1 {
            color: white;
            padding: 11px 25px;
            border: none;
            outline:none;
            margin: 0 auto;
            background-color: #4CAF50;
            display: block;
            cursor: pointer;
            width: 100%;
        }

        button.btn1:hover {
            opacity: 1;
            background-color: #4CAF50;
        }

    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
include 'post_generate.php';

function find_unique($posts){
    $temp = array();

    for($i = 0;$i <count($posts); $i++){
        $num = $posts[$i];
        $flg = 0;
        for($j = 0; $j < count($temp); $j++){
            if($num == $temp[$j]) {
                $flg = 1;
                break;
            }
        }
        if($flg == 0){
            array_push($temp,$num);
        }

    }
    return $temp;
}



function get_vote($post_id,$vote_direction,$db){
    $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='$vote_direction'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    return $res['cnt'];
}


function check_vote($post_id,$vote_direction,$user_name,$db){
    $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='$vote_direction' and user_name = '$user_name'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    $temp = $res['cnt'];

    if($temp == 1) return true;
    else return false;
}
?>



<body onclick="ok()">
<nav class="navbar" style="z-index: 9999">
    <div class="container" id="mainnav">
        <img src="img/logo.png" style="height: 50px;width: 54px;float: left; padding: 2px 2px "/>
        <div class="navbar-header">
            <a class="navbar-brand logo" href="home.php">DevQuery</a>
        </div>
        <form style="width:330px;float: left" action="search.php" method="get">
            <input id="search" type="text" name="key" placeholder="Search.." style="width: 150px;height: 34px;border-radius:5px ">
        </form>
        <ul class="nav navbar-nav" style="margin-right: 40px">
            <li>
                <a href="profile.php" class="active" id="nav-a"><img src="img/user.ico" style="height: 35px;width: 35px;float: left; margin-right: 5px "/><?php echo $_SESSION['user_name'];?></a>
            </li>
            <li >
                <?php
                $user_name = $_SESSION['user_name'];
                $sql_temp = "select count(notification_id) as cnt from notification where user_name = '$user_name' and is_read = '0'";
                $r_temp = $db->query($sql_temp);
                $rs_temp = $r_temp->fetch_assoc();
                $notf_cnt = $rs_temp['cnt'];
                ?>
                <a onclick="myfunction()" class="fo"  href="#" id="nav-a"><img   src="img/notify.png" style="height: 34px;width: 34px;float: left;margin-right: 5px"/> <?php echo $notf_cnt;?> </a>
                <div class="nf">
                    <div class="nn">

                        <ul class="notify">
                            <?php
                            $user_name = $_SESSION['user_name'];
                            $sql_temp = "select * from notification where user_name = '$user_name' ORDER BY notification.notification_id DESC";
                            $result_temp = $db->query($sql_temp);
                            $res_temp = $result_temp->fetch_assoc();
                            while($res_temp){
                                $p_id = $res_temp['post_id'];
                                $detail = $res_temp['notification_details'];
                                $ir = $res_temp['is_read'];
                                $notf_id = $res_temp['notification_id'];

                                $s = "select * from my_post where post_id = '$p_id' ";
                                $r = $db->query($s);
                                $r = $r->fetch_assoc();
                                if($ir == 0){?>
                                    <li><a <?php if($r){?>href="post.php?post_id=<?php echo $p_id;?>" <?php } else {?> href="post1.php?post_id=<?php echo $p_id;?>" <?php }?> onclick="return notf_update(<?php echo $notf_id;?>)"><img style="margin:6px" width="40" height="40" src="img/user.ico" alt=""><?php echo $detail;?></a></li>
                                <?php }else{?>
                                    <li ><a <?php if($r){?>href="post.php?post_id=<?php echo $p_id;?>" <?php } else {?> href="post1.php?post_id=<?php echo $p_id;?>" <?php }?> style="background-color: #F5F5F5;"><img style="margin:6px" width="40" height="40" src="img/user.ico" alt=""><?php echo $detail;?></a></li>

                                <?php } $res_temp = $result_temp->fetch_assoc(); }?>

                        </ul>
                    </div>

                </div>

            </li>

            <li>
                <a href="#" id="nav-a"><img src="img/chat.png" style="height: 34px;width: 34px;float: left;margin-right: 5px"/>[2] </a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-align-justify"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2" style="background-color:whitesmoke;height: 555px;position: fixed;margin-left: 10px;box-shadow:20px 20px 50px 10px lightblue inset ">



            <div style="margin-top: 28px ">
                <a href="ask.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/post.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Post</a>
            </div>


            <div style="margin-top: 18px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/msg.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Message</a>
            </div>

            <div style="margin-top: 18px ">
                <a href="community.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/comminity.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Communities</a>
            </div>

            <div style="margin-top: 18px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/saved.png" style="height: 35px;width: 35px;margin-right:10px;"/>Saved</a>
            </div>


            <div style="margin-top: 18px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/settings.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Settings</a>
            </div>
            <div style="margin-top: 180px ">
                <a href="about.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/about.svg" style="height: 35px;width: 35px;margin-right:10px;"/>About</a>
            </div>
            <div style="margin-top: 18px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/contact.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Contact</a>
            </div>


        </div>
        <div class="col-lg-8" style="background-color:white;margin-left: 295px">
            <div style="margin: 20px 0px 10px 0px;">
                <form action="ask.php">
                    <button id="btnask" style="background-color: #72bb53;color: white;padding: 14px 20px;border-radius: 15px;margin: 8px 0;border: none;cursor: pointer;width: 25%;">Post Any Quary</button>
                </form>
            </div>


            <?php
            $user_name = $_SESSION['user_name'];
            $posts = find_unique($posts);
            $posts = array_reverse($posts);

            for($i = 0; $i < count($posts); $i++) {
                $sql = "select * from post natural join my_post where post_id='$posts[$i]'";
                $result = $db->query($sql);
                $res = $result->fetch_assoc();
                $post_title = $res['post_title'];
                $post_description = $res['post_description'];
                $posts_owner = $res['user_name'];
                $img = $res['img'];
                $post_id = $res['post_id'];



                if($img == 0) {?>



                    <div class="col-lg-12" style="border: 1px solid black;margin-top:10px ">
                        <div style="margin: 20px 0px 10px 10px;">
                            <a href="userprofile.php?user_name=<?php echo $posts_owner?>" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none; "><img src="img/user.ico" style="height: 35px;width: 35px;margin-right:10px;"/><?php echo $posts_owner?></a>
                        </div>
                        <div style="margin: 0px 10px 10px 10px;">
                            <h2><b><?php echo "<a href='post.php?post_id=$post_id' style='color: darkblue;text-decoration: none;'>$post_title</a>"?></b></h2>
                        </div>

                        <div class="col-lg-8"  style="height: auto;padding-right:5%;" >

                            <p><?php
                                if(strlen($post_description) < 600){
                                    echo $post_description;

                                }
                                else {
                                    $temp = str_split($post_description,600);
                                    $post_description = $temp[0];
                                    echo $post_description." "."<a href='post.php?post_id=$post_id'>see more</a>";



                                }
                                ?>
                            </p>
                        </div>





                        <div class="col-lg-12" style="border-top: 2px solid black; margin: 3px 0px 5px 0px">
                            <ul class="nav navbar-nav" style="float: left">
                                <li>
                                    <button type="button" class="btn btn-link"><img src="img/plus.svg" style="height: 34px;width: 34px;float: left;margin-right: 5px;cursor: pointer;"/>+100</button>


                                </li>
                                <li>

                                </li>

                                <li>
                                    <a href="#" id="post-a"><img src="img/msg12.svg" style="height: 34px;width: 34px;float: left;margin-right: 5px"/> Comments </a>
                                </li>
                                <li>
                                    <a href="#" id="post-a"><img src="img/saved.svg" style="height: 34px;width: 34px;float: left;margin-left: 199px"/></a>
                                </li>

                                <li>
                                    <a href="#" id="post-a"><img src="img/1053181.svg" style="height: 34px;width: 34px;float: left;margin-left: 2px"/></a>
                                </li>



                            </ul>
                        </div>


                    </div>

                <?php } else { ?>

                    <div class="col-lg-12" style="border: 1px solid black;margin-top: 15px">
                        <div style="margin: 30px 0px 10px 10px;">
                            <a href="userprofile.php?user_name=<?php echo $posts_owner?>" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none; "><img src="img/user.ico" style="height: 35px;width: 35px;margin-right:10px;"/><?php echo $posts_owner?></a>
                        </div>
                        <div style="margin: 0px 10px 10px 10px;">
                            <h2><b><?php echo "<a href='post.php?post_id=$post_id' style='color: darkblue;text-decoration: none;'>$post_title</a>"?></b></h2>
                        </div>

                        <div class="col-lg-6" style="height: 200px;" >

                            <p style="height: 145px;"><?php
                                if(strlen($post_description) < 300){
                                    echo $post_description;
                                }
                                else {
                                    $temp = str_split($post_description,300);
                                    $post_description = $temp[0];
                                    echo $post_description." "."<a href='post.php?post_id=$post_id'>see more</a>";
                                    //echo $post_id;

                                }
                                ?>

                            </p>
                            <p style="margin-top: 30px; position: inherit;font-size: large;">
                                <b>Tags: </b>
                                <?php
                                $sql1 = "select * from post_tag where post_id='$posts[$i]'";
                                $result1 = $db->query($sql1);
                                $res1 = $result1->fetch_assoc();
                                while($res1){ ?>
                                    <span style="margin-left: 2px;color: darkblue"><b><?php echo "#".$res1['tag_name']." "?></b></span>
                                    <?php $res1 = $result1->fetch_assoc(); }?>
                            </p>
                        </div>

                        <div class="col-lg-6" style="" >
                            <img src="postimg/<?php echo $post_id;?>.jpg" style="height: 200px;width: 342px;margin-right:5px;"/>

                        </div>

                        <?php

                        $sql = "select COUNT(comment_id) as cnt from comment where post_id='$posts[$i]'";
                        $result = $db->query($sql);
                        $res = $result->fetch_assoc();
                        $comment_count = $res['cnt'];


                        $plusvote_count = get_vote($posts[$i],"plus",$db);
                        $minusvote_count = get_vote($posts[$i],"minus",$db);


                        ?>


                        <div class="col-lg-12" style="border-top: 2px solid black; margin: 3px 0px 5px 0px">
                            <ul class="nav navbar-nav" style="float: left">
                                <li>

                                    <?php if(check_vote($post_id,'plus',$_SESSION['user_name'],$db)) {?>
                                        <button type="button"  onclick="plusvote(<?php echo $post_id;?>)" class="btn btn-link" style="text-decoration: none;border: none;"><img src="img/plus.svg" style="height: 34px;width: 34px;float: left;margin-right: 5px;"/><span id="<?php echo $post_id;?>" style="color:darkblue;font-weight: bolder"><?php echo "+".$plusvote_count;?></span></button>
                                    <?php } else { ?>
                                        <button type="button"  onclick="plusvote(<?php echo $post_id;?>)" class="btn btn-link" style="text-decoration: none;border: none;"><img src="img/plus.svg" style="height: 34px;width: 34px;float: left;margin-right: 5px;"/><span id="<?php echo $post_id;?>" style="color:#407fe5;font-weight: normal"><?php echo "+".$plusvote_count;?></span></button>
                                    <?php }?>
                                </li>
                                <li>
                                    <?php $minusid = $post_id + 200000;?>

                                    <?php if(check_vote($post_id,'minus',$_SESSION['user_name'],$db)) {?>
                                        <button type="button"  onclick="minusvote(<?php echo $minusid;?>)" class="btn btn-link" style="text-decoration: none;"><img src="img/minus.svg" style="height: 33px;width: 34px;float: left;margin-right: 5px;cursor: pointer;"/><span id="<?php echo $minusid;?>" style="color:darkblue;font-weight: bolder"><?php echo "-".$minusvote_count;?></span></button>
                                    <?php } else { ?>
                                        <button type="button"  onclick="minusvote(<?php echo $minusid;?>)" class="btn btn-link" style="text-decoration: none;"><img src="img/minus.svg" style="height: 33px;width: 34px;float: left;margin-right: 5px;cursor: pointer;"/><span id="<?php echo $minusid;?>" style="color:#407fe5;font-weight: normal"><?php echo "-".$minusvote_count;?></span></button>
                                    <?php } ?>

                                </li>

                                <li>
                                    <button type="button"   onclick="location.href='post.php?post_id=<?php echo $post_id; ?>';" class="btn btn-link" style="text-decoration: none;"><img src="img/msg12.svg" style="height: 34px;width: 34px;float: left;margin-right: 5px;cursor: pointer;"/><?php echo "Comments(".$comment_count.")";?></button>

                                </li>
                                <li>
                                    <button type="button" class="btn btn-link" style="text-decoration: none;"><img src="img/saved.svg" style="height: 34px;width: 34px;float: left;margin-left: 179px;cursor: pointer;"/></button>

                                </li>

                                <li>
                                    <button type="button" class="btn btn-link" style="text-decoration: none;" ><img src="img/1053181.svg" style="height: 33px;width: 34px;float: left;margin-left: 2px;cursor: pointer;"/></button>

                                </li>



                            </ul>
                        </div>


                    </div>
                <?php } } ?>









        </div>

        <div class="col-lg-2" style="background-color:whitesmoke;box-shadow:20px 20px 50px 10px lightblue inset;height: 555px;position: fixed; margin-left: 1083px">
            <h3>Communities</h3>

            <div class="col-lg-12" style="margin-bottom: 19px">
                <div class="col-lg-6" style="padding-left: 0px">
                    <img id="comimg" alt="" src="communityphoto/1.jpg">
                    <div class="caption">
                        <div>
                            <h4 style="margin-left: 15px;font: 12px"><?php echo "<a href='community_home.php?community_id=1' style='color: darkblue;text-decoration: none;'>Java</a>"?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" style="padding-left: 9px">
                    <img id="comimg" alt="" src="communityphoto/2.jpg">
                    <div class="caption">
                        <div>
                            <h4 style="margin-left: 15px;font: 12px"><?php echo "<a href='community_home.php?community_id=2' style='color: darkblue;text-decoration: none;'>Python</a>"?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" style="padding-left: 0px">
                    <img id="comimg" alt="" src="communityphoto/4.jpg">
                    <div class="caption">
                        <div>
                            <h4 style="margin-left: 15px;font: 12px"><?php echo "<a href='community_home.php?community_id=4' style='color: darkblue;text-decoration: none;'>Ruby</a>"?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" style="padding-left: 9px">
                    <img id="comimg" alt="" src="communityphoto/5.jpg">
                    <div class="caption">
                        <div>
                            <h4 style="margin-left: 15px;font: 12px"><?php echo "<a href='community_home.php?community_id=5' style='color: darkblue;text-decoration: none;'>Raspberry pi</a>"?></h4>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6" style="padding-left: 0px">
                    <img id="comimg" alt="" src="communityphoto/6.jpg">
                    <div class="caption">
                        <div>
                            <h4 style="margin-left: 15px;font: 12px"><?php echo "<a href='community_home.php?community_id=6' style='color: darkblue;text-decoration: none;'>Angular</a>"?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" style="padding-left: 9px">
                    <img id="comimg" alt="" src="communityphoto/7.jpg">
                    <div class="caption">
                        <div>
                            <h4 style="margin-left: 15px;font: 12px"><?php echo "<a href='community_home.php?community_id=7' style='color: darkblue;text-decoration: none;'>Laravel</a>"?></h4>
                        </div>
                    </div>
                </div> -->

            </div>

            <div class="col-lg-12">
                <h3>Tags</h3>
                <button type="button" class="btn btn-primary" style="width: 48%">PHP</button>
                <button type="button" class="btn btn-success" style="width: 48%">JAVA</button>
                <button type="button" class="btn btn-danger" style="width: 48%">SPRING</button>
                <button type="button" class="btn btn-warning" style="width: 48%">PYTHON</button>
                <button type="button" class="btn btn-info" style="width: 48%">RUBY</button>
                <button type="button" class="btn btn-danger" style="width: 48%">C++</button>
            </div>
        </div>
    </div>
</div>

<script>


    var i = 0;
    function myfunction(){
        if (i%2==0) {
            document.querySelector(".nf").style.display = "block";
        }else{
            document.querySelector(".nf").style.display = "none";
        }
        i++;
    }

    // function ok(){
    //     document.querySelector(".nf").style.display = "none";
    // }


    function notf_update(id) {
        var notfid = id;
        $.ajax({
            type: "POST",
            url: "validation.php",
            data: {
                notfid:notfid,
                action:"notf",

            },
            success: function(data) {


            }
        });

    }

    function plusvote(id) {

        var postid = id;
        $.ajax({
            type: "POST",
            url: "validation.php",
            data: {
                postid:postid,
                action:"plusvote",

            },
            dataType: "json",
            success: function(data) {

                if(data[0] == 1) {
                    pluscount = data[1];
                    pluscount = "+"+pluscount;
                    document.getElementById(id).innerText = pluscount;
                    document.getElementById(id).style.fontWeight = 'bolder';
                    document.getElementById(id).style.color = 'darkblue';

                }
                else if(data[0] == 2){
                    pluscount = data[1];
                    pluscount = "+"+pluscount;
                    document.getElementById(id).innerText = pluscount;
                    document.getElementById(id).style.fontWeight = 'normal';
                    document.getElementById(id).style.color = '#407fe5';

                }
                else if(data[0] == 3){
                    var otherid  = parseInt(id) + 200000;
                    otherid = otherid.toString();
                    pluscount = data[1];
                    pluscount = "+"+pluscount;
                    minuscount = data[2];
                    minuscount = "-"+minuscount;
                    document.getElementById(id).style.fontWeight = 'bolder';
                    document.getElementById(id).style.color = 'darkblue';
                    document.getElementById(id).innerText = pluscount;
                    document.getElementById(otherid).style.fontWeight = 'normal';
                    document.getElementById(otherid).style.color = '#407fe5';
                    document.getElementById(otherid).innerText = minuscount;

                }

            }
        });

    }

    function minusvote(id) {


        var postid = parseInt(id);
        var postid = postid - 200000;
        $.ajax({
            type: "POST",
            url: "validation.php",
            data: {
                postid:postid,
                action:"minusvote",

            },
            dataType: "json",
            success: function(data) {

                if(data[0] == 1) {
                    minuscount = data[1];
                    minuscount = "-"+minuscount;
                    document.getElementById(id).innerText = minuscount;
                    document.getElementById(id).style.fontWeight = 'bolder';
                    document.getElementById(id).style.color = 'darkblue';

                }
                else if(data[0] == 2){
                    minuscount = data[1];
                    minuscount = "-"+minuscount;
                    document.getElementById(id).innerText = minuscount;
                    document.getElementById(id).style.fontWeight = 'normal';
                    document.getElementById(id).style.color = '#407fe5';

                }
                else if(data[0] == 3){
                    var otherid  = postid;
                    otherid = otherid.toString();
                    minuscount = data[1];
                    minuscount = "-"+minuscount;
                    pluscount = data[2];
                    pluscount = "+"+pluscount;
                    document.getElementById(id).style.fontWeight = 'bolder';
                    document.getElementById(id).style.color = 'darkblue';
                    document.getElementById(id).innerText = minuscount;
                    document.getElementById(otherid).style.fontWeight = 'normal';
                    document.getElementById(otherid).style.color = '#407fe5';
                    document.getElementById(otherid).innerText = pluscount;

                }

            }
        });


    }



</script>
<script>

</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>