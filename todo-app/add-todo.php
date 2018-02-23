<?php
    include './config.php';

    $list_id = $_POST['list_id'];
    $todo_name = $_POST['todo_name'];
    $sql = $db->prepare("INSERT INTO todos (list_id, name) VALUES (:list_id, :todo_name)");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($todo_name)){
            echo 'Todo must not be blank.';
        } else {
            $sql->execute(array(
                "list_id" => $list_id,
                "todo_name" => $todo_name
            ));
            header('Location: list.php?id=' . $list_id );
        }
    }
?>