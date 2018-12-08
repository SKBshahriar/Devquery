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

<div class="container" style="width: 100%;height: 624px; padding-top: 100px;padding-left: 350px;background-image: url(img/2.1_in_frame.png)">
    <h2>Signup Form</h2>
    <form class="form-horizontal" onsubmit="return formvalidate()"  method="post" action="signupvalidate.php">
        <div class="form-group">
            <label class="control-label col-sm-2" for="username">User Name:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="username" placeholder="Enter User Name" name="username" required>
            </div>
        </div>

        <p id="uv" style="margin-left: 17.5%;display: none">user name not available</p>

        <div class="form-group">
            <label class="control-label col-sm-2" for="fisrtname">First Name:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lastname">Last Name:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-5">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
        </div>
        <p id="ev" style="margin-left: 17.5%;display: none">email already exist</p>

        <div class="form-group">
            <label class="control-label col-sm-2" for="profile">Profile Tag:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="profiletag" placeholder="Enter profile tag" name="profiletag" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <p style="display: none;color: red;" id="intchk">Select at least 1</p>
                <div class="checkbox">
                    <?php
                    include 'dbconnect.php';
                    $sql = "select * from tags";
                    $result = $db->query($sql);
                    $res = $result->fetch_assoc();
                    $cnt = 1;
                    while($res){
                        $value = $res['tag_name'];
                        echo "<label><input type='checkbox' name='tags[]' value=$value>$value</label>";
                        echo "   ";
                        if($cnt % 5 ==0) echo "<br>";
                        $res=$result->fetch_assoc();
                        $cnt++;
                    }
                    $db->close();
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Sign Up</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        var flg = 0;
        $("#username").keyup(function(){
            var username= $("#username").val();

            if(username == "") $("#uv").css("display", "none")
            else{

                $.ajax({
                    type: "POST",
                    url: "validation.php",
                    data: {
                        username:username,
                        action:"unvalidate"
                    },
                    success: function(data) {
                        if(data == 1) {
                            $("#uv").css("display", "block");
                            $("#uv").html("user name available");
                            $("#uv").css("color", "green");
                            document.getElementById("sbutton").disabled = false;

                        }
                        else{
                            $("#uv").css("display", "block");
                            $("#uv").html("user name not available");
                            $("#uv").css("color", "red");
                            document.getElementById("sbutton").disabled = true;

                        }
                    }
                });
            }

        });




    });

    var flag = 1;
    function callback(response) {
        flag = response;
    }

    function formvalidate() {

        var cnt  = 0;

        var tags = document.getElementsByName("tags[]")
        for(var i = 0; i < tags.length; i++){
            if(tags[i].checked) cnt++;
        }

        if(cnt < 1){
            document.getElementById('intchk').style.display='block';

            return false;
        }

        var email = $("#email").val();


          $.ajax({
            async: false,
            type: "POST",
            url: "validation.php",
            data: {
                email:email,
                action:"emailvalidate"
            },
            success: function(data) {

                if(data == "0") {
                    $("#ev").css("display", "block");
                    $("#ev").css("color", "green");
                    callback(0);


                }

            }
        });
        if(flag == 1) return true;
        else return false;

    }
</script>
</body>
</html>


