<form method="POST" action="">
    <label for="author">Author</label>
    <input id="author" type="text" name="author" placeholder="John Doe"/>

    <label for="title">Title</label>
    <input id="title" type="text" name="title" placeholder="Blog Title"/>

    <label for="content">Body</label>
    <textarea id="content" name="content" placeholder="blog body"></textarea>
    
    <input type="submit" value="Post" name="submit" />
</form>

<?php
    include './config.php';

    $author = $_POST['author'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = $db->prepare("INSERT INTO post (title, author, content) VALUES 
        (:title, :author, :content)");
        
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (empty($author) || empty($title) || empty($content)) {
            echo "one or more fields was not filled out.";
        } else {
            $sql->execute(array(
                "title" => $title,
                "author" => $author,
                "content" => $content
            ));
            header('Location: index.php');
            exit;
        }
    }
?>