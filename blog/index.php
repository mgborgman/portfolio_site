<html>
    <title>
        Blog
    </title>
    <body>
        <a href="add_post.php">New Post</a>
        <h1>Recent Posts</h1>
    </body>
    <?php
        include 'config.php';

        try {

            $stmt = $db->query("SELECT id, author, title, content, pub_date FROM post
            ORDER BY pub_date DESC
            LIMIT 5");

            while($row = $stmt->fetch()){
                echo '<div>';
                    echo '<h2><a href="post.php?id='. $row['id'] . '">' . $row['title'] . '</a></h2>';
                    echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['pub_date'])).'</p>';
                    echo '<p>'.$row['content'].'</p>';                
                    // echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';                
                echo '</div>';
    
            }
    
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
            
    ?>    
</html>