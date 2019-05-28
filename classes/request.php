<?php
class Request {
	private $values;
	private $type;
	
	const POST = 1; 
	const GET = 2;
	const REQUEST = 3;
	
	/* 
	 * Construct
	 * @param array $val 
	 * @param int $type
	 */
	public function __construct($val, $type) { 
		$this->values = $val;
		$this->type = $type;
	}
	
	/*
	 * Function that will return value from global variable by key
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function get($key, $default = null) {
		if (isset($this->values[$key]) == false) {
			return $default;
		}
		return $this->values[$key];
	}
	
	/*
	 * Modifies local value under chosen key 
	 * @param string $key
	 * @param mixed $value
	 * @return bool
	 */
	public function set($key, $value) {
		$this->values[$key] = $value;
		return true;
	}
	
	/*
	 * Modifies local and global value under chosen key 
	 * @param string $key
	 * @param mixed $value
	 * @return null
	 */
	public function setGlobal($key, $values) {
		$this->set($key, $values);
		switch($this->type) {
			case Request::GET:
				$_GET[$key] = $value;
				break;
			case Request::POST:
				$_POST[$key] = $value;
				break;
			case Request::REQUEST:
				$_REQUEST[$key] = $value;
				break;
		}
	}
	
	/*
	 * Checks if chosen key exist in array
	 * @param string $key
	 * @return bool if exists - true, else return false
	 */
	public function has($key) {
		if (isset($this->values[$key])) {
			return true;
		}
		else {
			return false;
		}
	}
	
	/*
	 * Function check if value under chosen key is empty
	 * @param string $key
	 * @return bool if empty - true, else return false
	 */
	public function isEmpty($key) {
		if (empty($this->values[$key])) {
			return true;
		} else {
			return false;
		}
	}
}
