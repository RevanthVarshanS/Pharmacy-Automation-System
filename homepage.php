<?php
if (!isset($_SESSION) || session_id() == "" || session_status() === PHP_SESSION_NONE)
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div style="text-align:center; padding:15%;">
      <p  style="font-size:50px; font-weight:bold;">
       Hello  <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       else{
        header("location:index.php");
       } 
       ?>
       :)
      </p>
      <div class="menu">
        <a href="order.html"><button >orders</button></a><br>        
        <a href="customer.php"><button>Add Customer</button></a><br>        
        <a href="addStock.php"><button>Add Stock</button></a><br> 
        <a href="addSupplier.php"><button>Add Supplier </button></a><br>
        <a href="inventory.php"><button name="inventory" id="inventory">Inventory</button></a><br>
    </div>    
    <a href="logout.php" >Logout</a>
    </div>
</body>
</html>