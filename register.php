<?php 
include 'inc/header.php'; ?>

<?php
 $name =  $email =  $username = $password ='';
 $nameErr =  $emailErr  =  $usernameErr = $passwordErr ='';

 //from submit
 if(isset($_POST['submit'])){
    //validate name
    if(empty($_POST['name'])){
      $nameErr = 'name is required';
    }  else {
      $name = filter_input(INPUT_POST, 'name',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //validate email
      if(empty($_POST['email'])){
        $emailErr = 'email is required';
      }  else {
        $email = filter_input(INPUT_POST, 'email',
        FILTER_SANITIZE_EMAIL);
      }

    //validate username 
      if(empty($_POST['username'])){
        $usernameErr = 'unsername is required';
      }  else {
        $username = filter_input(INPUT_POST, 'username',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      } 

      //validate password 
      if(empty($_POST['password'])){
        $passwordErr = 'password is required';
      }  else {
        $password = filter_input(INPUT_POST, 'password',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      } 
      
      //check if the username exist
      $user = "SELECT * FROM registration WHERE username = '$username'";
      $result = mysqli_query($conn, $user);
      $nun = mysqli_num_rows($result);

       if($nun == 1){
          echo "username Already Taken";
       }
      
      $sql = "INSERT INTO registration (name, email, username, password) 
      VALUE('$name', '$email', '$username', '$password')";
      
      if(mysqli_query($conn, $sql)){
        //success
        header('Location: feedback.php');
      }else{
        //error
        echo 'Error: ' . mysqli_error($conn);
      }
    }
 
?>
    <img src="/feedback/img/mylogo.png" class="w-25 mb-3" alt="">
   <h2 class="align text-center">  Welcome to Benard Feedback</h2>
    <p class="lead text-center">Leave feedback for Benard Media</p>
    
    <form action="<?php echo htmlspecialchars($_SERVER
      ['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" <?php echo 
          $nameErr ? 'is_valid' : null; ?> id="name" 
          name="name" placeholder="Enter your name">
          <div class="invalid-feedback">
            <?php echo $nameErr; ?> </div>
        </div>
        
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control"  <?php echo 
          $emailErr ? 'is_valid' : null; ?> id="email"
          id="email" name="email" placeholder="Enter your email">
          <div class="invalid-feedback">
            <?php echo $emailErr; ?>
          </div>
        </div>

        <div class="mb-3">
          <label for="username" class="form-label">username</label>
          <input class="form-control" <?php echo 
          $usernameErr ? 'is_valid' : null; ?> id="username" 
          name="username" placeholder="Enter your username">
          <div class="invalid-feedback">
            <?php echo $usernameErr; ?>
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">password</label>
          <input type="password" class="form-control <?php echo 
          $nameErr ? 'is_valid' : null; ?>" id="password" 
          name="password" placeholder="Enter your password">
          <div class="invalid-feedback">
            <?php echo $passwordErr; ?>
          </div>
        </div>
        <div class="mb-3">
          <input type="submit" name="submit" value="send" class="btn btn-dark w-100">
        </div>
    </form>



    <?php
    include 'inc/footer.php'; ?>
