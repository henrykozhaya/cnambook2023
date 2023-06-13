<?php
require_once "../includes/functions.inc.php";

$action = isset($_GET["action"])?$_GET["action"]:"read";
$name = "";
// Check if there's a delete request
if
(
    isset($_GET["id"]) &&
    $action == "delete" 
)
{
    $id = intval($_GET["id"]);
    $query = "delete from author where id = '$id'";
    $result = mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) > 0){
        header("location:http://localhost/cnambook2023/admin/author.php?action=read&message=1");
    }
    else{
        header("location:http://localhost/cnambook2023/admin/author.php?action=read&message=0");
    }
}
else if
(
    $action == 'add' &&
    isset($_POST["name"]) &&
    !empty($_POST["name"])
)
{
    $name = cleanTextInput($_POST["name"]);
    $query = "INSERT INTO author (name) VALUES ('$name')";
    mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) > 0){
        header("location:http://localhost/cnambook2023/admin/author.php?action=read&message=2");
    }
    else{
        header("location:http://localhost/cnambook2023/admin/author.php?action=read&message=3");
    }    
}
else if(
    $action == 'edit' &&
    isset($_GET["id"]) &&
    intval($_GET["id"]) > 0
)
{
    $id = intval($_GET["id"]);
    if(isset($_POST["name"]))
    {
        $name = cleanTextInput($_POST["name"]);
        $query = "UPDATE author SET name = '$name' WHERE id = '$id'";
        
        mysqli_query($connection, $query);

        if(mysqli_affected_rows($connection) > 0){
            header("location:http://localhost/cnambook2023/admin/author.php?action=read&message=5");
        }
        else{
            header("location:http://localhost/cnambook2023/admin/author.php?action=read&message=6");
        }         
    }

    $query = "SELECT * FROM author WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $name = $row["name"];
    }
    else{
        header("location:http://localhost/cnambook2023/admin/author.php?action=read&message=4");
    }
    
}
?>
<?php
if(isset($_GET["message"])){
    $message = intval($_GET["message"]);
    switch($message){
        case 0:
            echo "Record was not deleted";
            break;
        case 1:
            echo "Record was deleted successfully";
            break;            
        case 2:
            echo "Record was added";
            break;
        case 3:
            echo "Record was not added";
            break;            
        case 4:
            echo "Record was not found";
            break;            
        case 5:
            echo "Record was updated";
            break;            
        case 6:
            echo "Record was not updated";
            break;            
    }
}
?>
<h3>Authors</h3>
<?php
if($action == "read"){
?>
<a href="author.php?action=add"><img width='16' src='http://localhost/cnambook2023/assets/images/add.png'/> Add</a>
<br/>
<br/>
<?php
}
?>

<?php
if($action == 'read'){
?>
<table border=1>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM author";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td align="center"><a href="http://localhost/cnambook2023/admin/author.php?action=edit&id=<?= $row["id"] ?>"><img src="http://localhost/cnambook2023/assets/images/edit.png" width="16"></a></td>
            <td align="center"><a href="http://localhost/cnambook2023/admin/author.php?action=delete&id=<?= $row["id"] ?>"><img src="http://localhost/cnambook2023/assets/images/delete.png" width="16"></a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<?php
}
?>

<?php
if($action == "add" || $action == "edit"){
    $getID = $action=="edit"?"&id=$id":"";
    $formActionURL = "author.php?action=" . $action . $getID;

?>
<script>
function cancel(){
    document.location.href = 'http://localhost/cnambook2023/admin/author.php';
}
</script>
<div class="form_container">
	<form action="<?=$formActionURL?>" method="post">
		<div class="input_container">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" required value="<?= $name ?>">
		</div>
        <br/>
		<div class="input_container">
        <?php
        $submitButtonLabel = $action == 'add'?"Add Author":"Update Author";
        ?>
		<input type="submit" name="submit" value="<?= $submitButtonLabel ?>">
		</div>
	</form>
    <button name="cancel" onclick='cancel()'>Cancel</button>
</div>
<?php
}