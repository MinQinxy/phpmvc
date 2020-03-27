<?php
use Vender\Helpers\Env;


return [
	'default' => Env::get('DB_CONNECTION', 'mysql'),
	
	"connections"=>[
		"mysql"=>[
			'driver' => 'mysql',
                  'url' => Env::get('DATABASE_URL'),
                  'host' => Env::get('DB_HOST', '127.0.0.1'),
                  'port' => Env::get('DB_PORT', '3306'),
                  'database' => Env::get('DB_DATABASE', 'mindas'),
                  'username' => Env::get('DB_USERNAME', 'root'),
                  'password' => Env::get('DB_PASSWORD', ''),
                  'unix_socket' => Env::get('DB_SOCKET', ''),
                  'charset' => 'utf8mb4',
                  'collation' => 'utf8mb4_unicode_ci',
                  'prefix' => '',
                  'prefix_indexes' => true,
                  'strict' => true,
                  'engine' => null,
                  'options' => extension_loaded('pdo_mysql') ? array_filter([
                  PDO::MYSQL_ATTR_SSL_CA => Env::get('MYSQL_ATTR_SSL_CA'),
                  ]) : [],
		]
	]
];