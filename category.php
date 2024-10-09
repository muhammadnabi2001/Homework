<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
</head>

<body>
    <div class="container">
        <div class="col-12 ">
            <div class="row">
                <form method="POST" action="createCategory.php">
                    <label for="exampleInputEmail1" class="form-label" name="name">Name</label>
                    <input type="text" class="form-control" name="name">
                    <input type="submit" class="btn btn-primary" name="ok" value="Submit">
                </form>
            </div>
        </div>

    </div>
</body>

</html>