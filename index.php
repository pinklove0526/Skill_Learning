<?php
  include 'includes/header.php';
?>

  <div class="login-box jumbotron jumbotron-fluid text-center border border-secondary" style="background-image: url(https://www.skillslearning.org/wp-content/uploads/2021/03/01..png);
  background-repeat: no-repeat;
  background-size: cover;
  object-fit: cover;">
  <?php if($_SESSION['loggedin'] == false): ?>
    <h2>Explore your activity</h2>
    <h3>Get started for free</h3>
    <a href="#">Continue with Facebook</a><br>
    <a href="#">Continue with Google</a>
    <h4>or</h4>
    <a href="#">Sign up here</a>
  <?php else: ?>
    <h2 style="text-align: center;
    margin: auto;">
    Welcome aboard!</h2>
    <h3>Hope u'll have a nice day</h3>
    <h3>And take care of urself from the COVID-19!</h3>
  <?php endif; ?>
  </div>
  <br>
  <br>
  <div class="container">
    <div class="bg-1" style="
        background-image: url(https://i.pinimg.com/originals/d5/7b/34/d57b3464ca4ac126ff2604ae517c4e96.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        color: #4A7CB5;">
      <div class="row mb-5">
        <div class="info col-md-4 col-lg-4">
          <h2>What will you discover?</h2>
          <hr class="underline">
          <h3>Explore new skills, deepen existing passions, and get lost in creativity. What you find just might surprise and inspire you.</h3>
          <a href="login.php"><button type="button" class="btn btn-info">Log in to learn now!</button></a>
        </div>
        <img class="pic col-md-8 col-lg-8" src="https://blog.zoom.us/wp-content/uploads/2020/03/zoom-for-education.jpg" alt="">
      </div>
      <div class="row mb-5">
        <img class="pic col-md-8 col-lg-8" src="https://www.cedefop.europa.eu/files/images/identyfying_skills_needs_360x240.jpg" alt="">
        <div class="info col-md-4 col-lg-4">
          <h2>Membership With Meaning</h2>
          <hr class="underline">
          <h3>With so much to explore, real projects to create, and the support of fellow-creatives, Skillshare empowers you to accomplish real growth.</h3>
          <a href="login.php"><button type="button" class="btn btn-info">Join to learn new skills</button></a>
        </div>
      </div>
  </div>
  <div class="bg-2" style="
      color: white;
      background-image: url(https://cdn.pixabay.com/photo/2018/08/14/13/23/ocean-3605547__480.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      color: #e88aff;">
      <div class="row mb-5">
        <div class="info col-md-4 col-lg-4">
          <h2>Classes Designed For Real Life</h2>
          <hr class="underline">
          <h3>Move your creative journey forward without putting life on hold. Skillshare helps you find inspiration that fits your routine.</h3>
          <a href="login.php"><button type="button" class="btn btn-info">Are you a teacher? Click here to create classroom</button></a>
        </div>
        <img class="pic col-md-8 col-lg-8" src="https://img.freepik.com/free-vector/people-enjoying-their-hobbies-their-places_52683-19472.jpg?size=626&ext=jpg" alt="">
      </div>
      <div class="row mb-5">
        <img class="pic col-md-8 col-lg-8" src="" alt="">
        <div class="info col-md-4 col-lg-4">
          <h2>Learn From Anywhere</h2>
          <hr class="underline">
          <h3>Take classes on the go with the Skillshare app. Stream or download to watch on the plane, the subway, or wherever you learn best.</h3>
          <button type="button" class="btn btn-info col-md-5"><i class="fab fa-apple"></i> IOS</button>
          <button type="button" class="btn btn-info col-md-5"><i class="fab fa-google-play"></i> Android</button>
        </div>
      </div>
  </div>
  </div>

<?php include 'includes/footer.php'; ?>
