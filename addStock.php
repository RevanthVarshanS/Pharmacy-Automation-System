<?php
session_start();
    include('connect.php');

if($_SESSION['email']){
    if(isset($_POST['addStock'])){
        $medname=$_POST['medname'];
        $quantity=$_POST['quantity'];
        $expirydate=$_POST['expirydate'];
        $batchno=$_POST['batchno'];
        $unitprice=$_POST['unitprice'];
        $ins="INSERT INTO inventory (medname,quantity,expirydate,batchno,unitprice) VALUES ('$medname','$quantity','$expirydate','$batchno','$unitprice')";

        


        if($conn->query($ins)==TRUE){
             echo "<script>   alert('Medicine Added')  </script>";
            //  header("location: addStock.php");
            
        }
        else{
            echo "Error:".$conn-> error;
        }

     
    }
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
    <title>Add Stocks</title>
</head>
<body>
    <div class="container">
        <form action="addStock.php" method="post">
            <label for="medname">Medicine Name:</label>
            <input type="text" id="medname" name="medname" required><br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required min="1"><br>
            
            <label for="expirydate">Expiry Date:</label>
            <input type="date" name="expirydate" id="expirydate" min="2024-05-11"><br>
            
            <label for="batchno">Batch Number:</label>
            <input type="text" name="batchno" id="batchno" required><br>
            
            <label for="unitprice">Unit Price:</label>
            <input type="number" name="unitprice" id="unitprice" required min="0"><br>
            
            <!-- <button type="submit"  id="addStock" onclick="return alwin()" name="addStock">Add</button> -->
            <input type="submit"   value="Add Medicine" name="addStock" >
            
            

         





        </form>

        

    
   

        <a href="logout.php"> Logout</a>

    </div>
   


<!-- <script >
  function alwin(){
    alert("Medicine Added");
  }
</script> -->

<!-- <script src="logout.js"></script> -->
</body>
</html>






