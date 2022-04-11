<?php
$errors = [];
if(isset($_POST['login'])) {
  checkLogin($_POST, $errors, $conn);
} elseif(isset($_POST['create'])) {
  checkCreate($_POST, $errors, $conn);
}
function checkLogin($post, &$errors, $conn) {
  $name = $_POST['name'];
  $password = $_POST['password'];
  if(checkForUser($name, $conn) != 1) {
    $errorMsg = "Username not found!";
    $errors['login_username'] = $errorMsg;
  } else {
    $user_row = getUserRow($name, $conn);
    if(!password_verify($password, $user_row['hash'])) {
      $errorMsg = "Incorred Password!";
      $errors['login_password'] = $errorMsg;
    }
  }
  if(empty($errors)) {
    loginUser($user_row['User_name'], $user_row['ID']); //, $user_row['user_role');
  }
}
function checkCreate($post, &$errors, $conn) {
  $username = $post['username'];
  $email = $post['email'];
  $password1 = $post['password1'];
  $password2 = $post['password2'];
  if(!minmaxChars($username, 5, 20)) {
    $errorMsg = "Username must be between 5-20 characters long!";
    $errors['create_username'] = $errorMsg;
  } elseif (checkForUser($username, $conn) == 1) {
    $errorMsg = "Username already taken!";
    $errors['create_username'] = $errorMsg;
  }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMsg = "Invalid email!";
    $errors['create_email'] = $errorMsg;
  }
  if(!minmaxChars($password1, 5)|| $password1 != $password2) {
    $errorMsg = "Password is too short or does not match!";
    $errors['create_password'] = $errorMsg;
  }
  if(empty($errors)) {
    $user_id = createUser($conn, $username, $email, $password1);
    if($user_id != 0) {
      loginUser($username, $user_id, 2);
    }
  }
}

public function getTeachers($teacherid)
  {
    $this->teacherID = $teacherid;
    $sql = "select * from teacher where TeacherID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->teacherID);
    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows >= 1)
      $this->teachers = $results->fetch_all(MYSQLI_ASSOC);
  }

public function outputIndexTeachers($teachers)
{
  $output = '';
  foreach ($teachers as $teacher)
    $output .= "<div class='col-md-3' style='float: left;'>
                  <div class='card-mb-2'>
                    <img class='card-img-top' src='https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg' alt='Card image cap'>
                    <div class='card-body'>
                      <h4 class='card-title'>{$teacher['User_Name']}</h4>
                      <p class='card-text'>{$teacher['Email']}</p>
                    </div>
                  </div>
              </div>";
}

function checkForUser($username, $conn) {
  $sql = "SELECT * FROM users WHERE User_name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->num_rows;
}
function getUser($id, $conn){
  $sql = "SELECT * FROM users WHERE ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_assoc();
}
// fetch a user from the DB based on username
function getUserRow($username, $conn) {
  $sql = "SELECT * FROM users WHERE User_name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_assoc();
}
// inserts a new user into the db
function createUser($conn, $user_name, $user_email, $user_password) {
  $hash = password_hash($user_password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (User_name, Email, hash) VALUES (?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $user_name, $user_email, $hash);
  $stmt->execute();
  if($stmt->affected_rows == 1) {
    return $stmt->insert_id;
  } else {
    return 0;
  }
}
// character length checker
function minmaxChars($string, $min, $max = 1000) {
  if(strlen($string)< $min || strlen($string) > $max) {
    return false;
  } else {
    return true;
  }
}
// log user in function, sets $_SESSION values and redirects to home
function loginUser($user_name, $user_id) {
  $_SESSION['loggedin'] = true;
  $_SESSION['user_name'] = $user_name;
  $_SESSION['user_id'] = $user_id;
  header("Location: index.php?login=success");
}

?>
