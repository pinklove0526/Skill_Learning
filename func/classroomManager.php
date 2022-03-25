<?php

function checkClassroom($class_name, $class_type,  $info, &$errors){
  if($class_name == '' || $class_type == '' ||  $info == '' ){
    $errors['text'] = "You must fill in all fields!";
  }
}

function createClassroom($class_name, $class_type, $info, $video_path, $conn) {
  $sql = "INSERT INTO classroom (class_name, class_type, info, video) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $class_name, $class_type, $info, $video_path);
  $stmt->execute();
  if($stmt->affected_rows == 1) {
    // redirect user to the classmate they created
    $location = "Location: all.php?success";
    header($location);
  }
}

function getClassroom($id, $conn) {
  $sql = "SELECT * FROM classroom WHERE class_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows == 1) {
    return $result->fetch_assoc();
  } else {
    return false;
  }
}

function getClassrooms($limit, $conn, $offset = 0) {
  $sql = "SELECT * FROM classroom LIMIT ?,?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $offset, $limit);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_all(MYSQLI_ASSOC);
}

function outputClassrooms($classrooms) {
  $output = '';
  foreach ($classrooms as $classroom) {
    $output.= "<div class='col-md-4 p-3 '>
                  <div class='card text-center rounded' style='border-radius: 20px; border-color: grey; '>
                <h3><a href='post.php?id={$classroom['class_id']}'>
               {$classroom['class_name']}</a></h3>
                <p>{$classroom['info']}</p>
                <video width='360' height='200' controls>
                  <source src='{$classroom['video']}' type='video/mp4'>
                </video>
                  </div>
               </div>";
  }
  echo $output;
}
function outputIndexClassrooms($classrooms) {
  $output = '';
  foreach($classrooms as $classroom) {
    $output.= "<div class='col-md-3' style='float:left'>
                <div class='card mb-2'>
                  <img class='card-img-top' src='https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg' alt='Card image cap'>
                  <div class='card-body'>
                    <h4 class='card-title'>{$classroom['class_name']}</h4>
                    <p class='card-text'>{$classroom['info']}</p>
                    <a class='btn btn-primary' href='post.php?id={$classroom['class_id']}'>View</a>
                  </div>
                </div>
              </div>";
  }
  echo $output;
}
function getMartialArts($limit, $conn, $offset = 0)
{
  $sql = "SELECT * FROM classroom WHERE class_type = 'martial arts' LIMIT ?, ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $offset, $limit);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_all(MYSQLI_ASSOC);
}

function getTalents($limit, $conn, $offset = 0)
{
  $sql = "SELECT * FROM classroom WHERE class_type = 'talents' LIMIT ?, ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $offset, $limit);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_all(MYSQLI_ASSOC);
}

function getSurvivalSkills($limit, $conn, $offset = 0)
{
  $sql = "SELECT * FROM classroom WHERE class_type = 'survival skills' LIMIT ?, ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $offset, $limit);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_all(MYSQLI_ASSOC);
}

function getBasicSkills($limit, $conn, $offset = 0)
{
  $sql = "SELECT * FROM classroom WHERE class_type = 'basic skills' LIMIT ?, ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $offset, $limit);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_all(MYSQLI_ASSOC);
}

function getArts($limit, $conn, $offset = 0)
{
  $sql = "SELECT * FROM classroom WHERE class_type = 'arts' LIMIT ?, ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $offset, $limit);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_all(MYSQLI_ASSOC);
}

?>
