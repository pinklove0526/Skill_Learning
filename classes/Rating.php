<?php
class Rating
{
	public $class_id;
	public $student_id;
	public $rating_score;
	public $conn;
	
	public function __construct($conn)
	{
		$this->conn = $conn;
	}
}
?>