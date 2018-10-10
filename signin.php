<!DOCTYPE html>
<html lang="en">
<head>
  <title>DevQuery|Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
</head>
<body>

 
<div class="container" style="width: 100%;height: 635px; padding-top: 100px;padding-left: 350px;margin-top:8%;background-image: url(img/2.1_in_frame.png)">
  
  <div class="col-md-8" style="margin-left: 15%;">
      <h2 style="margin-left: 30%;margin-bottom: 5%;">Log In</h2>
      <form class="form-horizontal" onsubmit="return formvalidate()"  method="post" action="login.php">
        <div class="form-group">
          <label class="control-label col-sm-2" for="username">User Name:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="username" placeholder="Enter User Name" name="username" required>
          </div>
        </div>
          
          
          
          <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Password:</label>
          <div class="col-sm-5">          
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
          </div>
          
        </div>
        <p style="margin-left: 17.5%;color: red;display: none" id="lv">user name or password is not correct.</p>


        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Sign In</button>
          </div>
        </div>
      </form>


  </div>

</div>

<script>


    function formvalidate(){


        var a = 1;
        var username= $("#username").val();
        var password = $("#pwd").val();

        $.ajax({
            type: "POST",
            url: "validation.php",
            data: {
                username:username,
                password:password,
                action:"lgvalidate"
            },
            success: function(data) {

                if(data == "0") {
                    $("#lv").css("display", "block");

                }

            }
        });

        if(flag == 1) return true;
        else return false;
    }

</script>

</body>
</html>
