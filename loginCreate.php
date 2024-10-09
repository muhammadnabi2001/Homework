<?php
session_start();
$con = new PDO("mysql:host=localhost;dbname=test", 'root', 'root');
include "func.php";
if (!isset($_POST['ok']) || empty($_POST['password']) || empty($_POST['email'])) {
    header("Location: login.php");
    echo "Bittasi xato";
} else {
    $email = $_POST['email'];
    $password = passwordHash($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result = $con->query($sql);
    // echo $result->rowCount();
    if ($result->rowCount() > 0) {
        $user = $result->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $user[0]['id'];
        $_SESSION['name'] = $user[0]['name'];
        $_SESSION['role'] = $user[0]['role'];
        echo $_SESSION['role'];
        if ($_SESSION['role'] == 'admin') {
            header("Location: index.php");
        } else {
            header("Location: home.php");
        }
    } else {
        $_SESSION['email'] = "Email yoli parol Notug'ri";
        header("Location: login.php");
    }
}
