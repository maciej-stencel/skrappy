<?php

class Session 
{
	private $values;
	
	public function __construct()
	{
			$this->values = $_SESSION;
	}

	public function get($key, $default = null){
		if (isset($this->values[$key]) == false){
			return $default;
		}
		return $this->values[$key];
	}
	
	/*
	 * ustawia zmienną
	 * @param string $key
	 * @param string $value
	 * @return bool
	 */
	public function set($key, $value){
		$this->values[$key] = $value;
		return true;
	}
 
	/*
	 * ustawia globalną zmianną
	 * @param string $key
	 * @param string $value
	 * @return bool
	 */
	public function setGlobal($key, $value) {
		$this->set($key, $value);
		$_SESSION[$key]=$value;
	}
	
	/*
	 * Sorawdza czy istenieje dany klucz
	 * @param string $key
	 * @return bool
	 */
	public	function has($key)
	{
		if (isset($this->values[$key]))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/*
	 * Sorawdza czy dany klucz jest pusty
	 * @param string $key
	 * @return bool
	 */
	public function isEmpty($key)
	{
		if (empty($this->values[$key])){
			
			return true;
		}else{
			return false;
		}
	}
}
