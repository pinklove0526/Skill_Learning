<?php
  include 'includes/header.php';
  include 'func/classroomManager.php';
  include 'classes/Classroom.php';
  include 'classes/Rating.php';
  include 'func/accountmanager.php';
  include 'classes/Comment.php';
  include 'classes/User.php';
  if(isset($_GET['class_id'])) {
    $classroom = new Classroom($conn);
    $theid = $_GET['class_id'];
    $classes = getClassroom($_GET['class_id'], $conn);
    $_SESSION['owner_name'] = $classes['owner_name'];
    $_SESSION['class_id'] = $classes['class_id'];
    $_SESSION['video'] = $classes['video'];
    $_SESSION['info'] = $classes['info'];
    $_SESSION['class_name'] = $classes['class_name'];
    $owner = $_SESSION['owner_name'];
    $classroom->setClassOwner($owner);


    $comments = new Comment($theid, $conn);
    $comments->getComments();
    $ratings = new Rating($theid, $conn);
    $ratings->getRatings();
    //$teacher->owner();
  }
  //if(isset($_POST['join-class'])) {
  //  //$student = new User($conn);
  //  $classJoin = new Classroom($conn);
  //  $classJoin->joinClassroom($classroom['class_id']);
  //  //$student->teacher();
  //}
  
  if(isset($_POST['comment'])) {
    $user_id = $_SESSION['user_id'];
    $classroom_id = (int)$_GET['id'];
    $body = $_POST['body'];

    $comment = new Comment($classroom_id, $conn);
    $comment->createComment($user_id,$classroom_id,$body);

    // var_dump($_SESSION['user_id']);
    // var_dump($classroom_id);
    // var_dump($body);
  }




  if(isset($_POST['rate'])) {
    $class_id = (int)$_GET['id'];
    $student_id = $_SESSION['user_id'];
    $score = $_POST['score'];
    $ratings = new Rating($class_id, $conn);
    $ratings->createRating($class_id, $student_id, $score);
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
      <?php if ($_SESSION['loggedin'] == true && $_SESSION['teacher'] == false && $_SESSION['owner'] == false):?>
        <div class="button_join">
          <form action="post.php" method="post">
            <button class="btn btn-danger" type="button" name="join-class">Join</button>
          </form>
        </div>
      <?php elseif ($_SESSION['loggedin'] == true && $_SESSION['teacher'] == true && $_SESSION['owner'] == true):?>
        <div class="button_join">
          <a class="btn btn-danger" href="">Edit</a>
        </div>
      <?php elseif ($_SESSION['loggedin'] == true && $_SESSION['teacher'] == true && $_SESSION['owner'] == false):?>
        <div class="button_join">
          <a class="btn btn-danger" href="" style="display: none;">Edit</a>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-6 class_info">
      <div class="rect">
        <h2><?php echo htmlspecialchars($_SESSION['class_name']) ?></h2>
        <h5>By: <?php echo htmlspecialchars($_SESSION['owner_name']) ?></h5>
        <hr>
        <h4>Description</h4>
        <!-- <h5>Number of students</h5> -->
        <p><?php echo htmlspecialchars($_SESSION['info']) ?></p>
      </div>
    </div>
  </div>
  <div class="container">
    <h3>Lesson:</h3>
    <div class="rect">
        <hr>
    </div>
    <div class="container post">
     <?php if ($_SESSION['class_id'] == null): ?>
       <h2 class="display-4">404 Post Not Found!</h2>
     <?php else: ?>
          <?php
          $output="<video width='100%' controls>
                    <source src='{$_SESSION['video']}' type='video/mp4'>
                  </video>";
          echo $output;
          ?>
       </div>
     </div> <!-- end of post row -->
     <?php endif; ?>
     <div class="container">
     <h3>Rating: <?php echo $ratings->avgRating(); ?></h3>
    <form class="rate" action="#" method="POST">
    <input type="radio" id="star1" name="score" value="1" />
    <label for="score" title="text">1 </label>
    <input type="radio" id="star2" name="score" value="2" />
    <label for="score" title="text">2 </label>
    <input type="radio" id="star3" name="score" value="3" />
    <label for="score" title="text">3 </label>
    <input type="radio" id="star4" name="score" value="4" />
    <label for="score" title="text">4 </label>
    <input type="radio" id="star5" name="score" value="5" />
    <label for="score" title="text">5 </label>
    <input type="radio" id="star6" name="score" value="6" />
    <label for="score" title="text">6 </label>
    <input type="radio" id="star7" name="score" value="7" />
    <label for="score" title="text">7 </label>
    <input type="radio" id="star8" name="score" value="8" />
    <label for="score" title="text">8 </label>
    <input type="radio" id="star9" name="score" value="9" />
    <label for="score" title="text">9 </label>
    <input type="radio" id="star10" name="score" value="10" />
    <label for="score" title="text">10 </label>
    <br>
    <button class="btn btn-dark comment mb-3" type="submit" name="rate">Rate</button>
    </form>
  <br>
  <br>
    <h3>Comment: </h3>
    <?php if ($_SESSION['loggedin']): ?>
        <form class="class-form" method="POST" action="#">
          <textarea name="body" id="body" cols="30" rows="8" class="w-100" placeholder="Leave your comments here..."></textarea>
          <input type="hidden" name="id" value=<?php echo htmlspecialchars($_SERVER['QUERY_STRING']); ?>>
          <button class="btn btn-dark comment mb-3" type="submit" name="comment" id="comment">Comment</button>
        </form>
        <?php else: ?>
          <h3>Please login to comment!</h3>
          <a href="login.php"><button type="button" class="btn btn-primary btn-lg">Login</button></a>
        <?php endif; ?>
        <div class="row comments">
          <?php $comments->outputComments(); ?>
        </div>
  </div>
<?php include 'includes/footer.php'; ?>

