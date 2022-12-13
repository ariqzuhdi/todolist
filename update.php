<?php
    require 'functions.php';

    $id_todo = $_GET['id_todo'];

    $value = show("SELECT * FROM todos where id_todo = $id_todo")[0];

    if(isset($_POST['update']) ){
        if(update($_POST) > 0){
            echo "<script>
        alert('Data success to change!');
        document.location.href = 'index.php';
        </script>";
        } else {
            echo "<script>
        alert('Data success to change!');
        document.location.href = 'index.php';
        </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Update</title>
</head>
<body>
    <div  class="d-inline iniinput">

        <form action="" method="post">
            <input type="hidden" name="id_todo" value="<?=$value['id_todo']?>">
            <label for="title">
                Title : <input type="text" name="todo_title" id="title" class="form-control" required placeholder="Input title" value="<?=$value['todo_title']?>" required>
            </label>
            <br><br>
        <label for="desc">
            Description : <textarea type="text" name="todo_desc" id="desc" class="form-control" cols="50" required placeholder="Input description"><?=$value['todo_desc']?></textarea>
        </label>
        <br><br>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>

