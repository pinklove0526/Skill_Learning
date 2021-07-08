<?php
class Classroom {
  public $class_id;
  public $creator_id;
  public $info;
  public $class_name;
  public $video;
  public $conn;
  public $class_img;
  public $class_type;
  public $classroom = [];
  public $classrooms = [];
  public $errors = [];

  public function __construct($conn) {
    $this->conn = $conn;
  }
  public function getClassroom() {
    $sql = "SELECT * FROM classroom WHERe class_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->class_name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->class = $results->fetch_assoc();
    }
  }
  public function getClassrooms($creator_id) {
    $this->user_id = $creator_id;
    $sql = "SELECT * FROM classroom WHERE creator_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->creator_id);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows >= 1) {
      $this->classes = $results->fetch_all(MYSQLI_ASSOC);
    }
  }
  public function checkCreateClassroom($class_name, $class_type, $info){
    $this->class_name = $class_name;
    $this->class_type = $class_type;
    $this->info = $info;
    $this->getClassroom();
    {
      if(!empty($this->classroom)){
        $this->errors['create-classroom'] = 'This classname is already taken!';
      }
      if($class_name == '' || $class_type == '' || $info == '')
      {
        $errors['text'] = "Must fill in all fields!";
      }
      if(empty($this->errors)){
        $this->createClassroom();
      }
    }
  }
  public function createClassroom() {
    $sql = "INSERT INTO classroom (class_type, info, class_name, class_img, video) VALUES (?,?,?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sssss", $this->class_type, $this->info, $this->class_name, $this->class_img, $this->video);
    $stmt->execute();
  }
  public function deleteClass($id) {
    $this->getClassroom($id);
    if($this->class['creator_id'] == $_SESSION['user_id']) {
      $sql = "DELETE FROM classroom WHERE ID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $this->class_id);
      $stmt->execute();
    }
  }
}
?>
