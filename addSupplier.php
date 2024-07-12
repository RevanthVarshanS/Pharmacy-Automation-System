<?php
    session_start();
    include('connect.php');
    if($_SESSION['email']){
        if(isset($_POST['addSupplier'])){
            $name=$_POST['suppliername'];
            $phonenum=$_POST['phonenum'];
            $supplierEmail=$_POST['supplierEmail'];
            $add="INSERT into supplier(name,phonenum,email) values('$name','$phonenum','$supplierEmail')";
            if($conn->query($add)==TRUE){
                echo "<script>   alert('Supplier Added')  </script>";
               //  header("location: addStock.php");
               
                    }
            else{
               echo "Error:".$conn->error;
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
    <title>Adding Supplier</title>
</head>
<body>
    <div class="container">
        <form action="addSupplier.php" method="post" onsubmit="return validateForm()">
            <label for="suppliername">Enter Supplier Name:</label>
            <input type="text" id="suppliername" name="suppliername" required><br>

            <label for="phonenum">Enter Supplier Mobile Number:</label>
            <input type="text" name="phonenum" id="phonenum" required minlength="10" maxlength="10"><br>     

            <label for="supplierEmail">Enter Supplier E-mail:</label>
            <input type="email" name="supplierEmail" id="supplierEmail" required><br>

            
        </form>
    </div>
    <a href="logout.php"> Logout</a>
    <!-- <script src="logout.js"></script>  -->
<script>
function validateForm() {
    var name = document.getElementById("suppliername").value;
    var email = document.getElementById("supplierEmail").value;
    var phone = document.getElementById("phonenum").value;
    var nameRegex = /^[a-zA-Z\s]*$/;
    var phoneRegex = /^\d{10}$/;

    if (name === "") {
        alert("Name must be filled out");
        return false;
    } else if (!nameRegex.test(name)) {
        alert("Name should not contain numbers");
        return false;
    }

    if (!phoneRegex.test(phone)) {
        alert("Phone number should be 10 digits only");
        return false;
    }
    return true;
}
</script>
</body>
</html>





