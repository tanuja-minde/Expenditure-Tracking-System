
<?php
$user = $_SESSION["username"];
include('connection.php');
$sql = "select * from category";
$result = mysqli_query($connection,$sql);

echo "<table border = '1'>";
echo "<tr><th>January</th><th>Feburary</th><th>March</th><th>April</th><th>May</th><th>June</th><th>July</th><th>August</th><th>Sepetember</th><th>October</th><th>November</th><th>December</th></tr>";
echo "<tr>";
$a=array("01","02","03","04","05","06","07","08","09","10","11","12");

	
		foreach($a as $i){
			include('connection.php');

			$sql = "select * from category where username = '".$user ."' ";
			$result = mysqli_query($connection,$sql);
			$total = 0;
			while($row = mysqli_fetch_assoc($result)){
				$y=$row["date"][5].$row["date"][6];
				if($y==$i){
					
					$total = $total + $row["price"];

			}	
			
		}
		?><form method="post">
			<td>
				<button type = "submit" id = "total" name=<?php echo $i;?>><?php echo $total;?></button>
			</td>
			
		</form><?php

		// echo $total;
		//  echo "<br>";
		
			
}

echo "</tr>";
echo "</table>";
echo "<div>";

    $a=array("01","02","03","04","05","06","07","08","09","10","11","12");
    foreach ($a as $i) {
    
        if(isset($_POST[$i])){
        		$sql = "select * from category where username = '".$user ."'";
        		
				include('connection.php');

				
                $result = mysqli_query($connection,$sql);
        		echo "<table border = '1'>";
                echo "<tr><th>Username</th><th>Date</th><th>Category</th><th>Price</th></tr>";
                while($ans = mysqli_fetch_assoc($result)){
                    $m = $ans["date"][5].$ans["date"][6];
                    	if($m==$i){
                    		echo "<tr>";
                            echo '<td>'.$ans['username'].'</td>';
                            echo '<td>'.$ans['date'].'</td>';
                            echo '<td>'.$ans['category'].'</td>';
                            echo '<td>'.$ans['price'].'</td>';
                            echo "</tr>";
                    	}
                            
                        }
          }
  }
echo "</div>";
?>