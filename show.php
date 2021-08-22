<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Money Tracking Dropdown Using jQuery Ajax</title>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<form method = "post" action = "DisplayDataBackend.php">
  <table>
    <tr height = "100">
        <td><button type="button" name = "button" id="sdate">Show_By_Date</button></td>
        <td id = "customers"></td>
        <td id = "option"></td>
        <td id = "button"></td>
    </tr>
    <tr>
        <td><button type="button" name = "button" id = "smonth">Show_By_Month</button></td>
        <td id = "customers1"></td>
        <td id = "option1"></td>
        <td id = "button1"></td>
    </tr>
    <tr>
        
    
    </tr>

 </table>
 </center>
</form>
        


    <script>

     $(document).ready(function(){

       $("#sdate").on("click", function(){
        $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "CatchData.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
        
         var row = '<td style="color:black;">Date:</td><td><input type="date" name="date"></td>';
        //  var row1 = '<td>Select Category : <select name = "category" required><option value = "select">Select_Category</option><option value = "petrol">Petrol</option><option value = "diesel">Diesel</option><option value = "veggies">Veggies</option></select></td>'
         var row1 = '<td id = "responsecontainer"></td>';
         var row2 = '<td><input type = "submit" name = "tdate"></td>';
         $("#customers").append(row);
         $("#option").append(row1);
         $("#button").append(row2);


       });

       $("#smonth").on("click", function(){
        $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "CatchData.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer1").html(response); 
            //alert(response);
        }

    });
       var row = '<td style="color:black;">Month:</td><td><select name = "month"><option value = "select_month">Select_Month</option><option>January</option><option>Feburary</option><option>March</option><option>April</option><option>May</option><option>June</option><option>July</option><option>August</option><option>September</option><option>October</option><option>November</option><option>December</option></select></td>';
      
       var row1 = '<td id = "responsecontainer1"></td>'
       var row2 = '<td><input type = "submit" name = "tmonth"></td>';
       $("#customers1").append(row);
       $("#option1").append(row1);
       $("#button1").append(row2);


});

     });

    </script>


</body>
</html>