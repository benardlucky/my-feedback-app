<?php
include "inc/header.php";
session_start();

$title = $content = $name ='';
$titleErr = $contentErr = $nameErr ='';

 //from submit
 if(isset($_POST['submit'])){
    //validate name
    if(empty($_POST['name'])){
        $nameErr = 'name is required';
      }  else {
        $title = filter_input(INPUT_POST, 'name',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }
    //validate title
    if(empty($_POST['title'])){
      $titleErr = 'title is required';
    }  else {
      $title = filter_input(INPUT_POST, 'title',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //validate content
      if(empty($_POST['content'])){
        $contentErr = 'content is required';
      }  else {
        $content = filter_input(INPUT_POST, 'content',
        FILTER_SANITIZE_EMAIL);
      }

      $message = "INSERT INTO feedback_message (name, title, content) 
      VALUE('$name', '$title', '$content')";
      
      if(mysqli_query($conn, $message)){
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
   <p class="align text-center">  Create Your Feedback </p>

   <form action="<?php echo htmlspecialchars($_SERVER
      ['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">

      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control"  <?php echo 
          $nameErr ? 'is_valid' : null; ?> id="name"
          name="name" placeholder="Enter your name">
          <div class="invalid-feedback">
            <?php echo $nameErr; ?> </div>
        </div>

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" <?php echo 
          $titleErr ? 'is_valid' : null; ?> id="title" 
          name="title" placeholder="Enter your title">
          <div class="invalid-feedback">
            <?php echo $titleErr; ?> </div>
        </div>
        
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <input type="text" class="form-control"  <?php echo 
          $contentErr ? 'is_valid' : null; ?> id="content"
          name="content" placeholder="Enter your content">
          <div class="invalid-feedback">
            <?php echo $contentErr; ?> </div>
        </div>

        <div class="mb-3">
          <input type="submit" name="submit" value="submit" class="btn btn-dark w-100">
        </div>
    </form>



<?php
include "inc/footer.php";
?>