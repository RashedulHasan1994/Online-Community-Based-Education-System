
<?php
	class Database{
		private $host_name = "localhost";
		private $user_name = "root";
		private $password = "";
		private $db_name = "banglaacademy";
		public $connection;
		
		public function __construct(){
			$this -> connection = new mysqli($this->host_name, $this->user_name, $this->password, $this->db_name);
			mysqli_set_charset( $this -> connection, 'utf8');
			if(mysqli_connect_errno()){
				echo "Connection Failed....";
			}	
		}
		
		// Copyright Select Query 
		public function copyrightSelect(){
			$query  = "select * from copyright_text where id='1'";
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Slogan Update Query 
		public function sloganUpdate($data){
			$slogan_one   = $data['slogan_one'];
			$slogan_two   = $data['slogan_two'];
			$query  = "update site_slogan set slogan_one='$slogan_one',slogan_two='$slogan_two'";
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Copyright Update Query 
		public function copyrightUpdate($data){
			$note   = $data['copyright'];
			$query  = "update copyright_text set note='$note' where id='1'";
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Secondary Subject Insert Query 
		public function scndAddSubject($data){
			$class_name = $data['class_name'];
			$subject    = $data['subject'];
			$query      = "insert into secondary_subjects values('','$subject','$class_name')";
			$result     = $this -> connection -> query($query);
			return $result;
		}
		
		// University Department Insert Query 
		public function varsityAddDepartment($data){
			$faculty_name = $data['faculty_name'];
			$department    = $data['department'];
			$query      = "insert into university_department values('','$faculty_name','$department')";
			$result     = $this -> connection -> query($query);
			return $result;
		}
		
		// University Course Info Insert Query 
		public function varsityAddCourseInfo($data){
			$department = $data['department'];
			$course_name    = $data['course_name'];
			$course_info    = $data['course_info'];
			$query      = "insert into university_course_info values('','$department','$course_name','$course_info')";
			$result     = $this -> connection -> query($query);
			return $result;
		}
		
		// admin loginQuery
		public function adminLoginQuery($query){
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Select Query 
		public function selectQuery($query){
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Insert Query 
		public function insertQuery($query){
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Update Query 
		public function updateQuery($query){
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Delete Query 
		public function deleteQuery($query){
			$result = $this -> connection -> query($query);
			return $result;
		}
		
	}
?>