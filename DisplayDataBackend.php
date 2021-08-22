<?php
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
    session_start();
    
    include('connection.php');
    
    if(isset($_POST["tdate"]))
    {
        $user = $_SESSION["username"];
        $date = $_POST["date"];

        $category = $_POST["category"];

        $sql = "select * from category where username = '".$user."' AND date = '".$date."'";
        $result = mysqli_query($connection,$sql);

        echo "
            <html>
                <h3 align='center'>Welcome <b>$user</b>! This is what you have in your cart.</h3>
            </html>
            
            ";
        echo "<table border = '1' align='center'>";
        echo "<tr><th>Date</th><th>Category</th><th>Price</th></tr>";

        while($ans = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo '<td>'.$ans['date'].'</td>';
            echo '<td>'.$ans['category'].'</td>';
            echo '<td>'.$ans['price'].'</td>';   
        }
    }
    if(isset($_POST["tmonth"]))
    { 
        $month = $_POST["month"];

        if($month == "select_month")
        {
            header('Location:show.php');
        }

        $category = $_POST["category"];
        $user = $_SESSION["username"];
        $month_table = array("January"=>"1","Feburary"=>"2","March"=>"3","April"=>"4","May"=>"5","June"=>"6","July"=>"7","August"=>"8","September"=>"9","October"=>"10","November"=>"11","December"=>"12");
        
        if($category != 'select')
        {
            $sql = "select * from category where username = '".$user."' && category = '".$category."'";
            $result = mysqli_query($connection,$sql);
            $total = 0;

            while($ans1 = mysqli_fetch_assoc($result)) //printing the total price
            {   
                if($ans1["date"][5]=="0")
                {
                    if($ans1["date"][6]==$month_table[$month])
                    {
                        $total = $total + $ans1['price'];
                        
                    }
                }
                else
                {
                    $a1 = $ans1["date"][5].$ans1["date"][6];
                    if($a1==$month_table[$month])
                    {
                        $total = $total + $ans1['price'];
                    }
                }

            }

            $sql = "select * from category where username = '".$user."' && category = '".$category."'";
            $result = mysqli_query($connection,$sql);
            echo "
            <html>
                <h3 align='center'>Welcome <b>$user</b>! This is what you have in your cart.</h3>
                <h3 align='center'>The total expenditure is Rs. $total</h3>
            </html>
            
            ";
            echo "<table border = '1' align='center'>";
            echo "<tr><th>Date</th><th>Category</th><th>Price</th></tr>";

            while($ans = mysqli_fetch_assoc($result))
            {
                if($ans["date"][5]=="0")
                {
                    if($ans["date"][6]==$month_table[$month])
                    {
                        
                        echo "<tr>";
                        echo '<td>'.$ans['date'].'</td>';
                        echo '<td>'.$ans['category'].'</td>';
                        echo '<td>'.$ans['price'].'</td>';
                        echo "</tr>";
                        
                    }
                }
                else
                {
                    $a = $ans["date"][5].$ans["date"][6];
                    if($a==$month_table[$month]){
                        echo "<tr>";
                        echo '<td>'.$ans['date'].'</td>';
                        echo '<td>'.$ans['category'].'</td>';
                        echo '<td>'.$ans['price'].'</td>';
                        echo "</tr>";
                    }
                }

            }
            
        }
        else
        {
            $sql = "select * from category where username = '".$user."'";
            $result = mysqli_query($connection,$sql);
            $total = 0;

            while($ans1 = mysqli_fetch_assoc($result))//printing the total price
            {   
                if($ans1["date"][5]=="0")
                {
                    if($ans1["date"][6]==$month_table[$month])
                    {
                        $total = $total + $ans1['price'];
                        
                    }
                }
                else
                {
                    $a1 = $ans1["date"][5].$ans1["date"][6];
                    if($a1==$month_table[$month])
                    {
                        $total = $total + $ans1['price'];
                    }
                }

            }

            $sql = "select * from category where username = '".$user."'";
            $result = mysqli_query($connection,$sql);

            echo "
            <html>
                <h3 align='center'>Welcome <b>$user</b>! This is what you have in your cart.</h3>
                <h3 align='center'>The total expenditure is Rs. $total</h3>
            </html>
            
            ";
            echo "<table border = '1' align='center'>";
            echo "<th>Date</th><th>Category</th><th>Price</th></tr>";
            while($ans = mysqli_fetch_assoc($result))
            {
                if($ans["date"][5]=="0")
                {
                    if($ans["date"][6]==$month_table[$month])
                    {
                        echo "<tr>";
                        echo '<td>'.$ans['date'].'</td>';
                        echo '<td>'.$ans['category'].'</td>';
                        echo '<td>'.$ans['price'].'</td>';
                        echo "</tr>";
                    }
                }
                else
                {
                    $a = $ans["date"][5].$ans["date"][6];
                    if($a==$month_table[$month]){
                        echo "<tr>";
                        echo '<td>'.$ans['date'].'</td>';
                        echo '<td>'.$ans['category'].'</td>';
                        echo '<td>'.$ans['price'].'</td>';
                        echo "</tr>";
                    }
                }     
            }
        }
    }

?>