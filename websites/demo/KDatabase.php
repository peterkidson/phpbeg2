<?php

class KDatabase
{
	private $connection;
	private $stmt;

	public function __construct($config, $username = 'root', $pw = '')
	{
		$dsn = 'mysql:' . http_build_query($config, '', ';');

		$this->connection = new PDO($dsn, $username, $pw, [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}

	public function query($query, $params = [])
	{
		try {
			$this->stmt = $this->connection->prepare($query);
			$this->stmt->execute($params);      // PDO statement
			return $this;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function kfetch()
	{
		return $this->stmt->fetch();
	}

	public function kfindOrFail()
	{
		$result = $this->kfetch();
		if (!$result) {
			abort();
		}
		return $result;
	}

	public function kfetchAll()
	{
		return $this->stmt->fetchAll();
	}
}


/***
 *
 * CREATE TABLE `users` (
 * `id` int(11) NOT NULL AUTO_INCREMENT,
 * `name` varchar(40) NOT NULL,
 * `login` varchar(20) NOT NULL,
 * `admin` tinyint(1) NOT NULL DEFAULT 0,
 * `email` varchar(50) NOT NULL,
 * PRIMARY KEY (`id`),
 * UNIQUE KEY `name_idx` (`name`),
 * UNIQUE KEY `login_idx` (`login`),
 * UNIQUE KEY `email_idx` (`email`)
 * ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
 *
 *
 * CREATE TABLE `posts` (
 * `id` int(11) NOT NULL AUTO_INCREMENT,
 * `title` varchar(100) DEFAULT NULL,
 * PRIMARY KEY (`id`)
 * ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
 *
 *
 * CREATE TABLE `notes` (
 * `id` tinyint(4) NOT NULL AUTO_INCREMENT,
 * `body` text NOT NULL,
 * `userid` int(11) NOT NULL,
 * PRIMARY KEY (`id`),
 * KEY `userid_fk` (`userid`),
 * CONSTRAINT `userid_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
 * ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
 ***/


