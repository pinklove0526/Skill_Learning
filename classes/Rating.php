<?php
class Rating
{
	public $RatingID;
	public $ClassID;
	public $StudentID;
	public $RatingScore;
    public $rating = [];
    public $ratings = [];
	public $conn;
	
	public function __construct($ClassID, $conn)
	{
		$this->RatingClassID = $ClassID;
        $this->conn = $conn;
	}

    public function getRatings()
    {
        $sql = "SELECT r.RatingID, r.ClassID, r.StudentID, r.RatingScore, u.User_name, u.ID
        FROM rating r JOIN users u ON r.StudentID = u.ID
        WHERE r.ClassID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->RatingClassID);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->ratings = $results->fetch_all(MYSQLI_ASSOC);
    }

    public function createRating()
    {
        $sql = "INSERT INTO rating (RatingID, ClassID, StudentID, RatingScore) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $_SESSION['user_id'], $this->RatingClassID, $this->RatingScore);
        $stmt->execute();
        if ($stmt->affected_rows == 1)
        {
            
            $this->getRating();
        }
    }

    public function getRating()
    {
        $sql = "SELECT r.RatingID, r.ClassID, r.StudentID, r.RatingScore, u.User_name, u.ID
        FROM rating r JOIN users u ON r.StudentID = u.ID
        WHERE r.ClassID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->RatingID);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->rating = $results->fetch_all(MYSQLI_ASSOC);
    }
}
?>