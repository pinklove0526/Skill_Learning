<?php
include 'includes/header.php';
include 'classes/Classroom.php';
if(isset($_POST['create_classroom'])) {
  $class_name = $_POST['class_name'];
  $class_type = $_POST['class_type'];
  $info = $_POST['info'];
  if (!isset($_POST['video']))
  {
    $_POST['video'] = '';
  }
  $video = $_POST['video'];
  if (!isset($_POST['class_img']))
  {
    $_POST['class_img'] = '';
  }
  $class_img = $_POST['class_img'];
  $classroom = new Classroom($conn);
  $classroom->checkCreateClassroom($class_name, $class_type, $class_img, $info, $video);
  $errors = $classroom->errors;
  var_dump($_POST);
}
?>
<div class="container">
  <div class="row">
      <div class="mt-3 col-md-6 offset-md-3">
        <h2>Create class</h2>
        <div class="text-center">
          <?php if (isset($errors) && !empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $error): ?>
              <?php echo $error . "</br>"; ?>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <form class="" action="list.php" method="post" enctype="multipart/form-data">
          <label for="class_name">Class name</label>
          <input type="text" name="class_name" placeholder="Class name" value="" class="form-control">
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
          <label for="info">Class information</label>
          <textarea name="info" class="form-control" rows="8" cols="80"></textarea>
          <hr>
          <label for="class_img">Class Img</label>
          <input type="file" name="class_img" class="form-control mt-1 mb-1">
          <hr>
          <label for="video">Video Ad</label>
          <input type="file" name="video" accept="video/*" class="form-control mt-1 mb-1" value="">
          <hr>
          <button type="submit" name="create_classroom" class="btn btn-outline-dark btn-block"> <i class="fas fa-edit"></i>Create</button>
        </form>
      </div>
  </div>
</div>
<br>





<?php
include 'includes/footer.php'
?>
