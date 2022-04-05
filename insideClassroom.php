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
      <div class="class_description">
        <div class="rect">
          <h5>Number of students</h5>
        </div>
      </div>
      <?php if ($_SESSION['loggedin'] == true):?>
        <div class="button_join">
          <a class="btn btn-danger" href='insideClassroom.php'>Add lesson</a>
        </div>
      <?php endif;?>
    </div>
    <div class="col-md-6 class_info">
      <div class="rect">
        <h2>Class name</h2>
        <h5>By: Owner name</h5>
        <hr>
        <h4>Description</h4>
        <!-- <h5>Number of students</h5> -->
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati aut enim doloremque, accusantium et at molestias quasi officia nihil veritatis voluptas perspiciatis sapiente cumque voluptates quae facere ratione ipsam corporis.</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div>
        <h4>Lesson:</h4>
        <hr>
        <h4>Resources:</h4>
        <h5>abc.doc</h5>
        <h5>rep.doc</h5>
        <hr>
        <h4>Rating: 10/10</h4>
        <textarea name="" id="" cols="30" rows="8" class="w-100" placeholder="Leave your comments here..."></textarea>
        <button class="btn btn-dark comment mb-3" type="submit" name="post">Post</button>
    </div>
  </div>
<?php include 'includes/footer.php'; ?>