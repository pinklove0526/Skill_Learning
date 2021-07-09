<?php
  include 'includes/header.php';
?>

  <div class="login-box jumbotron jumbotron-fluid text-center border border-secondary"  >
    <img src="https://www.skillslearning.org/wp-content/uploads/2021/03/01..png" style="object-fit: contain; width: 100%; height: 100%">
  </div>
  <br>
  <br>
  <div class="container text-center">
    <div class="bg-1" style="
        background-image: url(https://i.pinimg.com/originals/d5/7b/34/d57b3464ca4ac126ff2604ae517c4e96.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        color: #4A7CB5;">
      <div class="row mb-5">
        <div class="info col-md-4 col-lg-4 pr-1">
          <h2>What will you discover?</h2>
          <hr class="underline">
          <h3>Explore new skills, deepen existing passions, and get lost in creativity. What you find just might surprise and inspire you.</h3>
          <?php if($_SESSION['loggedin'] == false): ?>
            <a href="login.php"><button type="button" class="btn btn-info">Log in to learn now!</button></a>
          <?php endif; ?>
        </div>
        <img class="pic col-md-8 col-lg-8" src="https://blog.zoom.us/wp-content/uploads/2020/03/zoom-for-education.jpg" alt="">
      </div>
      <div class="row mb-5">
        <img class="pic col-md-8 col-lg-8" src="https://www.cedefop.europa.eu/files/images/identyfying_skills_needs_360x240.jpg" alt="">
        <div class="info col-md-4 col-lg-4">
          <h2>Membership With Meaning</h2>
          <hr class="underline">
          <h3>With so much to explore, real projects to create, and the support of fellow-creatives, Skillshare empowers you to accomplish real growth.</h3>
          <?php if($_SESSION['loggedin'] == false): ?>
            <a href="login.php"><button type="button" class="btn btn-info">Join to learn new skills</button></a>
          <?php endif; ?>
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
          <a href="login.php"><button type="button" class="btn btn-info">Are you a teacher? Click here to log in & create classroom</button></a>
        </div>
        <img class="pic col-md-8 col-lg-8" src="https://img.freepik.com/free-vector/people-enjoying-their-hobbies-their-places_52683-19472.jpg?size=626&ext=jpg" alt="">
      </div>
      <div class="row mb-5">
        <img class="pic col-md-8 col-lg-8" src="" alt="">
        <div class="info col-md-4 col-lg-4">
          <h2>Learn From Anywhere</h2>
          <hr class="underline">
          <h3>Take classes on the go with the SkillLearning app. Stream or download to watch on the plane, the subway, or wherever you learn best.</h3>
          <a href="#"><button type="button"><img src="https://3.bp.blogspot.com/-mVBpNVlhHlo/XD6BHfCpyEI/AAAAAAAAG4o/a5vWXUp7S5wAjt2DqSTUGBW9H1Mr0Ot-ACK4BGAYYCw/s1600/Icon%2BGoogle%2Bplay.png" style="width:132px;"></button></a>
          <a href="#"><button type="button"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Download_on_the_App_Store_Badge.svg/2560px-Download_on_the_App_Store_Badge.svg.png" style="width:132px;"></button></a>
        </div>
      </div>
  </div>
  </div>

<?php include 'includes/footer.php'; ?>
