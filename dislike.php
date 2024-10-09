<?php
session_start();
$con=new PDO("mysql:host=localhost;dbname=test",'root','root');
if(isset($_SESSION['id'])){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $likes="SELECT * FROM like_or_dislike WHERE user_id='{$_SESSION['id']}' AND new_id='{$id}'";
        $result=$con->query($likes);
        $news=$result->fetchAll(PDO::FETCH_ASSOC);
        if($result->rowCount()>0){
            if($news[0]['value']==1){
                $sql="UPDATE like_or_dislike SET value=0 WHERE user_id='{$_SESSION['id']}' AND new_id='{$id}'";
            }else{
                $sql="DELETE FROM like_or_dislike WHERE user_id='{$_SESSION['id']} AND new_id='{$id}'";
            }
        }else{
            $sql="INSERT INTO like_or_dislike(user_id,new_id,value) VALUES('{$_SESSION['id']}','{$id}',0)";
            $con->query($sql);
            
        }
        
    }
    $con->query($sql);
    header("Location: login.php");

}
else{
    header("Location: login.php");
}
?>