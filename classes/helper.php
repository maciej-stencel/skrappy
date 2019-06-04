<?php
class Helper {
	public static function checkDate($date) {
		if (empty($date)) {
			return false;
		}
		$t = explode('-', $date);
		return checkdate($t[1],$t[2],$t[0]);
	}
}
