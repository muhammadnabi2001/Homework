<?php
if (isset($_POST['ok'])) {
    try {
        $name = htmlspecialchars($_POST['name']);
        $con = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
        $sql = "INSERT INTO category (name) VALUES ('{$name}')";
        $stmt = $con->exec($sql);
        header('Location: index.php');
    } catch (PDOException $th) {
        echo "Xatolik: " . $th->getMessage();
    }
}
?>