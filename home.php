<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

require 'functions.php';

$keyword = 'SELECT * FROM todos';
$result = show($keyword);

if (isset($_POST["submit"])) {
    input($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>To Do List</title>
</head>

<body>
    <div class="m-3">
        <a class="btn btn-danger " href="logout.php">Logout</a>
    </div>
    <h1 class="inijudul text-center">BASIC TO DO LIST</h1>
    <div class="d-flex inicontainer">
        <div class="d-inline iniinput">
            <form action="" method="post">
                <label for="title">
                    Title : <input type="text" name="todo_title" id="title" class="form-control" required placeholder="Input title">
                </label>
                <br><br>
                <label for="desc">
                    Description : <textarea type="text" name="todo_desc" id="desc" class="form-control" cols="50" required placeholder="Input description"></textarea>
                </label>
                <br><br>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="inilist d-inline text-center">

            <?php foreach ($result as $value) : ?>
                <div class="inilist1">
                    <h2><?= $value['todo_title'] ?></h2>
                    <p><?= $value['todo_desc'] ?></p>
                    <p><?= $value['date'] ?></p>
                    <a href="update.php?id_todo=<?= $value['id_todo'] ?>"><button class="btn btn-success">Edit</button></a> |
                    <a href="delete.php?id_todo=<?= $value['id_todo'] ?>"><button class="btn btn-danger">Delete</button></a>
                    <hr>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</body>

</html>