<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = false;
}
if (!isset($_SESSION['teacher'])) {
  $_SESSION['teacher'] = false;
}
include 'db.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Word fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <title>Skill Learning</title>
</head>

<body>
  <nav class="navbar navbar-dark navbar-expand-sm text-center">
    <a href="index.php" class="logo"><img src="images/placeholderlogo.png" alt=""></a>
    <button class="navbar-toggler collapsed row justify-content-between" type="button" data-toggle="collapse" data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse row justify-content-between" id="navbar-list-2">
      <ul class="navbar-nav text-center">

        <li class="nav-item">
          <a class="nav-link text-white" href="all.php">All</a>
        </li>

        <li class="nav-item dropdown">
          <button class="btn btn-black dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Physical
          </button>
          <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-white" href="MartialArts.php">Martial arts</a>
            <a class="dropdown-item text-white" href="#">Yoga</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <button class="btn btn-black dropdown-toggle text-white" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Brain
          </button>
          <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-white" href="Talents.php">Talents</a>
            <a class="dropdown-item text-white" href="SurvivalSkills.php">Survival skills</a>
            <a class="dropdown-item text-white" href="BasicSkills.php">Basic skills</a>
            <a class="dropdown-item text-white" href="Arts.php">Arts</a>
          </div>
        </li>

        <?php if ($_SESSION['teacher'] == true) : ?>
          <li class="nav-item">
            <a class="nav-link" href="list.php" style="color:white; ">CREATE CLASSROOM</a>
          </li>
        <?php elseif ($_SESSION['teacher'] == false) : ?>
          <li class="nav-item">
            <a class="nav-link" href="list.php" style="color:white; display:none; ">CREATE CLASSROOM</a>
          </li>
        <?php endif; ?>
      </ul>

      <ul class="navbar-nav d-flex justify-content-end">
        <?php if ($_SESSION['loggedin'] == true) : ?>
          <li class="nav-item active">
            <a class="nav-link" href="user.php"><i class="fa fa-user"></i> Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?> <span class="sr-only"></span></a>
          </li>
          <li class="nav-item active logout">
            <a class="nav-link" href="logout.php"><i class="fa fa-door"></i> Logout<span class="sr-only">(current)</span></a>
          </li>
        <?php else : ?>
          <li class="nav-item active login">
            <a class="nav-link" href="signup.php"><i class="fa fa-user"></i> Sign up<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active login">
            <a class="nav-link" href="login.php"><i class="fa fa-user"></i> Login<span class="sr-only">(current)</span></a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>