<?php
/**
 * Created by PhpStorm.
 * User: Sakib
 * Date: 9/2/2018
 * Time: 12:01 AM
 */

include 'dbconnect.php';

$action = $_POST["action"];

if($action == "unvalidate"){
    $user_name = $_POST["username"];
    $sql = "select * from user where user_name='$user_name'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    if($res){
        echo 0;
    }
    else{
        echo 1;
    }
}

if($action == "emailvalidate"){
    $email = $_POST["email"];
    $sql = "select * from user where email='$email'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    if($res){
        echo "0";
    }
    else{
        echo "1";
    }
}

if($action == "lgvalidate"){
    $user_name = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from user where user_name='$user_name' and password='$password'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    if($res){
        echo "1";
    }
    else{
        echo "0";
    }
}

if($action == "commentupdate"){
    $user_name = $_POST["username"];
    $comment_description = $_POST['comment'];
    $post_id = $_POST['post_id'];
    $datetime = date("Y-m-d H:i:s");
    $sql = "insert into comment(comment_description,comment_time,post_id,user_name) values('$comment_description','$datetime','$post_id','$user_name')";
    $db->query($sql);
}



if($action == "communityfollow"){
    $user_name = $_POST["user_name"];
    $community_id = $_POST["id"];
    $sql = "select * from community_follower where user_name='$user_name' and community_id='$community_id'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    if($res){
        $sql = "DELETE FROM community_follower WHERE user_name='$user_name' and community_id='$community_id'";
        $db->query($sql);
        echo 1;
    }
    else{
        $sql = "insert into community_follower(community_id,user_name) values('$community_id','$user_name')";
        $db->query($sql);
        echo 0;
    }
}





if($action == "plusvote"){
    session_start();
    $user_name = $_SESSION['user_name'];
    $post_id = $_POST["postid"];
    $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='plus' and user_name = '$user_name'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    $plusvote_count = $res['cnt'];

    $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='minus' and user_name = '$user_name'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    $minusvote_count = $res['cnt'];

    if($plusvote_count == 0 && $minusvote_count == 0){
        $sql = "insert into vote(post_id,user_name,vote_direction) values('$post_id','$user_name','plus')";
        $db->query($sql);

        $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='plus'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        $plusvote_count = $res['cnt'];

        $data = array();
        $data[0] = 1;
        $data[1] = $plusvote_count;
        $data = json_encode($data);




        $sql = "select * from my_post where post_id='$post_id'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        if($res){
            $notf = "".$user_name." gave plus vote to your post";
            $post_owner = $res['user_name'];
            if($user_name!= $post_owner){
                $sql = "insert into notification(user_name,notification_details,post_id,is_read) values('$post_owner','$notf','$post_id','0')";
                $db->query($sql);
            }
        }
        else{
            $sql = "select * from community_post where post_id='$post_id'";
            $result = $db->query($sql);
            $res = $result->fetch_assoc();

            $community_id = $res['community_id'];
            $s = "select * from community where community_id='$community_id'";
            $r = $db->query($s);
            $rs = $r->fetch_assoc();
            $community_title= $rs['community_title'];

            if($res){
                $notf = "".$user_name." gave plus vote to your post in ".$community_title;
                $post_owner = $res['user_name'];
                if($user_name!= $post_owner){
                    $sql = "insert into notification(user_name,notification_details,post_id,is_read) values('$post_owner','$notf','$post_id','0')";
                    $db->query($sql);
                }
            }
        }





        echo $data;
    }
    else if($plusvote_count == 1 && $minusvote_count == 0){
        $sql = "DELETE FROM vote  where post_id='$post_id' and vote_direction='plus' and user_name = '$user_name'";
        $db->query($sql);


        $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='plus'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        $plusvote_count = $res['cnt'];

        $data = array();
        $data[0] = 2;
        $data[1] = $plusvote_count;
        $data = json_encode($data);
        echo $data;
    }
    else if($plusvote_count == 0 && $minusvote_count == 1){
        $sql = "DELETE FROM vote where post_id='$post_id' and vote_direction='minus' and user_name = '$user_name'";
        $db->query($sql);

        $sql = "insert into vote(post_id,user_name,vote_direction) values('$post_id','$user_name','plus')";
        $db->query($sql);

        $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='plus'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        $plusvote_count = $res['cnt'];

        $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='minus'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        $minusvote_count = $res['cnt'];

        $data = array();
        $data[0] = 3;
        $data[1] = $plusvote_count;
        $data[2] = $minusvote_count;
        $data = json_encode($data);




        $sql = "select * from my_post where post_id='$post_id'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        if($res){
            $notf = "".$user_name." gave plus vote to your post";
            $post_owner = $res['user_name'];
            if($user_name!= $post_owner){
                $sql = "insert into notification(user_name,notification_details,post_id,is_read) values('$post_owner','$notf','$post_id','0')";
                $db->query($sql);
            }
        }
        else{
            $sql = "select * from community_post where post_id='$post_id'";
            $result = $db->query($sql);
            $res = $result->fetch_assoc();

            $community_id = $res['community_id'];
            $s = "select * from community where community_id='$community_id'";
            $r = $db->query($s);
            $rs = $r->fetch_assoc();
            $community_title= $rs['community_title'];

            if($res){
                $notf = "".$user_name." gave plus vote to your post in ".$community_title;
                $post_owner = $res['user_name'];
                if($user_name!= $post_owner){
                    $sql = "insert into notification(user_name,notification_details,post_id,is_read) values('$post_owner','$notf','$post_id','0')";
                    $db->query($sql);
                }
            }
        }








        echo $data;
    }



}



