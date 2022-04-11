<?php
include 'includes/header.php';
include 'classes/material.php';
//include 'classes/Classroom.php';
//include 'func/classroomManager.php';
//include 'func/filemanager.php';
var_dump($_SESSION['class_id']);
$errors = [];
if(isset($_POST['create-content'])) {
  $contentInfo = $_POST['content_info'];
  $contentType = $_POST['content_type'];
  $chapter = $_POST['chapter'];
  $content = new material($_SESSION['class_id'], $conn);
  $contentFile = $content->checkFile($_FILES, "content_file", $errors);
  $content->checkCreateContent($contentType, $contentInfo, $contentFile, $chapter, $errors);
}
//var_dump($chapter);
//var_dump($contentInfo);
//var_dump($contentType);
//var_dump($contentFile);
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
        <h2>Post content</h2>
        <div class="text-center">
          <?php if (!empty($errors)): ?>
          <div class="alert alert-danger" role="alert">
            <?php var_dump($errors); ?>
            </div>
          <?php endif; ?>
        </div>
        <form action="editPost.php" method="post" enctype="multipart/form-data">     
          <label for="chapter">Chapters</label>
          <input type="text" name="chapter" placeholder="Your chapter..." value="" class="form-control">
          <br>

          <label for="content_info">Content info</label>
          <textarea name="content_info" class="form-control" placeholder="Content description" rows="8" cols="80"></textarea>
          <input type="file" name="content_file" class="form-control mt-1 mb-1">

          <label for="content_type">Your content type:</label>
          <br>
            <input type="radio" name="content_type" value="material">Material     
            <br> 
            <input type="radio" name="content_type" value="quiz">Quiz

          <button type="submit" name="create-content" class="btn btn-outline-dark btn-block"> <i class="fas fa-edit"></i> Post Quiz</button>
       </form>
      </div>
      <?php endif; ?>
  </div>
</div>
<br>
<?php
include 'includes/footer.php';
?>
