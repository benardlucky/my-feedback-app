<?php
//session_start();
include 'inc/header.php';
 $username = $password ='';
$usernameErr = $passwordErr ='';
if(isset($_SESSION['logged_in']) == true) {
  header('Location: feedback.php');
}
?>

<img src="/feedback/img/mylogo.png" class="w-25 mb-3" alt="">
   <h2 class="align text-center">  Welcome to Benard Feedback</h2>
  
  <?php if(isset($_SESSION['invalid_requests'])) { ?>
    <div class="alert alert-danger">
      <?php echo $_SESSION['invalid_requests']; ?>
      <?php unset($_SESSION['invalid_requests']); ?>
    </div>
  <?php  } ?>

   <form action="login.php" method="POST" class="mt-4 w-75">
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
    <div> <p> Not a user<a href ="register.php">click here </a> to register</p>
    </div>






<?php include 'inc/footer.php'; ?>