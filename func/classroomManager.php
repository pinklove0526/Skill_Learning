<?php

function checkClassroom($class_name, $class_type,  $info, &$errors){
  if($class_name == '' || $class_type == '' ||  $info == '' ){
    $errors['text'] = "You must fill in all fields!";
  }
}

function createClassroom($class_name, $class_type, $info, $video_path, $conn) {
  $sql = "INSERT INTO classroom (creator_id, class_name, class_type, info, video) VALUES (?,?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("issss",$_SESSION['user_id'], $class_name, $class_type, $info, $video);
  $stmt->execute();
  if($stmt->affected_rows == 1) {
    // redirect user to the classmate they created
    $location = "Location: all.php?success";
    header($location);
  }
}

// function createPost($title, $body, $img_path, $conn) {
//   $sql = "INSERT INTO posts (post_title, post_body, post_author, post_img) VALUES (?,?,?,?)";
//   $stmt = $conn->prepare($sql);
//   $stmt->bind_param("ssis", $title, $body, $_SESSION['user_id'], $img_path);
//   $stmt->execute();
//   if($stmt->affected_rows == 1) {
//     // redirect user to the post they created
//     $location = "Location: post.php?id=" . $stmt->insert_id . "&created=true";
//     header($location);
//   }
// }

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
    $output.= "<div class='col-md-4 p-3'>
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

?>
