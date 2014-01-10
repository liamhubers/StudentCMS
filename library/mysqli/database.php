<?php
	
	namespace library\mysqli;

	class Database{
		
		private static $instance;
		private $connections;
		
		// TODO: Make default connection through configuration file	
		public function __construct(){
		}
		
		// Rather have some way to check if the loading worked but idk how yet...
		public function newConnection(array $credentials){
			$this->connections[key($credentials)] = new Connection($credentials[key($credentials)]);
		}
		
		// TODO: What will we be retrieving the connection on anyway?
		public function getConnection($connName){
			return $this->connections[$connName];
		}
			
		public static function getInstance(){
			if(!self::$instance){
				self::$instance = new self;
			} 
						
			return self::$instance;
		}
	
	}