<?php
	
	function __autoload($class){
		
		// Logic to include exception classes
		if(strpos($class, 'Exception')){
			$dirs = explode("\\", $class);
			$dirs[count($dirs)-1] = 'exception';
			
			$class = implode("\\", $dirs);
		}
		
		$file = strtolower($class).'.php';
		if(file_exists($file)){
			include($file);
		}		
	}
	
	function errorHandler($errno, $errstr, $errfile, $errline)
	{
		if (!(error_reporting() & $errno)) {
			// This error code is not included in error_reporting
			return;
		}

		switch ($errno) {
			case E_USER_ERROR:
				echo "<b>InversoError</b> [$errno] $errstr<br />\n";
				echo "  Fatal error on line $errline in file $errfile";
				echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
				echo "Aborting...<br />\n";
				exit(1);
				break;

			case E_USER_WARNING:
				echo "<b>InversoWarning</b> [$errno] $errstr<br />\n";
				break;

			case E_USER_NOTICE:
				echo "<b>InversoNotice</b> [$errno] $errstr<br />\n";
				break;

			default:
				echo "Unknown error type: [$errno] $errstr<br />\n";
				break;
		}

		/* Don't execute PHP internal error handler */
		return true;
	}
	
	set_error_handler("errorHandler");