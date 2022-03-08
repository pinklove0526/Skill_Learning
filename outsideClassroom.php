<?php
  include 'includes/header.php';
?>
<style media="screen">
  <?php include 'css/style.css'; ?>
</style>
  <div class="container d-flex mb-5">
      <div class="search bg-light w-100">
        <form action="" class="d-flex">
          <input type="text" class="w-100" name="search" placeholder="Search..">
          <button class="btn btn-dark text-center" type="submit"><i class="fas fa-search"></i></button>
        </form> 
      </div>
        <!-- <div class="search_icon">
            <button class="btn btn-dark text-center">
                <i class="fas fa-search"></i>
            </button>
        </div> -->
  </div>
  <div class="container mb-5 d-flex">
    <div class="col-md-3 class_icon">
      <div class="circle bg-dark">
        <i class="fas fa-user"></i>
      </div>
      <div class="rect mt-3">
        <h5>Number of students</h5>
      </div>
    </div>
    <div class="col-md-6 class_info">
      <div class="rect">
        <h2>Classname</h2>
        <hr>
        <h4>Creator name</h4>
        <!-- <h5>Number of students</h5> -->
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia at consequuntur cum sapiente nihil ut ipsa dolor dolorem alias ad sint quae enim totam exercitationem fugiat aliquam nesciunt, iusto error!</p>
      </div>
    </div>
  </div>
  <div class="container">
    <h3>Rating: 10/10</h3>
    <textarea name="" id="" cols="30" rows="8" class="w-100" placeholder="Leave your comments here..."></textarea>
    <button class="btn btn-dark comment mb-3" type="submit">Post</button>
  </div>
<?php include 'includes/footer.php'; ?>