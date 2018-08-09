<?php
	class Session{
		public static function sessionStart(){
			session_start();
		}
		
		public static function set($key,$value){
			$_SESSION['$key'] = $value;
		}
		
		public static function get($key){
			if(isset($_SESSION['$key'])){
				return $_SESSION['$key'];
			}
			else{
				return false;
			}
		}
		
		public static function checkSession(){
			self::sessionStart();
			if(self::get("login")==false){
				self::sessionDestroy();
				echo "<script>location.href='index.php'</script>";
			}
		}
		
		public static function sessionDestroy(){
			session_destroy();
			session_unset();
			echo "<script>location.href='login.php'</script>";
		}
	}
?>