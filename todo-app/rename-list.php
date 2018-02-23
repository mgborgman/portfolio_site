<?php
    include './config.php';

    $list_id = $_POST['list_id'];
    // $current_list_name = $_POST['current_list_name'];
    $new_list_name = $_POST['new_list_name'];

    $stmt = $db->prepare("UPDATE lists SET name = ? WHERE id = ?");
    $stmt->bindParam(1, $new_list_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $list_id, PDO::PARAM_INT);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stmt->execute();
        header('Location: list.php?id=' . $list_id);
    }
?>