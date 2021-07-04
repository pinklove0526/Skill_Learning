<?php
include 'includes/header.php';
include 'classes/User.php';
if(isset($_POST['login'])) {
  $user_name = $_POST['username'];
  $user_password = $_POST['password'];
  $user = new User($conn);
  $user->checkLogin($user_name, $user_password);
  $errors = $user->errors;
}
?>
<style media="screen">
  <?php include 'css/style.css'; ?>
</style>
  <section>
    <div class="img-responsive">
      <img src="https://live.staticflickr.com/65535/51242402322_7ccea9387b_b.jpg" alt="">
    </div>
    <div class="text-center">
      <?php if (isset($errors) && !empty($errors)): ?>
     <div class="alert alert-danger" role="alert">
       <?php foreach ($errors as $error): ?>
         <?php echo $error . "</br>"; ?>
       <?php endforeach; ?>
     </div>
   <?php endif; ?>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="display-2 text-light">Login</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap p-0">
            <h3 class="mb-4 text-center text-light">Have an account?</h3>
            <form class="" action="login.php" method="post">
              <div class="form-group">
                <input class="login-username" type="text" placeholder="Username" name="username" value="<?php if(isset($name)) {echo htmlspecialchars($name);} ?>">
                <p class="text-danger error"></p>
              </div>
              <div class="form-group">
                <input class="login-username" type="password" placeholder="Password" name="password" value="">
                <p class="error"><?php if(isset($errors['login_password'])) {echo $errors['login_password'];} ?></p>
              </div>
              <div class="form-group">
                <button class="form-control btn btn-success" type="submit" name="login">SIGN IN</button>
              </div>
              <div class="form-group text-center">
                <div class="w-50">
                  <label class="checkbox-wrap checkbox-primary text-light" for="">Remember me
                    <input type="checkbox" checked="">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="w-50">
                  <a href="#" class="text-light">Forgot Password</a>
                </div>
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
