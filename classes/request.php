<?php
class Request {
	private $values;
	private $type;
	
	public const POST = 1;
	public const GET = 2;
	public const REQUEST = 3;

	public function __construct($val, $type) {
		$this->values = $val;
		$this->type = $type;
	}
	public function get($key, $default = null) {
		if (isset($this->values[$key]) == false) {
			return $default;
		}
		return $this->values[$key];
	}
	public function set($key, $value) {
		$this->values[$key] = $value;
		return true;
	}
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
	public function has($key) {
		if (isset($this->values[$key])) {
			return true;
		}
		else {
			return false;
		}
	}
	public function isEmpty($key) {
		if (empty($this->values[$key])) {
			
			return true;
		} else {
			return false;
		}
	}
}
