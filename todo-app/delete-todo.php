<?php
    include './config.php';

    $list_id = $_POST['list_id'];
    $todo_name = $_POST['todo_name'];
    $stmt = $db->prepare("DELETE FROM todos WHERE list_id = ? and Binary name = ?");
    $stmt->bindParam(1, $list_id, PDO::PARAM_INT);
    $stmt->bindParam(2, $todo_name, PDO::PARAM_STR);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stmt->execute();
        header('Location: list.php?id=' . $list_id );
        
    }
?>