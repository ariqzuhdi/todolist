<?php

    $conn = mysqli_connect('localhost', 'root', '', 'todolist');

    
    function show($query){
        global $conn;
        $rows = [];
        $result = mysqli_query($conn, $query);

        while ($temp = mysqli_fetch_assoc($result)){
            $rows[] = $temp;
        }
        

        return $rows;
        
    }

    
    function input($data){
        global $conn;
        $title = $data['todo_title'];
        $desc = $data['todo_desc'];

        $query = "INSERT INTO todos (todo_title, todo_desc) VALUES ('$title', '$desc')";

        mysqli_query($conn, $query);

        echo "<script>
        alert('Data success to input!');
        document.location.href = 'index.php';
        </script>
    ";

    }


    function delete($id_todo){
        global $conn;
        mysqli_query($conn, "DELETE FROM todos WHERE id_todo = $id_todo");
        return mysqli_affected_rows($conn);
    }

    function update($dataupdate){
        global $conn;

        $id_todo = $dataupdate['id_todo'];
        $todo_title = $dataupdate['todo_title'];
        $todo_desc = $dataupdate['todo_desc'];

        $query = "UPDATE todos SET
                    todo_title = '$todo_title',
                    todo_desc = '$todo_desc'
                   WHERE id_todo = '$id_todo'";
                    

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


?>