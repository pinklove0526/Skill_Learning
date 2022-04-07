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
        $this->conn = $conn;
      }
}

?>