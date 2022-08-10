<?php 
include 'inc/header.php'; 

session_start(); 


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    
    $sql = "SELECT id FROM registration WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
<?php $username = $password ='';
$usernameErr = $passwordErr ='';
?>

<img src="/feedback/img/mylogo.png" class="w-25 mb-3" alt="">
   <h2 class="align text-center">  Welcome to Benard Feedback</h2>

   <form action="<?php echo htmlspecialchars($_SERVER
      ['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control <?php echo 
          $usernameErr ? 'is_valid' : null; ?>" id="username" 
          name="username" placeholder="Enter your username">
          <div class="invalid-feedback">
            <?php echo $usernameErr; ?> </div>
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control"  <?php echo 
          $passwordErr ? 'is_valid' : null; ?> id="password"
          id="password" name="password" placeholder="Enter your password">
          <div class="invalid-feedback">
            <?php echo $passwordErr; ?> </div>
        </div>

        <div class="mb-3">
          <input type="submit" name="submit" value="Login" class="btn btn-dark w-100">
        </div>
    </form>






<?php include 'inc/footer.php'; ?>