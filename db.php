<?php

class db
{

		public static function getConnection()
		{
			$paramsPath = ROOT . '/db_params.php';
			$params = include($paramsPath);

			$opt = array(
	        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dsn, $params['user'], $params['password'], $opt);
			$db->exec("set names utf8");

			return $db;
		}
}