if($action == "minusvote"){
    session_start();
    $user_name = $_SESSION['user_name'];
    $post_id = $_POST["postid"];
    $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='plus' and user_name = '$user_name'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    $plusvote_count = $res['cnt'];

    $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='minus' and user_name = '$user_name'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    $minusvote_count = $res['cnt'];



    if($plusvote_count == 0 && $minusvote_count == 0){
        $sql = "insert into vote(post_id,user_name,vote_direction) values('$post_id','$user_name','minus')";
        $db->query($sql);

        $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='minus'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        $minusvote_count = $res['cnt'];

        $data = array();
        $data[0] = 1;
        $data[1] = $minusvote_count;
        $data = json_encode($data);





        $sql = "select * from my_post where post_id='$post_id'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        if($res){
            $notf = "".$user_name." gave minus vote to your post";
            $post_owner = $res['user_name'];
            if($user_name!= $post_owner){
                $sql = "insert into notification(user_name,notification_details,post_id,is_read) values('$post_owner','$notf','$post_id','0')";
                $db->query($sql);
            }
        }
        else{
            $sql = "select * from community_post where post_id='$post_id'";
            $result = $db->query($sql);
            $res = $result->fetch_assoc();

            $community_id = $res['community_id'];
            $s = "select * from community where community_id='$community_id'";
            $r = $db->query($s);
            $rs = $r->fetch_assoc();
            $community_title= $rs['community_title'];

            if($res){
                $notf = "".$user_name." gave minus vote to your post in ".$community_title;
                $post_owner = $res['user_name'];
                if($user_name!= $post_owner){
                    $sql = "insert into notification(user_name,notification_details,post_id,is_read) values('$post_owner','$notf','$post_id','0')";
                    $db->query($sql);
                }
            }
        }








        echo $data;
    }
    else if($plusvote_count == 0 && $minusvote_count == 1){
        $sql = "DELETE FROM vote  where post_id='$post_id' and vote_direction='minus' and user_name = '$user_name'";
        $db->query($sql);


        $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='minus'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        $minusvote_count = $res['cnt'];

        $data = array();
        $data[0] = 2;
        $data[1] = $minusvote_count;
        $data = json_encode($data);

        echo $data;
    }
    else if($plusvote_count == 1 && $minusvote_count == 0){
        $sql = "DELETE FROM vote where post_id='$post_id' and vote_direction='plus' and user_name = '$user_name'";
        $db->query($sql);

        $sql = "insert into vote(post_id,user_name,vote_direction) values('$post_id','$user_name','minus')";
        $db->query($sql);

        $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='plus'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        $plusvote_count = $res['cnt'];

        $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='minus'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        $minusvote_count = $res['cnt'];

        $data = array();
        $data[0] = 3;
        $data[1] = $minusvote_count;
        $data[2] = $plusvote_count;
        $data = json_encode($data);





        $sql = "select * from my_post where post_id='$post_id'";
        $result = $db->query($sql);
        $res = $result->fetch_assoc();
        if($res){
            $notf = "".$user_name." gave minus vote to your post";
            $post_owner = $res['user_name'];
            if($user_name!= $post_owner){
                $sql = "insert into notification(user_name,notification_details,post_id,is_read) values('$post_owner','$notf','$post_id','0')";
                $db->query($sql);
            }
        }
        else{
            $sql = "select * from community_post where post_id='$post_id'";
            $result = $db->query($sql);
            $res = $result->fetch_assoc();

            $community_id = $res['community_id'];
            $s = "select * from community where community_id='$community_id'";
            $r = $db->query($s);
            $rs = $r->fetch_assoc();
            $community_title= $rs['community_title'];

            if($res){
                $notf = "".$user_name." gave minus vote to your post in ".$community_title;
                $post_owner = $res['user_name'];
                if($user_name!= $post_owner){
                    $sql = "insert into notification(user_name,notification_details,post_id,is_read) values('$post_owner','$notf','$post_id','0')";
                    $db->query($sql);
                }
            }
        }





        echo $data;
    }


}



if($action == "follow"){
    session_start();
    $user_name = $_SESSION['user_name'];
    $following_user_name = $_POST["user_name"];
    $sql = "select * from following where following_user_name='$following_user_name' and user_name='$user_name'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    if($res){
        $sql = "DELETE FROM following where following_user_name='$following_user_name' and user_name='$user_name'";
        $db->query($sql);
        echo 1;
    }
    else{
        $sql = "insert into following(following_user_name,user_name) values('$following_user_name','$user_name')";
        $db->query($sql);
        echo 0;
    }
}

if($action == "notf"){
    session_start();
    $notfid = $_POST['notfid'];
    $sql = "UPDATE notification SET is_read='1' WHERE notification_id='$notfid'";
    $db->query($sql);
}

?>






























