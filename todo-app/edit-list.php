<h1>Editing <?php echo $_POST['list_name']?></h1>

<form method="POST" action="">
    <input type="hidden" name="list_id" value="<?php echo $_GET['id']?>"/>
    <input type="submit" name="edit" value="Edit List"/>
</form>

<a href="index.php">Home</a>