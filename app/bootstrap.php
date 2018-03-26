<?php
	// Load Config
	require_once 'config/config.php';

	// Autoload Core Libraries 
	// When, we instantiate “MyClass”, class name(MyClass) is passed by PHP to “spl_autoload_register()”
	spl_autoload_register(function($className) {
		require_once 'libraries/' . $className . '.php';
	});