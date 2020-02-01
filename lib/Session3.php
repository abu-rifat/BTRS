<?php

	
	class Session{
		public static function init(){
			session_start();
		}

		public static function set($key, $val){
			$_SESSION['agent'][$key] = $val;
		}

		public static function get($key){
			if(isset($_SESSION['agent'][$key])){
				return $_SESSION['agent'][$key];
			}else{
				return false;
			}
		}

		public static function set2($key, $val){
			$_SESSION['ui'][$key] = $val;
		}

		public static function get2($key){
			if(isset($_SESSION['ui'][$key])){
				return $_SESSION['ui'][$key];
			}else{
				return false;
			}
		}

		public static function checkSession(){
			self::init();
			if(self::get("login")==false){
				self::destroy2();
				header("Location:login.php");
			}
		}

		public static function checkLogin(){
			self::init();
			if(self::get("login")==true){
				header("Location:index.php");
			}
		}

		public static function destroy(){
			unset($_SESSION['agent']);
			header("Location:login.php");
		}

		public static function checkSession2(){
			self::init();
			if(self::get2("login")==false){
				self::destroy2();
				header("Location:login.php");
			}
		}

		public static function checkLogin2(){
			self::init();
			if(self::get2("login")==true){
				header("Location:index.php");
			}
		}

		public static function destroy2(){
			unset($_SESSION['ui']);
			header("Location:login.php");
		}

	}

?>