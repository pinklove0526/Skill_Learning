<?php
class Comment
{
    public $comment_id;
    public $comment_user_id;
    public $comment_classroom_id;
    public $comment_text;
    public $comment = [];
    public $comments = [];
    public $conn;
    public function __construct($class_id, $conn)
    {
        $this->comment_classroom_id = $class_id;
        $this->conn = $conn;
    }

    public function getComments()
    {
        $sql = "SELECT c.comment_id, u.ID, c.body, u.User_name FROM comment c JOIN users u ON c.user_id = u.ID WHERE c.classroom_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->comment_classroom_id);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->comments = $results->fetch_all(MYSQLI_ASSOC);
    }

    public function createComment()
    {
        $sql = "INSERT INTO comment (user_id, classroom_id, body) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis", $_SESSION['user_id'], $this->comment_classroom_id, $this->comment_text);
        $stmt->execute();
        if ($stmt->affected_rows == 1)
        {
            $this->comment_id = $stmt->insert_id;
            $this->getComment();
        }
    }

    public function getComment()
    {
        $sql = "SELECT comment_id, u.ID, c.body, u.User_name FROM comment c JOIN users u ON c.user_id = u.ID WHERE c.comment_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->comment_id);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->comment = $results->fetch_all(MYSQLI_ASSOC);
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
