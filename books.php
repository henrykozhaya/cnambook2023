<?php
require_once "includes/header.inc.php";
?>
    <div class="main">
        <div>
        <h3>Latest books</h3>
        <?php
            $query = "SELECT * FROM book";
            
            if(isset($_GET["search"]) && $_GET["search"] != ""){
                $query .= " WHERE title LIKE '%" . cleanTextInput($_GET["search"]) . "%'";
            }
            
            $result = mysqli_query($connection, $query);

            $html = "<table border='1'>";
            $html .= "<thead>";
            $html .= "<th>ISBN</th>";
            $html .= "<th>Title</th>";
            $html .= "<th>Categories</th>";
            $html .= "<th>Author</th>";
            $html .= "<th>Editor</th>";
            $html .= "<th>Price</th>";
            $html .= "<th>Buy Now</th>";
            $html .= "</thead>";

            while($row = mysqli_fetch_array($result)){
                $html .= "<tr>";
                $html .= "<td>" . $row["isbn"] . "</td>";
                $html .= "<td>" . $row["title"] . "</td>";
                $html .= "<td>" . $row["category"] . "</td>";
                $html .= "<td>" . $row["author"] . "</td>";
                $html .= "<td>" . $row["editor"] . "</td>";
                $html .= "<td align='right'>" . number_format($row["price"], 2) . "</td>";
                $html .= "<td><a href='order.php?isbn=" . $row["isbn"] . "'>Buy it now</a></td>";
                $html .= "</tr>";
            }
            $html .= "</table>";
            echo $html;
        ?>
        </div>
    </div>
    </body>
</html>