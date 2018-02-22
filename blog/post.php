<?php
    include 'config.php';

    $stmt = $db->prepare('SELECT id, title, author, pub_date, content FROM
                          post WHERE id = :id');
    $stmt->execute(array(':id' => $_GET['id']));
    $row = $stmt->fetch();

    if ($row['id'] == ''){
        header('Location: index.php');
        exit;
    }

    echo '<div>';
        echo '<h1>' . $row['title'] . '</h1>';
        echo '<h2>written by: ' . $row['author'] . '</h2>';
        echo '<p>published on: ' . $row['pub_date'] . '</p>';
        echo '<p>' . $row['content'] . '</p>';
    echo '</div>';
?>

<a href="index.php">home</a>