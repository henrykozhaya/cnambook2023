<?php
require_once "../../includes/functions.inc.php";
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
<h3>View Authors</h3>
<a href="add.php"><img width='16' src='http://localhost/cnambook2023/assets/images/add.png'/></a>
<br><br>
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
            <td align="center"><a href="http://localhost/cnambook2023/admin/author/edit.php?id=<?= $row["id"] ?>"><img src="http://localhost/cnambook2023/assets/images/edit.png" width="16"></a></td>
            <td align="center"><a href="http://localhost/cnambook2023/admin/author/delete.php?id=<?= $row["id"] ?>"><img src="http://localhost/cnambook2023/assets/images/delete.png" width="16"></a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>