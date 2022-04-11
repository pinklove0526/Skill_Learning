<?php
class material {
    public $contentID;
    public $classID;
    public $studentID;
    public $contentType;
    public $material;
    public $contentInfo;
    public $contentFile;
    public $chapter;
    public $contents = [];
    public $content = [];
    public $score;
    public $scores = [];
    public $conn;
    public $errors = [];
    public function __construct($class_id, $conn) {
        $this->classID = $class_id;
        $this->conn = $conn;
      }
    public function getContent() {
      $sql = "SELECT * FROM material WHERE ClassroomID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $this->classID);
      $stmt->execute();
      $results = $stmt->get_result();
      if($results->num_rows == 1) {
        $this->content = $results->fetch_assoc();
      }
    }
    public function getContents() {
      $sql = "SELECT * FROM material WHERE ClassroomID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $_SESSION['class_id']);
      $stmt->execute();
      $results = $stmt->get_result();
      if($results->num_rows == 1) {
        $this->contents = $results->fetch_all(MYSQLI_ASSOC);
      }
    }
    public function checkCreateContent($contentType, $contentInfo, $contentFile, $chapter, &$errors) {
      $this->contentType = $contentType;
      $this->contentInfo = $contentInfo;
      $this->contentFile = $contentFile;
      $this->chapter = $chapter;
      $this->errors = $errors;
      $this->getContent();
      if($this->contentType == '' || $this->contentInfo == '' || $this->contentFile == '' || $this->chapter == null) {
        $errors['text'] = "Must fill in all fields";
      }
      if(empty($this->errors)) {
        $this->createContent();
      }
    }
    public function createContent() {
      $sql = "INSERT INTO material (ClassroomID, ContentType, ContentInfo, ContentName, Chapter) VALUES (?,?,?,?,?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("isssi", $_SESSION['class_id'], $this->contentType, $this->contentInfo, $this->contentFile, $this->chapter);
      $stmt->execute();
      if($stmt->affected_rows == 1) {
        $this->getContent();
        header("Location: post.php?class_id={$_SESSION['class_id']}");
      }
    }
    public function outputContents() {
      //$this->getContents();
      $output = "";
      foreach($this->contents as $contentOut) {
        //$conn = @ new mysqli("localhost","root","","skillshare");
        $output .= "<div class='mt-2 mb-2'>
                      <a href='content/{$contentOut['ContentName']}' download>{$contentOut['ContentName']}</a>
                    </div>";
      }
      echo $output;
    }
    public function checkFile($file, $type, &$errors, $maxsize = 524000000) {
      $this->file = $file;
      $this->type = $type;
      $this->errors = $errors;
      $file = $file['content_file'];
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
          //$new_fname = uniqid('', false) . "." . end($ftype);
          $new_fname = $fname;
          $final_path = "content/" . $new_fname;
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