<?php
  include 'includes/header.php';
  include 'classes/Classroom.php';
  include 'func/classroomManager.php';
?>
<style media="screen">
  <?php include 'css/style.css'; ?>
</style>
<div class="container-fluid">
  <div class="img-fluid">
    <img src="http://1.bp.blogspot.com/-aoLpZCDVDnA/VHrOvTNl0AI/AAAAAAAAEOk/dC9KbX1MBcw/s1600/NATURAL%2BLANDSCAPE.jpg" class="w-100" alt="">
  </div>
  <!-- <?php if($_SESSION['loggedin'] == true): ?>
    <h2 style="text-align: center;
    margin: auto;">
    Welcome aboard!</h2>
    <h3>Hope u'll have a nice day</h3>
    <h3>And take care of yourself from the COVID-19!</h3>
  <?php endif; ?> -->
</div>
    <div class="container text-center mt-3 background-bg">
      <h3>These are some classrooms:</h3>
      <br>
      <div class="row">
        <?php
        $classrooms = getClassrooms(100, $conn);
        outputClassrooms($classrooms);
         ?>
        <br>
      </div>
      <br>
    </div>
<?php include 'includes/footer.php'; ?>
