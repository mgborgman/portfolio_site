<html>
    <title>
        todo-list app
    </title>
    <body>
        <h1>Todo Tracker</h1>
        <a href="new-list.php" >New list</a>
    </body>
    <?php
        include 'config.php';
        try {
            $stmt = $db->query("SELECT id, name FROM lists");
            while ($row = $stmt->fetch()){
                echo '<div>';
                    echo '<a href=list.php?id=' . $row['id'] . '>' . $row['name'] . '</a>';
                echo '</div>';
            }



        }  catch(PDOException $e) {
            echo $e->getMessage();
        }


    ?>
</html>