<?php 
    include './config.php';
    $stmt1 = $db->query("SELECT name FROM lists WHERE id = " . $_GET['id']);
    $list_name = $stmt1->fetch();
    $stmt2 = $db->query("SELECT name FROM todos WHERE list_id = " . $_GET['id']);
    try {
        echo '<h1>' . $list_name['name'] . '</h1>';
    ?>
    <form method="POST" action="<?php echo 'edit-list.php?id=' . $_GET['id']?>">
        <input type="hidden" name="list_id" value="<?php echo $_GET['id']?>"/>
        <input type="hidden" name="list_name" value="<?php echo $list_name['name']?>"/>
        <input type="submit" name="edit" value="Edit List"/>
    </form>
    <!-- <a href="edit-list.php?id=<?php echo $_GET['id'] ?>">Edit List</a> -->
<?php
        foreach($stmt2->fetchAll() as $row) {
            echo '<h2>' . $row['name'] . '</h2>';
?>
            <form method="POST" action="delete-todo.php">
                <input type="hidden" name="list_id" value="<?php echo $_GET['id']?>"/>
                <input type="hidden" name="todo_name" value="<?php echo $row['name']?>">
                <input type="submit" name="delete" value="Delete"/>
            </form>
<?php            
        }
    } catch(PDOExecption $e) {
        echo $e->getMessage();
    }
?>

<html>

<body><head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $list_name['name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <form method="POST" action="add-todo.php">
        <label for="todo_name">Enter a new todo item:</label>
        <input type="text" name="todo_name" id="todo_name"/>
        <input type="hidden" name="list_id" value=<?php echo $_GET['id'] ?>>
        <input type="submit" name="submit" value="Add"/>
    </form>

    <a href="index.php">Home</a>

</body>
</html>
