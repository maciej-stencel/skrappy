<?php

class DB {
	private $db;
	private $result;

	/*
	 * funkcja wykonująca połączenie do bazy danych	
	 * @param srting $address
	 * @param srting $user
	 * @param srting $password
	 * @param srting $datapase
	 * @param int $port 
	 * @return bool
	 */
	public function connect($address, $user, $password, $database, $port = 3306) {
		$this->db = mysqli_connect($address, $user, $password, $database, $port);

		if (!$this->isConnected()) {
			echo 'Błąd połączenia do MySQL: ' . mysqli_connect_error();
			return false;
		}
		return true;
	}
	
	/*
	 * sprawdza czy baza danych jest pobłączona
	 * @return bool
	 */
	public function isConnected() {
		if ($this->db == false) {
			return false;
		}
		return true;
	}

	/*
	 * zwraca liczbę rekordów z ostatniego zapytania
	 */
	public function rows() {
		return mysqli_num_rows($this->result);
	}

	/*
	 * zamykanie ręczne połączenia
	 */
	public function close() {
		if ($this->isConnected() != false) {
			mysqli_close($this->db);
		}
	}

	/*
	 * konstruktor - jeśli podano dane to automatycznie łączy z bazą danych
	 * $param string $address
	 * $param string $user
	 * $param string $password
	 * $param string $database
	 * $param int $port
	 */
	public function __construct($address = '', $user = '', $password = '', $database = '', $port = 3306){
		if (!empty($address) && !empty($user) && !empty($database)) {
			$this->connect($address, $user, $password, $database, $port);
		} else {
			global $database;
			$this->connect(
				$database['host'], 
				$database['username'],
				$database['password'],
				$database['database'],
				$database['port']
			);
		}
	}
	
	/*
	 * destruktor
	 */
	public function __destruct(){
		if($this->isConnected()){
			$this->close();
		}
	}

	/*
	 * wykonuje zapytanie do bazy danych
	 * @param string $sql
	 * @return bool
	 */
	public function query($sql) {
		if (!$this->isConnected()) {
			return false;
		}
		if ($this->result = mysqli_query($this->db, $sql)) {
			return true;
		} ?>

		<div class="alert alert-danger" role="alert">
			<span class="font-weight-bold">Błąd!</span> 
			<?= mysqli_error($this->db); ?>
		</div><?php

		return false;
	}
	
	/*
	 * Zwrazca
	 * @param bool $assoc
	 * @return array $data
	 */
	public function fetch($assoc=false) {
		$data = [];
		if ($this->rows() == 0) {
			return $data;
		}
		if ($assoc) {
			while($row = mysqli_fetch_assoc($this->result)) {
				$data[] = $row;
			}
		} else {
			while($row = mysqli_fetch_row($this->result)) {
				$data[] = $row;
			}
		}

		if (count($data) == 1) {
			// return array_shift($data);
			return $data[0];
		}

		return $data;
	}

	public function fetchAssoc() {
		return $this->fetch(true);
	}

	/*
	 * Funkcja zwraca jedną skalarną wartość
	 */
	public function fetchSingle() {
		$data = $this->fetch();
		if (count($data) == 1) {
			return $data[0];
		} else {
			$row = array_shift($data);
			return array_shift($row);
		}
	}
	
	/*
	 * Zwraca liczbę rekordów "ruszonych" w ostatnim zapytaniu.
	 * INSERT, UPDATE, DELETE nie zwraca rekordów.
	 */
	public function affectedRows() {
		return mysqli_affected_rows($this->db);
	}
	
	/*
	 * Zwraca id ostatnio dodanego rekordu
	 * @return int
	 */
	public function getInsertId() {
		return $this->db->insert_id;
	}
}