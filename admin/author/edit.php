<?php
require_once "../../includes/functions.inc.php";
if
(
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
<script>
function cancel(){
    document.location.href = 'http://localhost/cnambook2023/admin/author/view.php';
}
</script>
<div class="form_container">
	<form action="edit.php?id=<?=$id?>" method="post">
		<div class="input_container">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" required value="<?= $name ?>">
		</div>
        <br/>
		<div class="input_container">
		<input type="submit" name="submit" value="Update Author">
		</div>
	</form>
    <button name="cancel" onclick='cancel()'>Cancel</button>
</div>