
<?php
session_start();
$user_name = $_SESSION['user_name'];
?>

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
                        <a href="profile.php" class="active" id="nav-a"><img src="img/user.ico" style="height: 35px;width: 35px;float: left; margin-right: 5px "/><?php echo $user_name;?></a>
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
        
            
        
            <div style="margin:0 auto 0 auto;
                    display: block;
                    width: 80%;
                    hight:40%;">
                <div style="
                    width: 99%;
                    padding: 50px;
                    margin: 4px 4px 4px 4px; ">

                    <div style="border:1px solid;
                        padding: 5px;
                        width:30%;
                        background-color: whitesmoke;
                        color: darkblue;
                        border-radius: 10px;
                        margin-left:10px;
                        float: left;">
                        <div>
                            <h1>Shakim Ahamed</h1>
                        </div>
                        <div style="border-top: 1px solid;">
                            <ul>
                                <li>Font End</li>
                                <li>Mockup</li>
                                <li>Benchmark</li>
                            </ul> 
                        </div>                            
                    </div>

                    <div style="border:1px solid;
                    padding: 5px;
                    width:30%;
                    margin-left:40px;
                    background-color: whitesmoke;
                        color: darkblue;
                        border-radius: 10px;
                    float: left;">
                        <h1>Sakib Shahriar</h1>
                        <div style="border-top: 1px solid;">
                            <ul>
                                <li>Development</li>
                                <li>Mockup</li>
                                <li>Benchmark</li>
                            </ul>
                        </div>
                            
                    </div>

                    <div style="border:1px solid;
                    padding: 5px;
                    width:30%;
                    background-color: whitesmoke;
                        color: darkblue;
                        border-radius: 10px;
                    margin-left:40px;
                    float:left;">
                        <h1>Morshed Khan</h1>
                        <div style="border-top: 1px solid;">
                            <ul>
                                <li>Font End</li>
                                <li>Mockup</li>
                                <li>Benchmark</li>
                            </ul>
                        </div>
                            
                    </div>
                    <div style="clear:both"></div>
                </div>

                <div style="
                    width: 99%;
                    padding: 50px;
                    margin: 4px 4px 4px 4px; ">

                    <div style="border:1px solid;
                    padding: 5px;
                    width:30%;
                    background-color: whitesmoke;
                        color: darkblue;
                        border-radius: 10px;
                    margin-left:10px;
                    float: left;">
                        <h1>Miftahul Jannat</h1>
                        <div style="border-top: 1px solid;">
                            <ul>
                                <li>Report</li>
                                <li>Diagram</li>
                                <li>Cash flow and SWOT analysis</li>
                            </ul>
                        </div>
                            
                    </div>

                    <div style="border:1px solid;
                    padding: 5px;
                    width:30%;
                    background-color: whitesmoke;
                        color: darkblue;
                        border-radius: 10px;
                    margin-left:40px;
                    float: left;">
                        <h1>Fariha Hossain</h1>
                        <div style="border-top: 1px solid;">
                            <ul>
                                <li>Database Design</li>
                                <li>Diagram</li>
                                <li>Presentation</li>
                            </ul>
                        </div>
                            
                    </div>

                    <!-- <div style="border:1px solid;
                    padding: 5px;
                    width:30%;
                    margin-left:651px;
                    ">
                        <h1>Shakim Ahamed</h1>
                            <ul>
                                <li>Font End</li>
                                <li>Development</li>
                                <li>Mockup</li>
                            </ul>
                    </div> -->
                    <div style="clear:both"></div>
                </div>
            </div>

       
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
