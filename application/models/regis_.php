<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class regis_ extends CI_model{

	public function regis($data)
	{
		$query = $this->db->insert("member", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}
}
?>