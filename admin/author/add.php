<?php
require_once "../../includes/functions.inc.php";
if
(
    isset($_POST["name"]) &&
    !empty($_POST["name"])
)
{
    $name = cleanTextInput($_POST["name"]);
    $query = "INSERT INTO author (name) VALUES ('$name')";
    mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) > 0){
        header("location:http://localhost/cnambook2023/admin/author/view.php?message=2");
    }
    else{
        header("location:http://localhost/cnambook2023/admin/author/view.phpmessage=3");
    }    
}
?>
<script>
function cancel(){
    document.location.href = 'http://localhost/cnambook2023/admin/author/view.php';
}
</script>
<div class="form_container">
	<form action="add.php" method="post">
		<div class="input_container">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" required value="">
		</div>
        <br/>
		<div class="input_container">
		<input type="submit" name="submit" value="Add Author">
		</div>
	</form>
    <button name="cancel" onclick='cancel()'>Cancel</button>
</div>