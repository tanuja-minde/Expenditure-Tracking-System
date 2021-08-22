<?php
session_start();
?>

<!DOCTYPE html>
    <html>
        <div>  
            <?php
                require("header.html")
            ?>
        </div>

        <div class="nested">
            <?php

                echo "";
                echo '<h1 align = "center">'.'WELCOME'." ".$_SESSION["username"].'!'.'</h1>';
                echo "<div class = 'main'>";
                include('yearly_data.php');
                echo "</div>";

            ?>
        </div>
    <!-- <div><p>ja be</p></div> -->
    </html>