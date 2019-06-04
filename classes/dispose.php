<?php
require_once('db.php');

class Dispose {
	private $date;
	private $type;
	private $container_type;
	private $qty;
	private $quantity_type;
	private $user_id;

	// type
	const TYPE_MIXED = 1;
	const TYPE_PLASTIC = 2;
	const TYPE_PAPER = 3;
	const TYPE_IRON = 4;
	const TYPE_ALUMINIUM = 5;
	const TYPE_COPPER = 6;
	const TYPE_METAL_OTHER = 7;
	
	// container_type
	const CONTAINER_BAG = 1;
	const CONTAINER_BIN = 2;
	
	// quantity_type
	const QTY_LITRE = 1;
	const QTY_KILOGRAM = 2;
	
	public function __construct($date, $type, $containerType, $qty, $quantityType, $userId) {
		$this->date=$date;
		$this->type=$type;
		$this->container_type=$containerType;
		$this->qty=$qty;
		$this->quantity_type=$quantityType;
		$this->user_id=$userId;
	}
	
	/*
	 * Zwraca właściwość po jej nazwie
	 * @param string $name
	 * @return mixed
	 */
	public function get($name) {
		if (isset($this->$name)) {
			return $this->$name;
		}
		return null;
	}
	
	public function set($name, $value) {
		if (isset ($this->$name)) {
			$this->$name=$value;
			return true;
		}
		return false;
	}
		
	/*
	 * Zapisanie odbioru śmieci do bazy danych
	 * @return bool
	 */
	public function save() {
		$db = new DB();
		$sql = <<<EOT
INSERT INTO `dispose` 
	(`date`,`type`,`container_type`,`qty`,`quantity_type`,`user_id`) 
VALUES 
	('{$this->date}', {$this->type}, {$this->container_type}, {$this->qty},{$this->quantity_type}, {$this->user_id});
EOT;
		if ($db->query($sql)) {
			if ($db->affectedRows() == 1) {
				return $db->getInsertId();
			}
		}
		return false;
	}
	
}
?>