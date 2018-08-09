<?php
	class Database{
		private $host_name = "localhost";
		private $user_name = "root";
		private $password = "";
		private $db_name = "banglaacademy";
		public $connection;
		
		public function __construct(){
			$this -> connection = new mysqli($this->host_name, $this->user_name, $this->password, $this->db_name);
			if(mysqli_connect_errno()){
				echo "Connection Failed....";
			}
				$this -> connection -> query('SET CHARACTER SET utf8');
				$this -> connection -> query("SET SESSION collation_connection ='utf8_general_ci'");
		}
		
		// user registration 
		public function user_registration($data){
			$full_name = $data['full_name'];
			$email = $data['email'];
			$password = $data['password'];
			$phone = $data['phone'];
			$tags = $data['tags'];
			$db_day = $data['db_day'];
			$db_month = $data['db_month'];
			$db_year = $data['db_year'];
			$sex = $data['sex'];
			$address = $data['address'];
			$file_name=$_FILES['picture']['tmp_name'];
			$image_name = uniqid().$_FILES['picture']['name'];
			$destination = "uploads/".$image_name;
			$picture = move_uploaded_file($file_name,$destination);
			$query = "insert into user_info values('','$full_name','$email','$password','$phone','$tags','$db_day','$db_month','$db_year','$sex','$address','$image_name')";
			$insert = $this -> connection -> query($query);
			if($insert){
				return $insert;
			}
		}
		
		// loginQuery
		public function loginQuery($query){
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Question Insert
		public function questionInsert($data){
			$title     = $data['title'];
			$tags      = $data['tags'];
			$content   = $data['content'];
			$user_name = Session::get("User_Name");
			$id        = $_SESSION["Id"];
			$image     = $_SESSION["Picture"];
			$time	   = getBanglaDate(Date('d-m-Y g:i a'));
			$query = "insert into questions values('','$title','$tags','$content','$time','$user_name','$id','0')";
			$query2 = "insert into notification values('','$title','$id','0')";
			$insert = $this -> connection -> query($query);
			$insert2 = $this -> connection -> query($query2);
			if($insert){
						echo "<script>
							var conf = confirm('আপনার প্রশ্ন গ্রহন করা হয়েছে ......');
							if(conf==true || conf==false){
								location.href='userProfile.php?userId=$id'
							}
						</script>";
						
					}
		}
		
		// like value Insert
		public function likeInfoInsert($data){
			$insert = $this -> connection -> query($data);
		}
		
		// Copyright Select Query 
		public function copyrightSelect(){
			$query  = "select * from copyright_text where id='1'";
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Questions Select Query 
		public function selectQuestions($query){
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Junior Lessons Select Query 
		public function selectJuniorLessons($query){
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// University Lessons Select Query 
		public function selectUniversityLessons($query){
			$result = $this -> connection -> query($query);
			return $result;
		}
		
		// Select Query 
		public function selectQuery($query){
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
		
		// Reply Insert
		public function insert_reply($data,$Ques_Id){
			$content     = $data['content'];
			$Ques_Id     = $Ques_Id;
			$user_id        = $_SESSION["Id"];
			$time	   = getBanglaDate(Date('d-m-Y g:i a'));
			$val = "select * from answers where question_id='$Ques_Id' and user_id='$user_id' ";
			$value = $this -> connection -> query($val);
			$data=mysqli_num_rows($value);
			if($data>0){
				return "<h5 style='background:lightgoldenrodyellow;color:red;font-family:bold;font-size:15px;padding: 20px;margin-top: 0px;border-radius: 5px;'>ইতিমধ্যে আপনি উত্তর দিয়েছেন</h5>";
				
			}else{
			$query = "insert into answers values('','$content','$time','$Ques_Id ','$user_id','0','Null')";
			$insert = $this -> connection -> query($query);
			return "<h5 style='background:lightgreen;color:##006699;font-size:15px;padding: 20px;margin-top: 0px;border-radius: 5px;'>আপনার উত্তর গ্রহণ করা হয়েছে</h5>";
			}
			
		}
		
	}
?>