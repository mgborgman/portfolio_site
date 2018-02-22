<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <h1>CREATE A NEW LIST PAGE</h1>
    <!-- Create form to create new list -->
    <form method="POST" action="">
        <label for="list_name">Enter the name for your new list: </label>
        <input type="text" name="list_name" id="list_name" />
        <input type="submit" name="submit" value="Create"/>
    </form>
</body>
</html>

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