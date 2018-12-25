<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan extends CI_model{

#############DATA ANGGOTA##########
	public function get_all()
	{
		$query = $this->db->select("*")
				 ->from('anggota')
				 ->order_by('id_anggota', 'DESC')
				 ->get();
		return $query->result();
	}

	public function simpan_anggota($data)
	{
		
		$query = $this->db->insert("anggota", $data);

		if($query){
			return true;
		}else{
			return false;
		}

	}

	public function edit($id_anggota)
	{
		
		$query = $this->db->where("anggota", $id_anggota)
				->get("anggota");

		if($query){
			return $query->row();
		}else{
			return false;
		}

	}

	public function update($data, $id)
	{
		
		$query = $this->db->update("anggota", $data, $id);

		if($query){
			return true;
		}else{
			return false;
		}

	}

	public function hapus($id)
	{
		
		$query = $this->db->delete("anggota", $id);

		if($query){
			return true;
		}else{
			return false;
		}

	}


}