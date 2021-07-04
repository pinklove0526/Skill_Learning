<?php
include 'config.php';
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

		  <select id="item" name="item">
    		<option value="item1">Type 1</option>
    		<option value="item2">Type 2</option>
    		<option value="item3">Type 3</option>
    		<option value="item4">Type 4</option>
          </select>
		  <br><br>
          <label for="body">Class information</label>
          <textarea name="body" class="form-control" rows="8" cols="80"></textarea>
          <input type="file" name="video_file" accept="video/*" class="form-control mt-1 mb-1" value="">
          <button type="submit" name="submit" class="btn btn-outline-dark btn-block"> <i class="fas fa-edit"></i>Create</button>
        </form>
      </div>
  </div>
</div>






<?php
include 'includes/footer.php'
?>
