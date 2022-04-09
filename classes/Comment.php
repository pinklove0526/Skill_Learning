<?php

class Comment
{
    public $comment_id;
    public $user_id;
    public $classroom_id;
    public $classroom;
    public $owner;
    public $body;
    public $comment = [];
    public $comments = [];
    public $conn;
    public $teacher_id;
    public function __construct($class_id, $conn)
    {
        $this->classroom_id = $class_id;
        $this->conn = $conn;
    }
    
    public function getTeacherID(){
        $sql = "SELECT t.TeacherID
        FROM teacher t, classroom c
        WHERE t.TeacherID = ? and c.TeacherID = t.TeacherID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->teacher_id);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->comments = $results->fetch_all(MYSQLI_ASSOC);
    }
    //$teacher_id = getTeacherID();
    public function getComments()
    {
        $sql = "SELECT u.User_name, c.user_id, u.ID, c.body, c.classroom_id
        FROM comment c, users u
        WHERE u.ID = c.user_id and c.classroom_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->classroom_id);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->comments = $results->fetch_all(MYSQLI_ASSOC);
    }

    public function getComment()
    {
        $sql = "SELECT c.comment_id, u.ID, c.body, u.User_name, c.classroom_id 
        FROM comment c JOIN users u ON c.user_id = u.ID 
        WHERE c.comment_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->comment_id);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->comment = $results->fetch_assoc();
    }

    public function createComment($user_id, $classroom_id, $body)
    {
        $this->user_id = $user_id;
        $this->classroom_id = $classroom_id;
        $this->body = $body;
        $sql = "INSERT INTO comment (user_id, classroom_id, body) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis", $_SESSION['user_id'], $this->classroom_id, $this->body);
        $stmt->execute();

        // var_dump($this->user_id);
        // var_dump($this->classroom_id);
        // var_dump($this->body);

        // if ($stmt->affected_rows == 1)
        // {
        //     $this->comment_id = $stmt->insert_id;
        //     $this->getComment();
        // }
    }


    public function getClassroom()
    {
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


    public function outputComments()
    {
        $output = "";
        
        foreach ($this->comments as $comment)
        {
        
        
         //var_dump($_SESSION['owner_name']);
            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['user_id'])
                $button = "<button style='background-color: #4CAF50;' class='btn  btn-sm  delete-post' data-comment-id='{$comment['ID']}'>✓</button>";
            else
                $button = "";
            
            //////////////////////////
            $button = "<button style='background-color: #4CAF50;' class='btn  btn-sm  delete-post' data-comment-id='{$comment['ID']}'>✓</button>";
            
            $conn = @ new mysqli("localhost","root","","altskilllearing");
            $classroom = getClassroom($_GET['class_id'], $conn);
            $owner = $classroom['owner_name'];
            // var_dump($comment['User_name']);
            // var_dump($owner);



            if ($comment['User_name'] == $owner) {              
            $output .= "<div class='col-md-8 mt-2 mb-2'>
                <div class='card'>
                    <div class='card-header'>
                        {$comment['User_name']} {$button}
                    </div>
                    <div class='card-body'>
                        <p class='card-text'>{$comment['body']}</p>
                    </div>
                </div>
            </div>";
            }
            else {
                $output .= "<div class='col-md-8 mt-2 mb-2'>
                <div class='card'>
                    <div class='card-header'>
                        {$comment['User_name']} 
                    </div>
                    <div class='card-body'>
                        <p class='card-text'>{$comment['body']}</p>
                    </div>
                </div>
            </div>";
            }


        }
        echo $output;
    }

    

    
}
?>
