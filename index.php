<?php
  include 'includes/header.php';
?>
<style media="screen">
  <?php include 'css/style.css'; ?>
</style>
  <div class="login-box jumbotron jumbotron-fluid text-center border border-secondary" style="padding-bottom: 0px;">
  </div>
  <div class="container">
    <div class="search w-100">
        <form method="post" class="d-flex">
          <input type="text" class="w-100" name="search" placeholder="Search..">
          <button class="btn btn-dark text-center" type="submit" name="submit"><i class="fas fa-search"></i></button>
        </form>

        <?php

$con = new PDO("mysql:host=localhost;dbname=skillshare",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `classroom` WHERE class_name like '%$str%'");
	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
				<h1><?php echo $row->class_name; ?></h1>
        <p></p>
        <video width="320" height="240" controls>
          <source src="<?php echo $row->video; ?>" type="video/mp4">
        </video>
<?php 
	}
		else{
			echo "Name Does not exist";
		}
}
?>
    </div>
  </div>
  <div class="text">
    <h1 class="text-center mb-2 display-3">DISCOVER LIFE LONG LEARNING</h1>
    <hr class="mb-4">
  </div>
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Slides-->
  <div class="carousel-inner lrpadding" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
      <div class="col-md-3" style="float:left">
       <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary" href="outsideClassroom.php">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>
      
       <div class="col-md-3" style="float:left">
       <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">
      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>
      
      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

    </div>
    <!--/.Second slide-->
  </div>
  <a class="carousel-control-prev btn btn-primary manual_btn" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
  <a class="carousel-control-next btn btn-primary manual_btn" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
  <!--/.Slides-->
</div>
<!--  <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://png.pngtree.com/thumb_back/fh260/background/20190827/pngtree-trendy-80s-abstract-geometric-background-image_304909.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h1 class="display-3">Journal for gratitude</h1>
        <p>Make a commitment to your self-care and growth with self-healing advocate Yasmine Cheyenne.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://image.freepik.com/free-vector/geometric-background-memphis-style_52683-35346.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h1 class="display-3">Make illustration your career</h1>
        <p>Transform your artwork into products with illustrator Alicia Souza.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://img.freepik.com/free-vector/elegant-dark-background-with-golden-details_23-2148413120.jpg?size=626&ext=jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h1 class="display-3">Introducing Chroma courses</h1>
        <p>Accelerate your progress with new multi-week, immersive small group courses.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div> -->
<div class="second-content">
  <div class="row">
  <div class="col-md-6">
    <div class="text">
    <h1>What will you obtain?</h1>
    <hr>
    <h4>Knowledges that will make your life more easier or inspirations that can motivate you</h4>
    <button class="btn btn-dark mt-3"><a href="all.php">Learn now!</a></button>
    </div>
  </div>
  <div class="col-md-6">
    <img src="images/Capture.PNG" alt="">
  </div>
</div>
</div>
<div class="second-content">
  <div class="row">
  <div class="col-md-6">
    <img src="https://cdn.vietnambiz.vn/171464876016439296/2020/6/3/gettyimages-1215704164-1591179886209722498072.jpg" alt="">
  </div>
  <div class="col-md-6">
    <div class="text">
    <h1>Making new friends along the way</h1>
    <hr>
    <h4>Having friends that have similarities with you and improving each other's skills</h4>
    <button class="btn btn-dark mt-3"><a href="all.php">Click here!</a></button>
    </div>
  </div>
</div>
</div>
<div class="second-content">
  <div class="row">
  <div class="col-md-6">
    <div class="text">
    <h1>Help our community grow</h1>
    <hr>
    <h4>By participating with us and help each other out to develop skills and unlock hidden talents</h4>
    <button class="btn btn-dark mt-3"><a href="all.php">Join now!</a></button>
    </div>
  </div>
  <div class="col-md-6">
    <img src="https://d1j8r0kxyu9tj8.cloudfront.net/images/15712137924vBfm6fnzTnYYZk.jpg" alt="">
  </div>
</div>
</div>
<div class="text-center">
      <h1 class="p-3 display-3">Classes taught by real creators</h1>
      <hr>
      <h3>They are experts and they are excited to share their wisdom and skills with you</h3>
      <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Slides-->
  <div class="carousel-inner lrpadding" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
      <div class="col-md-3" style="float:left">
       <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary" href="outsideClassroom.php">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>
      
       <div class="col-md-3" style="float:left">
       <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">
      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>
      
      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

    </div>
    <!--/.Second slide-->
  </div>
  <a class="carousel-control-prev btn btn-primary manual_btn" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
  <a class="carousel-control-next btn btn-primary manual_btn" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
  <!--/.Slides-->
</div>
  </div>
<?php include 'includes/footer.php'; ?>
