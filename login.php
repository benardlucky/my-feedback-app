<?php 
include 'config/database.php';

session_start(); 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    // username and password sent from form 
    if(empty($username) || empty($password)){
      $errors = "enter your username & password";
      $_SESSION['invalid_requests'] = $errors;
      header('Location: index.php');
    }
    
    $sql = "SELECT id, username, email, name FROM registration WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //var_dump($row);
    $active = $row;
    
    $count = mysqli_num_rows($result);
   
    
    
    // If result matched $username and $password, table row must be 1 row
      
    if($count == 1) {
      //session_register("username");
       $_SESSION["username"] = $username;
       $_SESSION['logged_in'] = true;
       $_SESSION['user_id'] = $row['id'];
       $_SESSION['username'] = $row['username'];
       
       header("location: create-feedback.php");
    }else {
      header("index.php");
       $error = "Your Login Username or Password is invalid";
      
       exit;
    }
}
?>