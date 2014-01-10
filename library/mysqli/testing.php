	// Get database
	$database = mysql\Database::getInstance();
	
	// Connection #1
	$database->newConnection(array("cmsDatabase" => array("localhost", "root", "", "cms")));
	$firstConnection = $database->getConnection('cmsDatabase');
	
	// Get credentials of first connection
	var_dump($firstConnection->_credentials);
	
	// Connection #2	
	$database->newConnection(array("testDatabase" => array("localhost", "root", "", "test")));
	$secondConnection = $database->getConnection('testDatabase');
	
	// Get credentials of second connection
	var_dump($secondConnection->_credentials);
	
	// Get another database instance for test purposes
	$anotherInstance = mysql\Database::getInstance();
	
	$anotherFirstConnection = $anotherInstance->getConnection('cmsDatabase');
	var_dump($anotherFirstConnection->_credentials);
