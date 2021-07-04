<?php
class Classroom {
  public $class_id;
  public $creator_id;
  public $info;
  public $class_name;
  public $video;
  public $conn;
  public $class = [];
  public $classes = [];
  public function __construct($conn) {
    $this->conn = $conn;
  }
  public function getClassroom($id) {
    $this->class_id = $id;
    $sql = "SELECT * FROM classroom WHERE ID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->class_id);
    $stmt->execute();
    $results = $stmt->get_result();
    $this->task = $results->fetch_assoc();
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
  public function createClassroom($info, $video) {
    $this->info = $info;
    $this->video = $video;
    $sql = "INSERT INTO classroom (creator_id, info, class_name, video) VALUES (?,?,?,?)";
    $stmt->bind_param("isss", $_SESSION['user_id'], $this->info, $this->class_name, $this->video);
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
