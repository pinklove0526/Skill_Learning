<?php
  include 'config.php';
  include 'func/accountmanager.php';
  include 'includes/header.php';
?>
<style media="screen">
  <?php include 'css/style.css'; ?>
</style>
<div class="img-responsive">
  <img src="https://i.natgeofe.com/n/8022bf25-d5ef-48c1-b460-dbac1448e122/09-9226610_uploadsmember665562yourshot-665562-9226610jpg_igdjhxksrjifxjzu4rgbsw37bhp3eflutfvvbpyjwjhzlmh4iziq_3000x2000.jpg" alt="">
</div>
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-5">
        <h2 class="display-2 text-light">Create a new account</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="login-wrap p-0">
          <h3 class="mb-4 text-center text-light">Join us</h3>
          <form class="" action="login.php" method="post">
            <div class="form-group">
              <input class="login-username" type="text" placeholder="Username" name="username" value="<?php if(isset($username)) {echo htmlspecialchars($username);} ?>">
              <p class="error"><?php if(isset($errors['create_username'])) {echo $errors['create_username'];} ?></p>
            </div>
            <div class="form-group">
              <input class="login-username" type="email" placeholder="Email" name="email" value="<?php if(isset($email)) {echo htmlspecialchars($email);} ?>">
              <p class="error"><?php if(isset($errors['create_email'])) {echo $errors['create_email'];} ?></p>
            </div>
            <div class="form-group">
              <input class="login-username" type="password" placeholder="Password" name="password1" value="">
            </div>
            <div class="form-group">
              <input class="login-username" type="password" placeholder="Confirm Password" name="password2" value="">
              <p class="error"><?php if(isset($errors['create_password'])) {echo $errors['create_password'];} ?></p>
            </div>
            <div class="form-group">
              <button class="form-control btn btn-success" type="submit" name="create">CREATE ACCOUNT</button>
            </div>
          </form>
          <p class="w-100 text-center text-light">Or sign in with</p>
          <div class="social text-center">
            <a href="#"><i class="fab fa-facebook p-3 display-4"></i></a>
            <a href="#"><i class="fab fa-twitter p-3 display-4"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
