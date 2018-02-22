<?php 
    include './config.php';
    $stmt1 = $db->query("SELECT name FROM lists WHERE id = " . $_GET['id']);
    $list_name = $stmt1->fetch();
    $stmt2 = $db->query("SELECT name FROM todos WHERE list_id = " . $_GET['id']);
    try {
        echo '<h1>' . $list_name['name'] . '</h1>';
        foreach($stmt2->fetchAll() as $row) {
            echo '<h2>' . $row['name'] . '</h2>';
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
    <form method="POST" action="">
        <label for="todo_name">Enter a new todo item:</label>
        <input type="text" name="todo_name" id="todo_name"/>
        <input type="submit" name="submit" value="Add"/>
    </form>

    <a href="index.php">Home</a>

</body>
<?php
    $list_id = $_GET['id'];
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
</html>
