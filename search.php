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
  $user_name = $_SESSION['user_name'];
  $key = $_GET['key'];

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

          <ul class="nav navbar-nav">
              <li>
                  <a href="profile.php" class="active" id="nav-a"><img src="img/user.ico" style="height: 35px;width: 35px;float: left; margin-right: 5px "/><?php echo $_SESSION['user_name'];?></a>
              </li>

              <li>
                  <a href="#" id="nav-a"><img src="img/notify.png" style="height: 34px;width: 34px;float: left;margin-right: 5px"/> [10] </a>
              </li>

              <li>
                  <a href="#" id="nav-a"><img src="img/chat.png" style="height: 34px;width: 34px;float: left;margin-right: 5px"/>[2] </a>
              </li>

              <li>
                  <a href="#" style="display: inline-block" id="nav-a"><img src="img/menu.png" style="height: 32px;width: 30px;float: left;margin-right: 5px"/> </a>
              </li>
          </ul>
      </div>
  </nav>



     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2" style="background-color:whitesmoke;height: 563px;position: fixed;margin-left: 10px;box-shadow:20px 20px 50px 10px lightblue inset ">
          
              <div style="margin-top: 28px ">
                  <a href="ask.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/post.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Posts</a>
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
              <div style="margin-top: 185px ">
                  <a href="about.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/about.svg" style="height: 35px;width: 35px;margin-right:10px;"/>About</a>
              </div>
              <div style="margin-top: 18px ">
                  <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/contact.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Contact</a>
              </div>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <div style="  
                            margin-left: 299px;
                            width: 910px;
                            hight: 500px;
                            margin-top: 12px;
                            padding: 5px;">
                
                <div style="
                            padding: 10px;">
                    <h3 style="border: 1px solid;
                            margin-top: 7px;
                            padding: 2px;
                            text-align: center;
                            color: darkblue;
                            background-color:lightgray;
                            width: 95%;
                            margin-left: 2px;">Developers</h3>
                    <div style= "
                            margin-left: 2px;
                            width: 98%;
                            margin-top: 12px;
                            hight: 21%;
                            padding: 10px;">




                        <?php
                        $sql = "select * from user where first_name='$key' or last_name = '$key'";
                        $result = $db->query($sql);
                        $res = $result->fetch_assoc();
                        while ($res){
                            $un = $res['user_name'];
                        ?>

                        <div style="border: 1px solid;
                            width: 31.5%;
                            hight: 450px;
                            margin-top: 0px;
                            margin-right: 9px;
                            padding: 5px;
                            float: left;">

                            
                            <img style="width:80px;margin-left:80px;" src="img/user.ico" alt="">
                            <h3 style="margin-left: 0px;text-align: center;"><a href="userprofile.php?user_name=<?php echo $un;?>" style='text-decoration: none;'><?php echo $res['user_name'];?></a></h3>
                            <h3 style="text-align: center;"><?php echo $res['profile_tag'];?></h3>

                            <?php
                            $s = "select * from following where following_user_name='$un' and user_name='$user_name'";
                            $rst = $db->query($s);
                            $rs = $rst->fetch_assoc();
                            if($rs){
                            ?>
                            <button  onclick="follow(this)" type="submit" name=" comment" class="btn btn-success" style=" width: 100%;
                            margin-left: 0px;">Following</button>
                            <?php } else { ?>
                            <button  onclick="follow(this)" type="submit" name=" comment" class="btn btn-success" style=" width: 100%;
                         margin-left: 0px;">Follow</button>
                            <?php } ?>
                        </div>
                        <?php $res = $result->fetch_assoc(); } ?>

                        <div style="clear: both"></div>
                    </div>

                </div>

                <div style="
                            padding: 10px;">
                    <h3 style="border: 1px solid;
                            margin-top: 7px;
                            padding: 2px;
                            text-align: center;
                            width: 95%;
                            color: darkblue;
                            background-color:lightgray;
                            margin-left: 2px;">Community</h3>
                    <div style= "
                            margin-left: 2px;
                            width: 98%;
                            margin-top: 12px;
                            /*hight: 21%;*/
                            padding: 10px;">
                        <?php
                        $sql = "select * from community where community_title='$key'";
                        $result = $db->query($sql);
                        $res = $result->fetch_assoc();
                        while ($res){
                        $title = $res['community_title'];
                        $community_id = $res['community_id'];
                        ?>
                        <div style="border: 1px solid;
                            width: 31.5%;

                            margin-top: 0px;
                            padding: 5px;
                            float: left;">
                            
                            <img style="width:80px;margin-left:87px;" src="communityphoto/<?php echo $community_id;?>.jpg" alt="">
                            <h3 style="margin-left: 0px;text-align: center;"><a href="community_home.php?community_id=<?php echo $community_id;?>" style='text-decoration: none;'><?php echo $title;?></a></h3>
                            <h3 style="text-align: center;">This is <?php echo $title;?> community</h3>



                            <?php
                            $s = "select * from community_follower where community_id='$community_id' and user_name='$user_name'";
                            $rst = $db->query($s);
                            $rs = $rst->fetch_assoc();
                            if($rs){
                            ?>
                            <button id="<?php echo $community_id;?>" onclick="community_follow(<?php echo $community_id;?>)" type="submit" name=" comment" class="btn btn-success" style=" width: 100%;
                            margin-left: 0px;">Following</button>
                            <?php } else { ?>
                            <button id="<?php echo $community_id;?>" onclick="community_follow(<?php echo $community_id;?>)" type="submit" name=" comment" class="btn btn-success" style=" width: 100%;
                         margin-left: 0px;">Follow</button>
                            <?php } ?>
                        </div>
                        <?php $res = $result->fetch_assoc(); } ?>
                        <div style="clear: both"></div>
                    </div>

                </div>

                <div>

                </div>

            </div>

        </div>
    </div>

  <script>
      function follow(btn){
          var user_name = btn.parentElement.childNodes[3].innerText;

          $.ajax({
              type: "POST",
              url: "validation.php",
              data: {
                  user_name:user_name,
                  action:"follow"
              },
              success: function(data) {

                  if(data == 1) {
                      btn.innerText = "Follow";
                      btn.style.color = "white"
                  }
                  else{
                      btn.innerText = "following";
                      btn.style.color = "white"

                  }

              }
          });
      }


      function community_follow(id) {
          var btn = document.getElementById(id);
          var user_name = "<?php echo $_SESSION['user_name'] ?>";


          $.ajax({
              type: "POST",
              url: "validation.php",
              data: {
                  id:id,
                  user_name:user_name,
                  action:"communityfollow"
              },
              success: function(data) {

                  if(data == 1) {
                      btn.innerText = "Follow";

                  }
                  else{
                      btn.innerText = "Following";

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





    

    
