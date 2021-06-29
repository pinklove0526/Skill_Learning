<?php
function outputPosts($classes) {
  $output = '';
  foreach ($classes as $class) {
    $output.= "
          <a href='#'>
            <div class='card-column col-md-4 col-sm-6'>
                <div class='card text-left'>
                  <img class='card-img-top' src='' alt=''>
                  <div class='card-body'>
                      <a href='#'><h4 class='card-title'>$class['class_name']</h4></a>
                      <p class='card-text'>$class['info']</p>
                  </div>
                </div>
            </div>
          </a>

               ";
  }
  echo $output;
}

?>
