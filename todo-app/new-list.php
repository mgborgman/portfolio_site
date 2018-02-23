<?php
    include './config.php';
// write SQL statement to insert newly created lists
    $list_name = $_POST['list_name'];
    $sql = $db->prepare("INSERT INTO lists (name) VALUES (:list_name)");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($list_name)){
            echo "List name must not be blank.";
        } else {
            $sql->execute(array("list_name" => $list_name));
            header('Location: index.php');
            exit;
        } 
    }
?>