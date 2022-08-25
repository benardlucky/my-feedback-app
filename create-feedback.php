<?php
include "inc/header.php";
if(isset($_SESSION['logged_in']) != true) {
  header('Location: index.php');
}

 //from submit
 if(isset($_POST['submit'])){
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $content = mysqli_real_escape_string($conn, $_POST['content']); 
    //validate title
    if(empty($_POST['title']) || empty($_POST['content'])){
      $titleErr = 'title & content is required';
    }

      else {
        $message = "INSERT INTO feedback_message (user_id, title, content)  VALUE('$_SESSION[user_id]', '$title', '$content')";
      
        if(mysqli_query($conn, $message)){
          //success
          header('Location: feedback.php');
        }else{
          //error
          echo 'Error: ' . mysqli_error($conn);
        }
      }
 }

 ?>


<img src="/feedback/img/mylogo.png" class="w-25 mb-3" alt="">
   <h2 class="align text-center">  Welcome to Benard Feedback</h2>
   <p class="align text-center">  Create Your Feedback </p>

   <?php if(isset($titleErr)) { ?>
    <div class="alert alert-danger">
      <?php echo $titleErr; ?>
    </div>
  <?php  } ?>

   <form action="<?php echo htmlspecialchars($_SERVER
      ['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Enter your title">
        </div>
        
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea class="form-control" name="content" placeholder="Enter your content"></textarea>
        </div>

        <div class="mb-3">
          <input type="submit" name="submit" value="submit" class="btn btn-dark w-100">
        </div>
    </form>

      



<?php
include "inc/footer.php";
?>