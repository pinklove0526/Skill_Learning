<?php

include 'includes/header.php';
?>
<div class="container">
  <div class="row">
      <div class="mt-3 col-md-6 offset-md-3">
        <?php if (!empty($errors)): ?>
          <div class="alert alert-danger" role="alert">
            <?php var_dump($errors); ?>
          </div>
        <?php endif; ?>
        <h2>Create class</h2>
        <form class="" action="#" method="post" enctype="multipart/form-data">
          <label for="title">Class name</label>
          <input type="text" name="title" placeholder="Class name" value="" class="form-control">
		  <br>
		  <label for="type">Class type</label>
       <br>
       <input type="radio" id="type1" name="type1" value="1">
       <label for="type1">Type 1</label><br>
       <input type="radio" id="type2" name="type2" value="2">
       <label for="type2">Type 2</label><br>  
       <input type="radio" id="type3" name="type3" value="3">
       <label for="type3">Type 3</label>

		  <br><br>
          <label for="body">Class information</label>
          <textarea name="body" class="form-control" rows="8" cols="80"></textarea>
          <input type="file" name="video_file" accept="video/*" class="form-control mt-1 mb-1" value="">
          <button type="submit" name="submit" class="btn btn-outline-dark btn-block"> <i class="fas fa-edit"></i>Create</button>
        </form>
      </div>
  </div>
</div>
<br>





<?php
include 'includes/footer.php'
?>
