<?php
	
	function __autoload($class){
		
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
				echo "<b>InversoWarning</b> [$errno] $errstr<br />\n in $errfile on line $errline";
				break;

			case E_USER_NOTICE:
				echo "<b>InversoNotice</b> [$errno] $errstr<br />\n in $errfile on line $errline";
				break;
		}

		/* Don't execute PHP internal error handler */
		return true;
	}
	
	set_error_handler("errorHandler");