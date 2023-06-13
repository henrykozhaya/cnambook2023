<?php
require_once "../../includes/functions.inc.php";
if
(
    isset($_GET["id"]) &&
    intval($_GET["id"]) > 0
)
{
    $id = intval($_GET["id"]);
    $query = "delete from author where id = '$id'";
    $result = mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) > 0){
        header("location:http://localhost/cnambook2023/admin/author/view.php?message=1");
    }
    else{
        header("location:http://localhost/cnambook2023/admin/author/view.php?message=0");
    }
}