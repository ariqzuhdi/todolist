<?php 

require 'functions.php';

$id_todo = $_GET['id_todo'];

if (delete($id_todo) > 0) {
    echo "<script>
        alert('Data deleted!');
        document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "<script>
        alert('Data fail to deleted!');
        document.location.href = 'index.php';
        </script>
    ";
}

?>