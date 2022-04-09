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

    public function createRating($class_id, $StudentID, $RatingScore)
    {
        $this->RatingClassID = $class_id;
        $this->StudentID = $StudentID;
        $this->RatingScore = $RatingScore;
        $sql = "INSERT INTO rating (ClassID, StudentID, RatingScore) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $this->RatingClassID, $_SESSION['user_id'], $this->RatingScore);
        $stmt->execute();
        if ($stmt->affected_rows == 1)
        {
            $this->rating_id = $stmt->insert_id;
            $this->getRating();
        }
    }

    public function avgRating()
    {
        $sql = "SELECT r.RatingID, r.ClassID, r.StudentID, r.RatingScore, u.User_name, u.ID
        FROM rating r JOIN users u ON r.StudentID = u.ID
        WHERE r.ClassID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->RatingClassID);
        $stmt->execute();
        $results = $stmt->get_result();
        if ($results->num_rows >= 1)
        {
            while ($data = $results->fetch_assoc())
            {
                $rate_db[] = $data;
                $sum_rates[] = $data['RatingScore'];
            }
            if (count($rate_db))
            {
                $rate_times = count($rate_db);
                $sum_rates = array_sum($sum_rates);
                $rate_value = $sum_rates/$rate_times;
                echo $rate_value . "/10";
            }
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