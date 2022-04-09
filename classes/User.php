<?php
class User{
  public $user_id;
  public $user_name;
  public $owner_name;
  public $teacherID;
  public $studentID;
  public $user_email;
  public $user_hash;
  public $user_type;
  public $user_password;
  public $user_password2;
  public $conn;
  public $teacher_role = [];
  public $classInfo = [];
  public $user = [];
  public $users = [];
  public $errors = [];
  public function __construct($conn) {
    $this->conn = $conn;
  }
  public function getUsername() {
    $sql = "SELECT * FROM users WHERE User_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->user_name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->user = $results->fetch_assoc();
    }
  }
  public function getRoleUsername() {
    $sql = "SELECT * FROM teacher WHERE User_Name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->user_name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->teacher_role = $results->fetch_assoc();
    }
  }
  
  //public function getClassOwnerName() {
  //  $sql = "SELECT * FROM classroom WHERE Owner_name = ?";
  //  $stmt = $this->conn->prepare($sql);
  //  $stmt->bind_param("s", $this->user_name);
  //  $stmt->execute();
  //  $results = $stmt->get_result();
  //  if($results->num_rows == 1) {
  //    $this->user = $results->fetch_assoc();
  //  }
  //}
  //public function setClassOwner($owner_name) {
  //  $this->owner_name = $owner_name;
  //  $this->getClassOwnerName();
  //  if($_SESSION['loggedin'] == false) {
  //    $_SESSION['user_name'] = null;
  //  }
  //  if($_SESSION['user_name'] == $this->owner_name) {
  //    $this->owner();
  //  }
  //  if($_SESSION['user_name'] != $this->owner_name) {
  //    $_SESSION['owner'] = false;
  //  } 
  //}
  public function checkNewUser($user_name, $user_email, $user_password, $user_password2, $user_type) {
    $this->user_name = $user_name;
    $this->user_email = $user_email;
    $this->user_password = $user_password;
    $this->user_password2 = $user_password2;
    $this->user_type = $user_type;
    $this->getUsername();
    $this->getRoleUsername();
    // check user name is available
    if(!empty($this->user)) {
      $this->errors['signup'] = "This username is already taken!";
    }
    if(empty($this->user_name)){
        $this->errors['signup_username'] = "Username cannot be void";
    }
    // validate email
    if(!filter_var($this->user_email, FILTER_VALIDATE_EMAIL)) {
      $this->errors['signup_email'] = "This email is invalid!";
    }
    // check pw
    if(strlen($this->user_password) < 5 || $this->user_password != $this->user_password2) {
      $this->errors['signup_password'] = "Passwords must match and be more than 5 characters in length!";
    }
    //check type option
    if(empty($this->user_type)) {
      $this->errors['type'] = "Please select the account role";
    }
    //create new user and login
    if(empty($this->errors)) {
      $this->createAccount();
      //$this->createTeacherAccount();
    }
  }
  public function createAccount(){
      $this->user_hash = password_hash($this->user_password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (User_name, Email, hash) VALUES (?,?,?)";
      $sql1 = "INSERT INTO teacher (User_Name, Email, hash, Type) VALUES (?,?,?,?)";
      $stmt = $this->conn->prepare($sql);
      $stmt1 = $this->conn->prepare($sql1);
      $stmt->bind_param("sss", $this->user_name, $this->user_email, $this->user_hash);
      $stmt1->bind_param("ssss", $this->user_name, $this->user_email, $this->user_hash, $this->user_type);
      $stmt->execute();
      $stmt1->execute();
      if($stmt->affected_rows == 1) {
        $this->getUsername();
        $this->login();
     }
     if($stmt1->affected_rows == 1) {
       //return $this->stmt1->insert_id;
       $this->getRoleUsername();
       $this->teacher();
     }
}
  public function checkLogin($user_name, $password) {
    $this->user_name = $user_name;
    $this->user_password = $password;
    //$this->getRoleUsername();
    $this->getUsername();
    $this->getRoleUsername();
    if(!empty($this->user)) {
      if(password_verify($this->user_password, $this->user['hash'])) {
        //$this->owner();
        $this->login();
        $this->teacher();
      } else {
        $this->errors['login_password'] = "Incorrect password!";
      }
    } else {
      $this->errors['login_username'] = "This username does not exist!";
    }
  }
  public function login() {
    $_SESSION['user_id'] = $this->user['ID'];
    $_SESSION['user_name'] = $this->user['User_name'];
    //$_SESSION['teacherID'] = $this->user['TeacherID'];
    $_SESSION['loggedin'] = true;

    header("Location: index.php?login=success");
  }
  public function teacher() {
    $_SESSION['teacherID'] = $this->teacher_role['TeacherID'];
    $_SESSION['user_type'] = $this->teacher_role['Type'];
    if($_SESSION['user_type'] == "teacher") {
      $_SESSION['teacher'] = true;
    }
    else if($_SESSION['user_type'] == "student") {
      $_SESSION['teacher'] = false;
    }
    //$_SESSION['teacher'] = false;
    $_SESSION['loggedin'] = true;
    //header("Location: index.php?login=success");
  }
  //public function owner() {
  //  $_SESSION['owner'] = true;
  //}
  public static function logout() {
    $_SESSION = [];
    session_destroy();
    header("Location: index.php?logout");
  }
}
