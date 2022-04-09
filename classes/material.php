<?php
class material {
    public $contentID;
    public $classID;
    public $studentID;
    public $contentType;
    public $contentInfo;
    public $contentName;
    public $chapter;
    public $score = [];
    public $scores = [];
    public $conn;
    public $errors = [];
    public function __construct($conn) {
        $this->conn = $conn;      }


    public function getMaterial() {
      $sql = "SELECT * FROM 'material/quiz' WHERE ContentID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("s", $this->contentName);
      $stmt->execute();
      $results = $stmt->get_result();
      if($results->num_rows == 1) {
        $this->class = $results->fetch_assoc();
      }
    }
     public function getMaterials($contentID) {
      this->contentID = $contentID;
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $this->contentID);
      $stmt->execute();
      $results = $stmt->get_result();
      if($results->num_rows == 1) {
        $this->class = $results->fetch_assoc();
      }
    }
  }
?>