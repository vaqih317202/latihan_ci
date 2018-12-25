<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

	public function __construct(){
		
		parent ::__construct();

		$this->load->model('model_laporan'); 

	}

	public function index()
	{
		$data = array(

			'title' 	=> 'Rekap Absen',
			'data_laporan'	=> $this->model_laporan->get_all(),

		);

		$this->load->view('data_laporan', $data);
	}

	public function tambah()
	{
		$data = array(

			'title' 	=> 'Laporan'

		);

		$this->load->view('tambah_data', $data);
	}

	public function simpan()
	{
		$data = array(
			'noid' 				=> $this->input->post("noid"),	
			'tanggal' 			=> $this->input->post("tanggal"),
			'waktu' 			=> $this->input->post("waktu"),
			'mata_kuliah' 		=> $this->input->post("mata_kuliah"),
			'kelas' 			=> $this->input->post("kelas"),
			'sks' 			    => $this->input->post("sks"),
			'kode_instruktur' 	=> $this->input->post("kode_instruktur"),
			
		);

		$this->model_laporan->simpan($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			                                    </div>');

		redirect('laporan');

	}

	public function edit($noid)
	{
		$noid = $this->uri->segment(3);

		$data = array(

			'title' 	=> 'Edit Rekap Absen',
			'data_laporan' => $this->model_laporan->edit($noid)

		);

		$this->load->view('edit_laporan', $data);
	}

	public function update()
	{
		$id['noid'] = $this->input->post("noid");
		$data = array(
			'tanggal' 			=> $this->input->post("tanggal"),
			'waktu' 			=> $this->input->post("waktu"),
			'mata_kuliah' 		=> $this->input->post("mata_kuliah"),
			'kelas' 			=> $this->input->post("kelas"),
			'sks' 			    => $this->input->post("sks"),
			'kode_instruktur' 	=> $this->input->post("kode_instruktur"),
			
		);

		$this->model_laporan->update($data, $id);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
			                                    </div>');

		//redirect
		redirect('laporan');

	}

	public function hapus($noid)
	{
		$id['noid'] = $this->uri->segment(3);
		
		$this->model_laporan->hapus($id);

		//redirect
		redirect('laporan');

	}

}
