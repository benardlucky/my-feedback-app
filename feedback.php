<?php
//session_start(); 
include 'inc/header.php'; 
if(isset($_SESSION['logged_in']) != true) {
  header('Location: index.php');
}
      //include ('session.php');
?>
<?php
    $sql = 'SELECT feedback_message.id, feedback_message.title, feedback_message.content, feedback_message.date, registration.id as user_id, registration.name, registration.username FROM feedback_message LEFT JOIN registration ON feedback_message.user_id = registration.id WHERE feedback_message.user_id = "$_SESSION[user_id]"';
     $result = mysqli_query($conn, $sql);
      $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
   ?>


<h2 text-align="right"><a href ="logout.php">Sign Out</a></h2>
    <h1> Past Feedback</h1><br>
    
    
     <?php if(empty($feedback)): ?>
     <p class="lead mt3">There are no feedbacks</p>
     <?php endif; ?>

     <?php foreach($feedback as $item): ?>
      <div class="card my-3 w-75">
      <p><div class="card-body text-center"> 
        <?php  echo $item['content']; ?>
        <div class="text-secodary mt-2"><?php echo $item['title']; ?></p>
          By <?php echo $item['name']; ?> 
          on <?php echo $item['date']; ?>
        </div>
      </div>
   </div>
  <?php endforeach;?> 
  <p> create a feed back<a href ="create-feedback.php"> click here</a> </p>
   
  
  <?php include 'inc/footer.php'; ?>