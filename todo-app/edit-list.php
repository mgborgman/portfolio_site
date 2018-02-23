<h1>Editing <?php echo $_POST['list_name']?></h1>

<form method="POST" action="delete-list.php">
    <input type="hidden" name="list_id" value="<?php echo $_GET['id']?>"/>
    <input type="hidden" name="list_name" value="<?php echo $_POST['list_name']?>"/>
    <input type="submit" name="delete" value="Delete List"/>
</form>

<form method="POST" action="rename-list.php" >
    <input type="hidden" name="list_id" value="<?php echo $_GET['id'] ?>"/>
    <input type="hidden" name="current_list_name" value="<?php echo $_POST['list_name']?>"/>
    <label for="new_list_name">Enter the new name for the list:</label>
    <input type="text" name="new_list_name" id="new_list_name"/>
    <input type="submit" name="update_list_name" value="save"/>
</form>

<a href="index.php">Home</a>