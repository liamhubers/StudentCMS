<?php
	
	namespace library\mysqli;

	class Database{
		
		private static $_connections;
		
		public function __construct(){
			// TODO: Make default connection through configuration file	
		}
		
		public function newConnection(array $credentials){
			$connection = new Connection($credentials);
		}
		
		public function getInstance(){
			
		}
	
	}