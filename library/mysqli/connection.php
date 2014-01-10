<?php
	
	namespace library\mysqli;
	
	class Connection extends Database{
		
		private static $_mysqli;
		private $_credentials;
		
		public function __construct(array $credentials){
						
			$this->_credentials = $credentials;
			if($conn = $this->connect()){
				self::$_mysqli = $conn;
			}
		}

		protected function connect(){
			
			list($host, $username, $password, $database) = $this->_credentials;			
			$conn = new \mysqli($host, $username, $password, $database);
			
			if($conn->connect_errno){
				trigger_error($conn->connect_error);
			} else {
				return $conn;
			}
		}
		
		public function __get($var){
			return $this->{$var};
		}
			
	}
		
		