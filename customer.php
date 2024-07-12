<?php
include('connect.php');
session_start();
if($_SESSION['email']){
    if(isset($_POST['customer'])){
        $number=$_POST['customernum'];
         $sql="SELECT * FROM customer WHERE customerNum='$number' ";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
   
    header("Location: sales.html");
    exit();
   }
   else{
    
     echo "<script>alert('Not Found');
     document.location='customer.php'</script>";
   }
    }


    if(isset($_POST['newcustomer'])){
        $name=$_POST['customername'];
        $number=$_POST['customernum'];
        $address=$_POST['customeraddress'];

        $checknum="SELECT * From customer where customerNum='$number'";
        $result=$conn->query($checknum);
        if($result->num_rows>0){
           echo "<script>alert('Number Address Already Exists !');
                   document.location='customer.php'</script>";
           
           
        }
        else{
           $insertQuery="INSERT INTO customer(name,customerNum,address)
                          VALUES ('$name','$number','$address')";
               if($conn->query($insertQuery)==TRUE){
                //    header("location: customer.php");

                   echo "<script>alert('Customer Added Successfully !');
                   document.location='customer.php'</script>";
               }
               else{
                   echo "Error:".$conn->error;
               }
        }

    }






}
else{
    header("location:index.php");
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
</head>
<body>
    <div class="contaniner" id="customer">
        <form method="post" action="customer.php">
            <label for="customernum">Customer Number</label>
            <input type="text" minlength="10" maxlength="10" name="customernum" id="customernum" required><br>

            <input type="submit" name="customer" id="customer" class="btn" value="submit"><br><br>





        </form>

        &nbsp; New Customer ? <button id="newcustomerbutton">New Customer</button>
    </div>

    <div class="container" id="newcustomer" style="display: none;">
    <form method="post" action="customer.php">
        <label for="customername">Customer Name: </label>
        <input type="text" name="customername" id="customername" required><br>
        <label for="customernum" > Customer Number: </label>
        <input type="text" name="customernum" id="customernum" minlength="10" maxlength="10" required><br>
        <label for="address">Customer Address: </label>
        <input type="text" name="customeraddress" id="customeraddress"><br>
        <input type="submit" class="btn" name="newcustomer" id="newcustomer" value="Add customer"><br><br>


        




    </form>

   Already a Customer ? <button id="customerbutton"> Already a Customer ?</button>
    
    
    </div>
</body>
<script>
const customerbutton=document.getElementById('customerbutton');
const newcustomerbutton=document.getElementById('newcustomerbutton');
const customerForm=document.getElementById('customer');
const newcustomerForm=document.getElementById('newcustomer');

newcustomerbutton.addEventListener('click',function(){
    customerForm.style.display="none";
    newcustomerForm.style.display="block";
})
customerbutton.addEventListener('click', function(){
    customerForm.style.display="block";
    newcustomerForm.style.display="none";
})



    </script>

</html>