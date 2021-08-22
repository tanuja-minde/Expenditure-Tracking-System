<?php
session_start();
?>

<!DOCTYPE html>
    <html>
        <div>  
            <?php
                require("header.html");
            ?>
        </div>

        <div class="nested">

            <?php

                echo "";
                echo '<h1 align = "center">'.'START OUT '." ".$_SESSION["username"].'!'.'</h1>';
                echo "<div class = 'main'>";
                include('expenditure.php');
                echo "</div>";

            ?>
        </div>

        <div>
            <?php
                include("footer.html")
            ?>
        </div>
    </html>