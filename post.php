<?php
  include 'includes/header.php';
  include 'func/classroomManager.php';
  include 'classes/User.php';
  var_dump($_SESSION['teacher']);
  $_SESSION['teacher'] = false;
  if(isset($_GET['id'])) {
    $classroom = getClassroom($_GET['id'], $conn);
    $theid = $_GET['id'];
    $teacher = new User($conn);
    //$owner = $classroom['owner_name'];
    //$teacher->setClassOwner($owner);
    //$teacher->owner();
  }
?>
<style media="screen">
  <?php include 'css/style.css'; ?>
</style>
<div class="container mb-5 mt-5 d-flex">
    <div class="col-md-3 class_icon">
      <div class="circle bg-dark">
        <i class="fas fa-user"></i>
      </div>
      <div class="class_description">
        <div class="rect">
          <h5>Number of students</h5>
        </div>
      </div>
      <?php if ($_SESSION['loggedin'] == true && $_SESSION['teacher'] == false):?>
        <div class="button_join">
          <a class="btn btn-danger" href='insideClassroom.php'>Join</a>
        </div>
      <?php elseif ($_SESSION['loggedin'] == true && $_SESSION['teacher'] == true):?>
        <div class="button_join">
          <a class="btn btn-danger" href="insideClassroom.php" style="display: none;">View</a>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-6 class_info">
      <div class="rect">
        <h2><?php echo htmlspecialchars($classroom['class_name']) ?></h2>
        <h5>By: <?php echo htmlspecialchars($classroom['owner_name']) ?></h5>
        <hr>
        <h4>Description</h4>
        <!-- <h5>Number of students</h5> -->
        <p><?php echo htmlspecialchars($classroom['info']) ?></p>
      </div>
    </div>
  </div>
  <div class="container">
    <h3>Lesson:</h3>
    <div class="rect">
        <hr>
    </div>
    <div class="container post">
     <?php if ($classroom == false): ?>
       <h2 class="display-4">404 Post Not Found!</h2>
     <?php else: ?>
          <?php
          $output="<video width='100%' controls>
                    <source src='{$classroom['video']}' type='video/mp4'>
                  </video>";
          echo $output;
          ?>
       </div>
     </div> <!-- end of post row -->
     <?php endif; ?>
     <div class="container">
    <h3>Rating: 10/10</h3>
    <textarea name="" id="" cols="30" rows="8" class="w-100" placeholder="Leave your comments here..."></textarea>
    <button class="btn btn-dark comment mb-3" type="submit" name="post">Post</button>
  </div>
  </div>
<?php include 'includes/footer.php'; ?>