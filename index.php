<?php
require_once "includes/functions.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cnam Book 2023</title>
    </head>
    <body>
        <?php
        if(isset($_SESSION["user"])){
            echo "<h3>Welcome " . $_SESSION["user"]["first_name"] . "</h3>";
        }
        else{
            echo "<h3>Welcome to our website</h3>";
        }
        ?>
        <div>
            <?php
            if(isset($_SESSION["user"])){
            ?>
            <a href='logout.php'>Logout</a>
            <?php
            }
            else{
            ?>
            <a href='register.php'>Register</a>
            <br/>
            <a href='login.php'>Login</a>
            <?php
            }
            ?>
        </div>
        <div>
        <?php
            if(isset($_SESSION["user"])){
                echo "<h3>Latest Books</h3>";
                require_once "includes/db.inc.php";
                $query = "SELECT isbn, title, category, author, price FROM book ORDER BY created DESC LIMIT 0, 8";
                $result = mysqli_query($conn, $query);
                $html = "<table border='1'>";
                $html .= "<thead>";
                $html .= "<th>ISBN</th>";
                $html .= "<th>Title</th>";
                $html .= "<th>Categories</th>";
                $html .= "<th>Author</th>";
                $html .= "<th>Price</th>";
                $html .= "<th>Buy Now</th>";
                $html .= "</thead>";
                
                while($row = mysqli_fetch_array($result)){
                    $html .= "<tr>";
                    $html .= "<td>" . $row["isbn"] . "</td>";
                    $html .= "<td>" . $row["title"] . "</td>";
                    $html .= "<td>" . $row["category"] . "</td>";
                    $html .= "<td>" . $row["author"] . "</td>";
                    $html .= "<td align='right'>" . number_format($row["price"], 2) . "</td>";
                    $html .= "<td><a href='order.php?isbn=" . $row["isbn"] . "'>Buy it now</a></td>";
                    $html .= "</tr>";
                }

                $html .= "</table>";

                echo $html;
            }
            else{
                echo "<p>Please login to check our latest entries</p>";
            }
            ?>            
        </div>
    </body>
</html>
