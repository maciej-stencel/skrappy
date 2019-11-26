<?php
require_once('db.php');

class User {
	private	$id;
	private	$firstName;
	private	$lastName;
	private	$login;
	private	$password;
	private $email;
	private $state_id;
	private $county;
	private $city;
	private $postalCode;
	private $street;


	/**
	 * Class constructor
	 * @param srting
	 */
	public function __construct($login = '', $firstName = '', $lastName = '', $password = '', $email = '', $state_id = '', $county = '', $city = '', $postalCode = '',$street = '') {
		$this->login = $login;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->password = $password;
		$this->email = $email;
		$this->state_id = $state_id;
		$this->county = $county;
		$this->city = $city;
		$this->postalCode = $postalCode;
		$this->street = $street;
	}

	/**
	 * Gets users property value by its name
	 * @param string $name field name
	 * @return mixed returns field value or null if given property does not exist
	 */
	public function get($name) {
		if (isset($this->$name)) {
			return $this->$name;
		}
		return null;
	}

	/**
	 * Sets users property to given value
	 * @param string $name field name
	 * @param mixed $value new value
	 * @return bool true if field value was saved, otherwise false
	 */
	public function set($name, $value) {
		if (isset ($this->$name)) {
			$this->$name=$value;
			return true;
		}
		return false;
	}

	/**
	 * Checks if given login and password are correct
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

	/**
	 * Checks if present user by username and email exists already in db
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

	/**
	 * Saves user to database
	 * @return bool
	 */
	public function save() {
		$db = new DB();
		$password = sha1($this->password);
		$sql = <<<EOT
INSERT INTO `users` 
	(`username`, `first_name`, `last_name`, `password`, `email`, `state_id`, `county`, `city`, `postal_code`, `street`) 
VALUES 
	('{$this->login}', '{$this->firstName}', '{$this->lastName}', '$password', '{$this->email}', '{$this->state_id}', '{$this->county}', '{$this->city}', '{$this->postalCode}', '{$this->street}');
EOT;
		if ($db->query($sql)) {
			if ($db->affectedRows() == 1) {
				return $db->getInsertId();
			}
		}
		return false;
	}

	/**
	 * Returns id of user by username
	 * @param string $username
	 * @return int|string id of user or empty string
	 */
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

	/**
	 * Fill owners object with user instance by given id number
	 * @param int $id id number of user
	 * @return void
	 */
	public function getInstanceById($id) {
		$id = intval($id);
		$db = new DB();
				$query = <<<EOT
SELECT 
	`id`, `username`, `first_name`, `last_name`, `password`, `email`, `state_id`, `county`, `city`, `postal_code`, `street`
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
			$this->state_id = $user['state_id'];
			$this->county = $user['county'];
			$this->city = $user['city'];
			$this->postalCode = $user['postal_code'];
			$this->street = $user['street'];
		}
	}

	/**
	 * Returns full name of user
	 * @return string first and last name
	 */
	public function getName() {
		return $this->firstname . " " . $this->lastname;
	}
}
