<?php
session_start();
include("connect.php");

if($_SESSION['email']){
    $query = "SELECT * from inventory";
    $result = mysqli_query($conn,$query);
    
    
    
}
else{
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <style>
        table,th,td,tr{
            
            border: 1px solid black;
            text-align: center;
             
        }
    </style>
</head>
<body>
    <table  class="centre">
    <caption>Medicines</caption>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Batch No</th>
        <th>Expiry Date</th>
        <th> Quantity </th>
        <th>Unit Price</th>
        
    </tr>
    <tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['medname'] ?></td>
                <td><?php echo $row['batchno'] ?></td>
                <td><?php echo $row['expirydate'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $row['unitprice'] ?></td>
                </tr>

         <?php   
         }
        ?>
        
        
   
    </table> 



</body>
</html>