<?php include 'inc/header.php'; 
      include ('session.php');
?>
<?php
    $sql = 'SELECT * FROM feedback_message';
     $result = mysqli_query($conn, $sql);
      $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
   ?>

    <h1> Past Feedback</h1>
    <h2><a href = "logout.php">Sign Out</a></h2>
    
     <?php if(empty($feedback)): ?>
     <p class="lead mt3">There is no feedback</p>
     <?php endif; ?>

     <?php foreach($feedback as $item): ?>
      <div class="card my-3 w-75">
      <div class="card-body text-center"> 
        <?php echo $item['body'];  ?>
        <div class="text-secodary mt-2">
          By <?php echo $item['name']; ?> on <?php echo $item
          ['date']; ?>
        </div>
      </div>
   </div>
  <?php endforeach;?>  
   
  
  <?php include 'inc/footer.php'; ?>