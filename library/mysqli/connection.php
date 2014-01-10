<?php
	
	namespace library\mysqli;
	
	class Connection extends Database{
		
		private static $_credentials;
		private static $_mysqli;
		
		public function __construct(array $credentials){
			$this->_credentials = $credentials;
			if($conn = $this->validate()){
				$this->_mysqli = $conn;
			}
		}

		protected function connect(){
			return true;
		}
		
		protected function validate(){
		
			list($host, $username, $password, $database) = $this->_credentials;
			$conn = new mysqli($host, $username, $password, $database);
			
			if($conn->connect_errno){
				trigger_error("Connection "  . $host . " is not a valid connection");
			} else {
				return $conn;
			}
		}
	}
		
		