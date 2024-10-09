<?php
session_start();
$con = new PDO("mysql:host=localhost;dbname=test", 'root', 'root');
include "func.php";
if (isset($_POST['ok']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_c'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_c = $_POST['password_c'];

    // echo $name;
    // echo $email;
    // echo $password;
    // echo $password_c;
    if ($password == $password_c) {
        $password = passwordHash($password);
        $sql = "SELECT * FROM users WHERE email='{$email}'";
        $result = $con->query($sql);
        echo $result->rowCount();

        if ($result->rowCount() > 0) {
            $_SESSION['email'] = "Bu manzil band qilingan";
            header("Location: register.php");
        } else{
            $sql="INSERT INTO users(name,email,password) VALUES('{$name}','{$email}','{$password}')";
            $result=$con->exec($sql);
            if($result){
                $_SESSION['id']=$con->lastInsertId();
                $_SESSION['name']=$name;
                //$_SESSION['']
                header("Location: index.php");
        }
    }
}
}