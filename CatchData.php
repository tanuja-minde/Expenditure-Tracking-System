<?php 
    session_start();

    $conn = mysqli_connect("localhost","root","","project");

    $sql = "select distinct category from category where username = '".$_SESSION["username"]."'";
    $result = mysqli_query($conn,$sql);

    echo "Show : ";
    echo "<select name = 'category'>";
    echo '<option value = "select">Select</option>';
    
    while($row = mysqli_fetch_assoc($result)){
        echo '<option>'.$row['category'].'</option>';
    }
    echo "</select>";

?>
