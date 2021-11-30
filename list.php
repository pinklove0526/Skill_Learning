<?php
include 'includes/header.php';
include 'classes/Classroom.php';
//include 'func/classroomManager.php';
//include 'func/filemanager.php';
$errors = [];
if(isset($_POST['submit'])) {
  $class_name = $_POST['class_name'];
  $class_type = $_POST['class_type'];
  $contact_info = $_POST['contact_info'];
  $info = $_POST['info'];
  $owner_name = $_SESSION['user_name'];
  $classroom = new Classroom($conn);
  $classroom->checkCreateClassroom($class_name, $class_type, $info, $contact_info, $owner_name, $errors);
  $video = $classroom->checkFile($_FILES, "video", $errors);
  if(empty($errors) && $video != false) {
    $classroom->createClassroom($class_name, $class_type, $info, $contact_info, $owner_name, $video);
  }
}
?>
<br>
<br>
<br>
<div class="container">
  <div class="row">
      <?php if ($_SESSION['loggedin'] == false):?>
          <div class="mt-5 col-md-6 offset-md-3 text-center">
        <h2 class="display-5">Please Login to add classmate!</h2>
        <p>Create an account or login to add classmate to the website.</p>
        <button type="button" class="btn btn-block btn-outline-primary"><a href="login.php"><i class="fas fa-sign-in-alt"></i> Create Account/Login</a> </button>
      </div>
      <?php else: ?>
      <div class="mt-3 col-md-6 offset-md-3">
        <h2>Create class</h2>
        <div class="text-center">
          <?php if (!empty($errors)): ?>
          <div class="alert alert-danger" role="alert">
            <?php var_dump($errors); ?>
            </div>
          <?php endif; ?>
        </div>
        <form class="" action="list.php" method="post" enctype="multipart/form-data">
          <label for="class_name">Class name</label>
         
          <input type="text" name="class_name" placeholder="Class name" value="" class="form-control">
          <hr>
          <label for="contact_info">Contact info</label>
          <input type="text" name="contact_info" placeholder="Contact info" value="" class="form-control">
          <hr>
          <label for="class_type">Class type</label>
          <br>
          <input type="radio" id="" name="class_type" value="martial arts" checked>Martial Arts
          <br>
          <input type="radio" id="" name="class_type" value="talents">Talents
          <br>
          <input type="radio" id="" name="class_type" value="survival skills">Survival Skills
          <br>
          <input type="radio" id="" name="class_type" value="basic skills">Basic Skills
          <br>
          <input type="radio" id="" name="class_type" value="arts">Arts
          <hr>
          <label for="info">Post Content</label>
          <textarea name="info" class="form-control" rows="8" cols="80"></textarea>
          <input type="file" name="video" class="form-control mt-1 mb-1">
          <button type="submit" name="submit" class="btn btn-outline-dark btn-block"> <i class="fas fa-edit"></i> Create Post</button>
       </form>
      </div>
      <?php endif; ?>
  </div>
</div>
<br>
<?php
include 'includes/footer.php';
?>
