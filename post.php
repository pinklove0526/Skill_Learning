<?php
  include 'includes/header.php';
  include 'func/classroomManager.php';
  include 'classes/Classroom.php';
  include 'classes/User.php';
  //var_dump($_SESSION['teacherID']);
  //var_dump($_SESSION['class_name']);
  //var_dump($_SESSION['enroll']);
  //$_SESSION['teacher'] = false;
  if(isset($_GET['class_id'])) {
    $classroom = new Classroom($conn);
    $classes = getClassroom($_GET['class_id'], $conn);
    $_SESSION['owner_name'] = $classes['owner_name'];
    $_SESSION['class_id'] = $classes['class_id'];
    $_SESSION['video'] = $classes['video'];
    $_SESSION['info'] = $classes['info'];
    $_SESSION['class_name'] = $classes['class_name'];
    $owner = $_SESSION['owner_name'];
    $classroom->setClassOwner($owner);
  }
  //if(isset($_POST['join-class'])) {
  //  //$student = new User($conn);
  //  $classJoin = new Classroom($conn);
  //  $classJoin->joinClassroom($classroom['class_id']);
  //  //$student->teacher();
  //}
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
     <h3>Rating: </h3>
     <div class="rate">
    
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star5" name="rate" value="6" />
    <label for="star6" title="text">6 stars</label>
    <input type="radio" id="star5" name="rate" value="7" />
    <label for="star7" title="text">7 stars</label>
    <input type="radio" id="star5" name="rate" value="8" />
    <label for="star8" title="text">8 stars</label>
    <input type="radio" id="star5" name="rate" value="9" />
    <label for="star9" title="text">9 stars</label>
    <input type="radio" id="star5" name="rate" value="10" />
    <label for="star10" title="text">10 stars</label>
  </div>
  <br>
  <br>
    <h3>Comment: </h3>
    <textarea name="" id="" cols="30" rows="8" class="w-100" placeholder="Leave your comments here..."></textarea>
    <button class="btn btn-dark comment mb-3" type="submit" name="post">Post</button>
  </div>
  </div>
<?php include 'includes/footer.php'; ?>















<style>
  *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}


  </style>