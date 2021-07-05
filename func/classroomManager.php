<?php

function checkClassroom($class_name, $class_type, $class_img, $info, $video, &$errors){
  if($class_name == '' || $class_type == '' || $class_img == '' || $info == '' || $video == ''){
    $errors['text'] = "You must fill in all fields!";
  }
}

function createClassroom($class_name, $class_type, $class_img, $info, $video, $conn) {
  $sql = "INSERT INTO classrooms (class_name, class_type, class_img, info, video) VALUES (?,?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $class_name, $class_type, $class_img, $info, $video);
  $stmt->execute();
  if($stmt->affected_rows == 1) {
    // redirect user to the classmate they created
    $location = "Location: classroom.php?id=" . $stmt->insert_id . "&created=true";
    header($location);
  }
}

function outputClasses($classes) {
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
          </a>";
  }
  echo $output;
}

?>
