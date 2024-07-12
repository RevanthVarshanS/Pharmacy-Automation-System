<?php 
include 'connect.php';
if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail="SELECT * From users where email='$email'";
     $result=mysqli_query($conn,$checkEmail);
     if($result->num_rows>0){
        echo "<script>alert('Email Address Already Exists !');
                document.location='index.php'</script>";
     }
     else{
        $insertQuery="INSERT INTO users(firstName,lastName,email,password)
                       VALUES ('$firstName','$lastName','$email','$password')";
        $ins=mysqli_query($conn,$insertQuery);
            if($ins){
                header("location: index.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
}
if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
   $result=mysqli_query($conn,$sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: homepage.php");
    exit();
   }
   else{
     echo "<script>alert('Not Found, Incorrect Email or Password');
     document.location='index.php'</script>";
   }
}
?>