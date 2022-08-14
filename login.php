<?php 
include 'config/database.php';

session_start(); 


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    
    $sql = "SELECT id FROM registration WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //var_dump($row);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
   
    
    
    // If result matched $username and $password, table row must be 1 row
      
    if($count == 1) {
      //session_register("username");
       $_SESSION["username"] = $username;
       
       header("location: create-feedback.php");
    }else {
       $error = "Your Login Username or Password is invalid";
    }
}
?>