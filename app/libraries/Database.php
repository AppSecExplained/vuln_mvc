<?php
	/*
	 * PDO database class
	 * connects to the db & makes queries to it
	 */

	class Database {
		private $host = DB_HOST;
		private $user = DB_USER;
		private $pass = DB_PASS;
		private $dbname = DB_NAME;

		private $dbh; // database handler
		private $stmt;
		private $error;

		public function __construct() {
			// set the DSN
			$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);

			try {
				$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
			} catch(PDOException $e) {
				$this->error = $e->getMessage();
				echo $this->error;
			}
		}
	}