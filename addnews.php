<?php
try {
    $con = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
    $sql = "SELECT * FROM category";
    $statement = $con->query($sql);
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $th) {
    echo "Xatolik: " . $th->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-12">

                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping" style="font-size: 30px; color:blue;">News title</span>
                        <input style="width: 400px; height: 30px; border-radius: 10px;" type="text" class="form-control" placeholder="Title for new" aria-label="Username" aria-describedby="addon-wrapping" name="title">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" style="font-size: 30px; color:blue;">Text</span>
                        <input style="width: 400px; height: 30px; border-radius: 10px;" type="text" class="form-control" placeholder="Title for new" aria-label="Username" aria-describedby="addon-wrapping" name="description">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping" style="font-size: 30px; color:blue;">Image</span>
                        <input style="width: 400px; height: 30px; border-radius: 10px;" type="file" class="form-control" placeholder="Title for new" aria-label="Username" aria-describedby="addon-wrapping" name="image">
                    </div>
                </div>
                <div class="col-12">
                    <label for="category" style="font-size: 30px; color:blue;">Categories</label>
                    <select class="form-select" aria-label="Default select example" name="category" style="width: 400px; height: 30px; border-radius: 10px;">
                        <option selected></option>
                        <?php
                        foreach ($data as $d) { ?>
                            <option><?= $d['name'] ?></option>

                        <?php }
                        ?>
                    </select>
                </div>
                <input type="submit" value="Add" name="ok">
            </form>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['ok'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $data = explode('.', $_FILES['image']['name']);
    $filePath = date('Y-m-d_H-i-s') . '.' . $data[1];
    $category = $_POST['category'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $filePath);

    try {
        $con = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
        $sql = "INSERT INTO news(title,text,category,image) VALUES('{$title}','{$description}','{$category}','image/{$filePath}')";
        $statement = $con->exec($sql);
    } catch (PDOException $th) {
        echo "Xatolik: " . $th->getMessage();
    }

    // echo $title;
    // echo $description;
    // echo $filePath;
    // echo $category;
}
?>