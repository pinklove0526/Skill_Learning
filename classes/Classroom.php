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
  public function checkCreateClassroom($class_name, $class_type, $class_img, $info, $video){
    $this->class_name = $class_name;
    $this->class_type = $class_type;
    $this->class_img = $class_img;
    $this->info = $info;
    $this->video = $video;
    $this->getClassroom();
    {
      if(!empty($this->classroom)){
        $this->errors['create-classroom'] = 'This classname is already taken!';
      }
      if(empty($this->class_name)){
        $this->errors['create_classroom_classname'] = "Class must have a name!";
      }
      if(empty($this->info)){
        $this->errors['create_classroom_info'] = "Class must have info";
      }
      if(strlen($this->class_img)<1){
        $this->errors['create_classroom_classimg'] = "Class must have image";
      }
      if(strlen($this->video) < 1){
        $this->errors['create_classroom_video'] = "Class must have video";
      }
      if(empty($this->errors)){
        $this->createClassroom();
      }
    }
  }
  public function createClassroom() {
    $sql = "INSERT INTO classroom (creator_id, class_type, info, class_name, class_img, video) VALUES (?,?,?,?,?,?)";
    $stmt->bind_param("isssss", $_SESSION['user_id'], $this->class_type, $this->info, $this->class_name, $this->class_img, $this->video);
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
