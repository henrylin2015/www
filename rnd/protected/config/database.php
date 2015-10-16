<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'connectionString' => 'mysql:host=192.168.1.107;dbname=z_reporting_db',
	'emulatePrepare' => true,
	'username' => 'xiaolin',
	'password' => '111111',
	'charset' => 'utf8',
	'enableProfiling'=>YII_DEBUG,
    'enableParamLogging'=>YII_DEBUG,
);