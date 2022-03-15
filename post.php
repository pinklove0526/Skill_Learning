<?php
  include 'includes/header.php';
  include 'func/classroomManager.php';
  include 'classes/User.php';

  if(isset($_GET['id'])) {
    $classroom = getClassroom($_GET['id'], $conn);
    $theid = $_GET['id'];
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
      <div class="rect mt-3 ml-3">
        <h5>Creator's name</h5>
      </div>
      <div class="rect">
        <h5>Number of students</h5>
      </div>
    </div>
    <div class="col-md-6 class_info">
      <div class="rect">
        <h2>Classname</h2>
        <hr>
        <h4>Description</h4>
        <!-- <h5>Number of students</h5> -->
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia at consequuntur cum sapiente nihil ut ipsa dolor dolorem alias ad sint quae enim totam exercitationem fugiat aliquam nesciunt, iusto error!</p>
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