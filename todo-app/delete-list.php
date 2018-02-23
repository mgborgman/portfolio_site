<?php
    include './config.php';

    $list_id = $_POST['list_id'];
    $list_name = $_POST['list_name'];
    $stmt = $db->prepare("DELETE FROM lists WHERE id = ? and Binary name = ?");
    $stmt->bindParam(1, $list_id, PDO::PARAM_INT);
    $stmt->bindParam(2, $list_name, PDO::PARAM_STR);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stmt->execute();
        // header('Location: index.php');
    }

    
?>