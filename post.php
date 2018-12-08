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
  include 'dbconnect.php';
  session_start();
  if($_SESSION['loggedin'] != 1)
      header('Location: index.php');
  $post_id = $_GET['post_id'];

  $sql = "select * from post natural join my_post where post_id='$post_id'";
  $result = $db->query($sql);
  $res = $result->fetch_assoc();
  $post_title = $res['post_title'];
  $post_description = $res['post_description'];
  $posts_owner = $res['user_name'];
  $img = $res['img'];
  $post_id = $res['post_id'];
  $user_name = $_SESSION['user_name'];
  ?>
  <?php
  if(isset($_POST["comment"])){
      $username = $_POST["user_name"];
      $commentdescription = $_POST['commentdes'];
      $datetime = date("Y-m-d H:i:s");
      $sql = "insert into comment(comment_description,comment_time,post_id,user_name) values('$commentdescription','$datetime','$post_id','$username')";
      $db->query($sql);




      $sql = "select * from my_post where post_id='$post_id'";
      $result = $db->query($sql);
      $res = $result->fetch_assoc();
      if($res){
          $notf = "".$user_name." commented your post";
          $post_owner = $res['user_name'];
          if($user_name!= $post_owner){
              $sql = "insert into notification(user_name,notification_details,post_id,is_read) values('$post_owner','$notf','$post_id','0')";
              $db->query($sql);
          }
      }
  }

  ?>



  <?php

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
  <body>
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
          
          <div class="col-lg-8" style="margin-left: 295px">



              <!----------------------------post 1--------------------->


              <div class="col-lg-12" style="border: 1px solid black;margin-top:10px;width:880px ">
                  <div style="margin: 20px 0px 10px 10px;">
                      <a href="userprofile.php?user_name=<?php echo $posts_owner?>" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none; "><img src="img/user.ico" style="height: 35px;width: 35px;margin-right:10px;"/><?php echo $posts_owner?></a>
                  </div>
                  <div style="margin: 0px 10px 10px 10px;">
                      <h2><b><?php echo "<a href='post_home.php' style='color: darkblue;text-decoration: none;'>$post_title</a>"?></b></h2>
                  </div>
                  <?php if($img == 1) {?>
                      <div  style="margin-left: 30%;" >
                          <img src="postimg/<?php echo $post_id;?>.jpg" style="height: 200px;width: 342px;margin-right:5px;margin-bottom: 10px"/>
                      </div>
                  <?php }?>

                  <div  style="height: auto;padding:0px 50px 0px 50px" >

                      <p>
                          <?php echo $post_description?>
                      </p>
                  </div>


                  <?php

                  $sql = "select COUNT(comment_id) as cnt from comment where post_id='$post_id'";
                  $result = $db->query($sql);
                  $res = $result->fetch_assoc();
                  $comment_count = $res['cnt'];


                  $plusvote_count = get_vote($post_id,"plus",$db);
                  $minusvote_count = get_vote($post_id,"minus",$db);


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
                              <button type="button" class="btn btn-link" style="text-decoration: none;"><img src="img/saved.svg" style="height: 34px;width: 34px;float: left;margin-left: 360px;cursor: pointer;"/></button>

                          </li>

                          <li>
                              <button type="button" class="btn btn-link" style="text-decoration: none;" ><img src="img/1053181.svg" style="height: 33px;width: 34px;float: left;margin-left: 2px;cursor: pointer;"/></button>

                          </li>



                      </ul>
                  </div>
              </div>
              <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          </div>
      </div>
  </div>

    <div>
        <form method="post" action="post.php?post_id=<?php echo $post_id;?>">
            <div style="
                        margin-left: 299px;
                        width: 910px;
                        hight: 250px;
                        margin-top: 12px;
                        padding: 5px;">
                <textarea placeholder="Write your Answer" style="margin-top: 2%;
                            margin-left: 0px;
                            border: 2px solid black;
                            border-radius: 5px;
                            resize: none;width: 890px;"
                            name="commentdes" id="myInput" cols="123" rows="3"></textarea>

            </div>
            <input type="hidden" name = "user_name" value= <?php echo $_SESSION['user_name']; ?>>
             <div style="
                        width: 910px;
                        margin-top: 9px;
                        padding: 5px;
                        margin-left: 299px;">
                <button type="submit" name=" comment" class="btn btn-success" style="    width: 13%;
                         margin-left: 780px;">Comment</button>
            </div>
        </form>
    
    
        
        </div>

        <div id="cmnt" class="col-lg-8" style="margin-left: 295px">



      <!----------------------------comment--------------------->

        <?php
        $sql = "select * from comment where post_id='$post_id'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        while($res){ ?>

          <div id="id5" class="col-lg-12" style="border: 2px solid black;
                    border-radius: 5px;
                     margin-top: 10px;
                    width: 890px;">
              <div style="margin: 20px 0px 10px 10px;">
                    <?php $po = $res['user_name'];?>    
                  <a href="userprofile.php?user_name=<?php echo $po;?>" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none; "><img src="img/user.ico" style="height: 35px;width: 35px;margin-right:10px;"/><?php echo $res['user_name'];?></a>
              </div>

              <div  style="height: auto;" >
                  <p><?php echo $res['comment_description'];?></p>
              </div>


              <div  style="border-top: 1px solid black;">
                  <ul class="nav navbar-nav mynav" style="float: left;padding-bottom:5px;">
                      <li>
                          <a href="#" class="active" id="post-a" style="margin-left: 665px"><img src="img/plus.svg" style="height: 34px;width: 34px;float: left;margin-right: 5px"/>+100</a>
                      </li>
                      <li>
                          <a href="#" class="active" id="post-a"><img src="img/minus.svg" style="height: 33px;width: 34px;float: left;margin-right: 5px"/>-25</a>
                      </li>

                  </ul>
              </div>
          </div>
          <?php $res = $result->fetch_assoc(); }?>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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

      function func() {
          var input = document.getElementById("myInput");
          var comment = input.value;
          var user_name = "<?php echo $_SESSION['user_name']; ?>";
          var post_id = "<?php echo $post_id; ?>";


          $.ajax({
              type: "POST",
              url: "validation.php",
              data: {
                  user_name:user_name,
                  comment:comment,
                  post_id:post_id,
                  action:"commentupdate"
              },
              success: function(data) {

                  alert("success");

                  var div = document.createElement('div');

                  div.className = 'row';

                  div.innerHTML = document.getElementById('id5').innerHTML;

                  div = div.cloneNode(true); n


                  document.getElementById('cmnt').appendChild(div);

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

  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src=\"js/bootstrap.min.js\"></script>
  </body>
</html>





    

    
