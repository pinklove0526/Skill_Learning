<?php

class Comment
{
    public $comment_id;
    public $user_id;
    public $classroom_id;
    public $body;
    public $comment = [];
    public $comments = [];
    public $conn;
    public function __construct($class_id, $conn)
    {
        $this->classroom_id = $class_id;
        $this->conn = $conn;
    }

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

    public function outputComments()
    {
        $output = "";
        foreach ($this->comments as $comment)
        {
            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['user_id'])
                $button = "<button class='btn float-right btn-sm btn-outline-danger delete-post' data-comment-id='{$comment['ID']}'>X</button>";
            else
                $button = "";
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
        echo $output;
    }

    

    public function deleteComment($cmmt_id)
    {
        $this->comment_id = $cmmt_id;
        $this->getComment();
        $_SESSION['comment'] = $this->comment;
        if ($this->comment['comment_user_id'] == $_SESSION['user_id'])
        {
            $this->comment_id = $cmmt_id;
            $sql = "DELETE FROM comment WHERE comment_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $this->comment_id);
            $stmt->execute();
            if ($stmt->affected_rows == 1)
                echo true;
            else
                echo false;
        }
        else
            echo false;
    }
}
?>
