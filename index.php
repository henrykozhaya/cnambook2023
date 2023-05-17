<?php
require_once "includes/header.inc.php";
?>
    <div style='text-align:center'>
    <?php
        if(isset($_SESSION["user"])){
            echo "<h3>Welcome " . $_SESSION["user"]["first_name"] . "</h3>";
        }
        else{
            echo "<h3>Welcome to our website</h3>";
        }
        ?>    
    </div>
    <div class="main">
        <div>
        <h3>Latest books</h3>
        <?php
            echo getLatestBooks(16);
        ?>
        </div>

        <div>
            <h3>Best authors</h3>
            <?php echo getBestAuthors() ?>
        </div>          
    </div>
    </body>
</html>
