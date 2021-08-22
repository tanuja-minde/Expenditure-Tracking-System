<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Money Tracking Dropdown Using jQuery Ajax</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script>
    $(document).ready(function(){     
        $("select.money").change(function(){   
            var selectedcategory = $(".money option:selected").val();    
            $.ajax({  
                type: "POST",    
                url: "expDataLabels.php",    
                data: { categoryData : selectedcategory }   
            }).done(function(data){
                $("#response").html(data);   
            });
        });
    });
</script>
    
    
<form method  ="post" action = "addCategoryBackend.php">
    <table>
        <tr>
            <td>
                <label>Category:</label>
                <div class="form-group">
                    <select class="form-control-lg money" id="exampleFormControlSelect1" name="category">
                        <option selected disabled>Select</option>
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                        <option value="veggies">Veggies</option>
                        <option value="fruits">Fruits</option>  
                        <option value="clothes">Clothes</option>
                        <option value="other">Other</option>  
                    </select>
                </div>
            </td>
            <td id="response"> 
                <!--Response will be inserted here-->
            </td>
        </tr>
    </table>
    </center>
</form>
        

</body>
</html>