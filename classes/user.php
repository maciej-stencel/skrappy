<?php
require_once('db.php');

class User {
	private	$id;
	private	$firstName;
	private	$lastName;
	private	$login;
	private	$password;
	private $email;
	private $state;
	private $county;
	private $city;
	private $postalCode;
	private $street;


	/*
	 * konstruktor
	 * @param srting
	 */
	public function __construct($login = '', $firstName = '', $lastName = '', 
	$password = '', $email = '', $state = '', $county = '', $city = '', $postalCode = '',$street = '') {
		$this->login = $login;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->password = $password;
		$this->email = $email;
		$this->state = $state;
		$this->county = $county;
		$this->city = $city;
		$this->postalCode = $postalCode;
		$this->street = $street;
	}

	/* 
	 * sprawdzanie czy podane hasło i login są poprawne
	 * @param string $username
	 * @param string $password
	 * @return bool
	 */
	public function checkLogin($username, $password) {
		$db = new DB();
		$password = sha1($password);
		$sql = <<<EOT
SELECT 
	COUNT(1) AS 'num'  
FROM 
	users 
WHERE
	username = '$username' AND password = '$password'; 
EOT;

		if ($db->query($sql)) {
			$num = intval($db->fetchSingle());
			if ($num == 1) {
				return true;
			}
		}
		return false;
	}

	/*
	 * Sprawdza czy użytkownik już istnieje
	 * @return bool
	 */
	public function checkIfUserExists() {
		$db = new DB();
		$sql = "SELECT count(1) FROM `users` WHERE username='{$this->login}' OR email='{$this->email}';";
		
		if($db->query($sql)){
			$num = intval($db->fetchSingle());
			if($num==0){
				return false;
			}
			return true;
		}
	}

	/*
	 * Zapisanie użytkownika do bazy danych
	 * @return bool
	 */
	public function save() {
		$db = new DB();
		$password = sha1($this->password);
		$sql = <<<EOT
INSERT INTO `users` 
	(`username`, `first_name`, `last_name`, `password`, `email`,`state`,`county`,`city`,`postal_code`,`street`) 
VALUES 
	('{$this->login}', '{$this->firstName}', '{$this->lastName}', '$password', '{$this->email}', 
	'{$this->state}', '{$this->county}', '{$this->city}', '{$this->postalCode}', '{$this->street}');
EOT;
		if ($db->query($sql)) {
			if ($db->affectedRows() == 1) {
				return $db->getInsertId();
			}
		}
		return false;
	}
	public function getId($username) {
		$db = new DB();
				$query = <<<EOT
SELECT
	`id`
FROM `users`
WHERE
	`username` = '$username';
EOT;
		if (!$db->query($query)) {
			echo 'Błąd zapytania sql: ' . $db->error();
		}
		$user = $db->fetchAssoc();
		if ($db->rows() == 1) {
			$this->id = $user['id'];
		}
		return $this->id;
	}
	public function getInstanceById($id) {
		$id = intval($id);
		$db = new DB();
				$query = <<<EOT
SELECT 
	`id`, `username`, `first_name`, `last_name`, `password`, `email`,`state`,`county`,`city`,`postal_code`,`street`
FROM `users` 
WHERE 
	`id` = $id;
EOT;
		if (!$db->query($query)) {
			echo 'Błąd zapytania sql: ' . $db->error();
		}
		$user = $db->fetchAssoc();
		if ($db->rows() == 1) {
			$this->id = intval($user['id']);
			$this->username = $user['username'];
			$this->firstname = $user['first_name'];
			$this->lastname = $user['last_name'];
			$this->password = $user['password'];
			$this->email = $user['email'];
			$this->state = $user['state'];
			$this->county = $user['county'];
			$this->city = $user['city'];
			$this->postalCode = $user['postal_code'];
			$this->street = $user['street'];
		}
	}
	public function getName() {
		return $this->firstname . " " . $this->lastname;
	}
}
