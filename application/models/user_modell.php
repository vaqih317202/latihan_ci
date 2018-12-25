<?php
 
class User_modell extends CI_Model {
 
	function __construct()
	{
		parent::__construct();
	}
	function SaveForm($form_data)
	{
		$this->db->insert('user', $form_data);
 
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
 
		return FALSE;
	}
}
?>