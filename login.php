<?php include 'includes/header.php'; ?>
<style media="screen">
  <?php include 'css/style.css'; ?>
</style>
  <div class="img-responsive">
    <img src="https://live.staticflickr.com/65535/51242402322_7ccea9387b_b.jpg" alt="">
  </div>
  <section>
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
            <form class="signin" action="#" method="">
              <div class="form-group">
                <input class="login-username" type="text" placeholder="Username" name="username" value="">
              </div>
              <div class="form-group">
                <input class="login-username" type="password" placeholder="Password" name="password" value="">
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
