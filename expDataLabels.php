<?php
if(isset($_POST["categoryData"])){

    $categoryData = $_POST["categoryData"]; 
     

    if($categoryData !== 'Select' && $categoryData !='other')
    {  
        echo "  
                <label>Price:</label>
                <input type = 'text' name = 'price'>
                <label>Date:</label>
                <input type = 'date' name = 'date'>
                <input type = 'submit' name = '+' value = '+'>
             ";

    }
    if($categoryData=='other')
    {
        echo "
                <label>Add_Your's_1st_Choice : </label>
                <input type = 'text' name = 'choice'>
                <label>Price:</label>
                <input type = 'text' name = 'price'>
                <label>Date:</label>
                <input type = 'date' name = 'date'>
                <input type = 'submit' name = '+' value = '+'>
             ";
    } 
}
?>