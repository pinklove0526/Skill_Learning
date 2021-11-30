<?php
include 'includes/header.php';
include 'func/classroomManager.php';
include 'classes/User.php';


if(isset($_GET['id'])) {
  $classroom = getClassroom($_GET['id'], $conn);
  $theid = $_GET['id'];
 
}

 ?>
 <hr>
 <br>
 <br>
 <br>
 <div class="container post">
   <div class="row">
     <?php if ($classroom == false): ?>
       <h2 class="display-4">404 Post Not Found!</h2>
      </div>
     <?php else: ?>
       <div class="col-md-8 offset-md-2">
         
          <h2 class="font-weight-light mt-4">Class name: <?php echo htmlspecialchars($classroom['class_name']); ?></h2>
         <h2 class="font-weight-light mt-4">Owner: <?php echo htmlspecialchars($classroom['owner_name']); ?></h2>
         
          <h2 class="font-weight-light mt-4">Contact info: <?php echo htmlspecialchars($classroom['contact_info']); ?></h2>
         
          <h2 class="font-weight-light mt-4">Class type: <?php echo htmlspecialchars($classroom['class_type']); ?></h2>
         
          <h5><em>Info: <?php echo htmlspecialchars($classroom['info']); ?></em></h5>
          <?php
          $output="
          <video width='360' height='200' controls>
                  <source src='{$classroom['video']}' type='video/mp4'>
                </video>
          ";
          echo $output;
          ?>
          
          
          
       </div>
     </div> <!-- end of post row -->

    
     <?php

      
      ?>
     <?php endif; ?>

 </div>

 <hr>
 <?php
 
 include 'includes/footer.php';
  ?>
