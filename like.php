<?php
session_start();
$con=new PDO("mysql:host=localhost;dbname=test",'root','root');
if(isset($_SESSION['id'])){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $likes="SELECT * FROM like_or_dislike WHERE user_id='{$_SESSION['id']}' AND new_id='{$id}'";
        $result=$con->query($likes);
        if($result->rowCount()>0){
            $sql="DELETE FROM like_or_dislike WHERE user_id='{$_SESSION['id']}' AND new_id='{$id}' AND value=1";
            $con->query($sql);
        }else{
            $sql="INSERT INTO like_or_dislike(user_id,new_id) VALUES('{$_SESSION['id']}','{$id}')";
            $con->query($sql);
            
        }
        header("Location: login.php");

    }

}
else{
    header("Location: login.php");
}
?>