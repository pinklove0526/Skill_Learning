<?php
class Classroom {
  public $class_id;
  public $info;
  public $class_name;
  public $user_id;
  public $teacherID;
  public $studentID;
  public $video;
  public $file;
  public $type;
  public $conn;
  public $contact_info;
  public $class_img;
  public $owner_name;
  public $class_type;
  public $enroll;
  //public $student = [];
  public $classroom = [];
  public $classrooms = [];
  public $class = [];
  public $errors = [];

  public function __construct($conn) {
    $this->conn = $conn;
  }
  public function getClassroom() {
    $sql = "SELECT * FROM classroom WHERE class_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->class_name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->class = $results->fetch_assoc();
    }
  }
  public function getClassroomName() {
    $sql = "SELECT * FROM classroom WHERE class_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->class_name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->class = $results->fetch_assoc();
    }
  }
  public function getClassId() {
    $sql = "SELECT * FROM classroom WHERE TeacherID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['teacherID']);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->class = $results->fetch_assoc();
      $this->classroom();
      header("Location: post.php?class_id={$_SESSION['class_id']}");
    }
  }
  public function getClassrooms($classid) {
    $this->user_id = $classid;
    $sql = "SELECT * FROM classroom WHERE class_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->class_id);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows >= 1) {
      $this->classes = $results->fetch_all(MYSQLI_ASSOC);
    }
  }
  public function checkCreateClassroom($class_type, $info, $class_name, $contact_info, $owner_name, $video, &$errors){
    $this->class_type = $class_type;
    $this->info = $info;
    $this->class_name = $class_name;
    $this->contact_info = $contact_info;
    $this->owner_name = $owner_name;
    $this->video = $video;
    $this->errors = $errors;
    $this->getClassroomName();
    if(!empty($this->classroom)){
      $this->errors['create-classroom'] = 'This classname is already taken!';
    }
    if($class_name == '' || $class_type == '' || $info == '') {
      $errors['text'] = "Must fill in all fields!";
    }
    if(empty($this->errors)) {
      $this->createClassroom();
    }
  }
  public function getTeacherId() {
    $sql = "SELECT c.class_id 
            FROM classroom c
            JOIN teacher t ON c.TeacherID = t.TeacherID
            WHERE c.class_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->class_id);
    $stmt->execute();
    $results = $stmt->get_result();
    $this->comment = $results->fetch_assoc();
  }
  public function getStudentId() {
    $sql = "SELECT e.StudentID
            FROM enrolled_classroom e
            JOIN users u on e.StudentID = u.ID
            WHERE e.StudentID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->student = $results->fetch_assoc();
    }
  }
  public function joinClassroom($class_id) {
    //$this->studentID = $studentID;
    $this->class_id = $class_id;
    $sql = "INSERT INTO enrolled_classroom (StudentID, ClassroomID) VALUES (?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $_SESSION['teacherID'], $this->class_id);
    $stmt->execute();
    //var_dump($_SESSION['classroom']);
    if($stmt->affected_rows == 1) {
      $this->getStudentId();
      //$this->classroom();
      header("Location: post.php?success");
    }
  }
  public function createClassroom() {
    $sql = "INSERT INTO classroom (TeacherID, class_type, info, class_name, contact_info, owner_name, video) VALUES (?,?,?,?,?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("issssss", $_SESSION['teacherID'], $this->class_type, $this->info, $this->class_name, $this->contact_info, $this->owner_name, $this->video);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      $this->getClassroomName();
      $this->getTeacherId();
      $this->getStudentId();
      $this->classroom();
      //$this->classroom();
      header("Location: post.php?class_id={$_SESSION['class_id']}");
    }
  }
  public function getClassOwnerName() {
    $sql = "SELECT * FROM classroom WHERE Owner_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->user_name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->user = $results->fetch_assoc();
    }
  }
  public function setClassOwner($owner_name) {
    $this->owner_name = $owner_name;
    $this->getClassOwnerName();
    if($_SESSION['loggedin'] == false) {
      $_SESSION['user_name'] = null;
    }
    if($_SESSION['user_name'] == $_SESSION['owner_name']) {
      $_SESSION['owner'] = true;
    }
    if($_SESSION['user_name'] != $_SESSION['owner_name']) {
      $_SESSION['owner'] = false;
    } 
  }
  public function deleteClass($id) {
    $this->getClassroom($id);
    if($this->class['creator_id'] == $_SESSION['user_id']) {
      $sql = "DELETE FROM classroom WHERE class_id = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $this->class_id);
      $stmt->execute();
    }
  }
  public function classroom () {
    $_SESSION['class_id'] = $this->class['class_id'];
    $_SESSION['class_name'] = $this->class['class_name'];
    $_SESSION['owner_name'] = $this->class['owner_name'];
    $_SESSION['info'] = $this->class['info'];
    $_SESSION['video'] = $this->class['video'];
    $_SESSION['owner'] = true;
    //$_SESSION['enroll'] = $this->class['ClassroomID'];
  }
  public function checkFile($file, $type, &$errors, $maxsize = 524000000) {
    $this->file = $file;
    $this->type = $type;
    $this->errors = $errors;
    $file = $file['video'];
    $fname = $file['name'];
    $ftype = explode("/", $file['type']);
    $tmp_name = $file['tmp_name'];
    $error = $file['error'];
    $fsize = $file['size'];
    if($error == 0) {
      if($fsize > $maxsize) {
        $errors['fsize'] = "The file is too large. Your file must be 5Mb or lower";
      }
      if(empty($errors)) {
        $new_fname = uniqid('', false) . "." . end($ftype);
        $final_path = "videos/" . $new_fname;
        if(move_uploaded_file($tmp_name, $final_path)) {
          return $final_path;
        } else {
          $errors['fmove'] = "There was a problem uploading the file.";
          return false;
        }
      }
    } else {
        $errors['ferror'] = "The was an error with the file.";
      }
    }
  }
?>
