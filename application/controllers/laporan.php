<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class Laporan extends CI_controller{

	function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_model');
    } 

     public function index()
     {
        $this->load->view('awal');
    } 
     public function table(){
        $this->load->model('user_model');
        $data['v_userpinjam'] = $this->user_model->list_table()->result();
        $this->load->view('table',$data);
    } 
   
	public function home()
	{
		$this->load->view('table');
	}
    
   function proses(){
         $email = $this->input->post('email');
         $password = $this->input->post('password');
         
         if ($this->user_model->cek_login($email, $password)== TRUE)
         {
             redirect('login/table');
         }else{
              redirect('login');
         }}

    function register()
    {           
        $this->form_validation->set_rules('firstname', 'Firstname', 'required|max_length[20]');           
        $this->form_validation->set_rules('lastname', 'Lastname', 'required|max_length[80]');           
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');         
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmpassword', 'Confirmpassword', 'required|matches[password]');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
 
        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('register');
        }
        else
        {
 
            $form_data = array(
                            'firstname' => set_value('firstname'),
                            'lastname' => set_value('lastname'),
                            'email' => set_value('email'),
                            'password' => set_value('password')
                        );
 
            if ($this->user_model->SaveForm($form_data) == TRUE) 
            {
                redirect('login');
            }
            else
            {
            redirect('login/register');
            }
        }
 } 
 	public function awal()
  {
    $this->load->view('login/awal');
  }

	public function regis()
	{
		$data = array(

			'nadep' => $this->input->post("nadep"),
			'nabel' => $this->input->post("nabel"),
			'namel' => $this->input->post("namel"),
			'notel' => $this->input->post("notel"),

		);
		$this->regis_->regis($data);

		$this->session->set_flashdata('notif','<div class="alert alert-sucses alert-dismissible">sucses!
			Registasi Berhasil
								<div>');
		redirect('/');
	}
##################################################################################################################
#########################################      FUNCTION ANGGOTA    ###############################################	
	public function anggota(){
        $this->load->model('user_model');
        $data['anggota'] = $this->user_model->list_table1()->result();
        $this->load->view('anggota',$data);
    }
################################################################################################################
###########################################       CRUD ANGGOTA     #############################################
	public function edit_anggota($id_anggota)
	{
		$id_anggota = $this->uri->segment(3);

		$data = array(

			'title' 	=> 'Rekap Anggota',
			'anggota'	=> $this->user_model->edit_anggota($id_anggota)

		);

		$this->load->view('update_anggota', $data);
	}

	public function tambah_anggota()
	{
		$data = array(

			'title' 	=> 'Tambah Anggota'

		);

		$this->load->view('tambah_anggota', $data);
	}

	public function simpan_anggota()
	{
		$data =  array(
			'id_anggota'			    => $this->input->post("id_anggota"),
			'nim' 						=> $this->input->post("nim"),
			'nama' 						=> $this->input->post("nama"),
			'no_hp' 					=> $this->input->post("no_hp"),
			'email' 					=> $this->input->post("email"),
			'alamat' 			 	    => $this->input->post("alamat")
		);
		
		$this->user_model->simpan_anggota($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			                                    </div>');

		redirect('laporan/anggota');
	}

	public function update_anggota()
	{
		$id['id_anggota'] = $this->input->post("id_anggota");
		$data = array(	
			'nim' 						=> $this->input->post("nim"),
			'nama' 						=> $this->input->post("nama"),
			'no_hp' 					=> $this->input->post("no_hp"),
			'email' 					=> $this->input->post("email"),
			'alamat' 			 	    => $this->input->post("alamat"),
			
		);

		$this->user_model->update_anggota($data,$id);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			                                    </div>');

		redirect('laporan/anggota');
	}

	public function hapus_anggota($id_anggota)
	{
		$id['id_anggota'] = $this->uri->segment(3);

		$this->user_model->hapus_anggota($id);
		//redirect
		redirect('laporan/anggota');
	}

	
#################################################################################################################
#######################################      FUNCTION BUKU    ################################################
	public function _buku()
	{
		$this->load->view('buku');
	}

	public function buku(){
        $this->load->model('user_model');
        $data['buku'] = $this->user_model->list_table2()->result();
        $this->load->view('buku',$data);
    }

################################################################################################################
########################################     CRUD BUKU      ####################################################
   public function edit_buku($kd_buku)
	{
		$kd_buku = $this->uri->segment(3);

		$data = array(

			'title' 	=> 'Rekap Buku',
			'buku'	=> $this->user_model->edit_buku($kd_buku)

		);

		$this->load->view('update_buku', $data);
	}

	public function tambah_buku()
	{
		$data = array(

			'title' 	=> 'Tambah Buku'

		);

		$this->load->view('tambah_buku', $data);
	}

	public function simpan_buku()
	{
		$data =  array(
			'kd_buku'			   		 	=> $this->input->post("kd_buku"),
			'judul' 						=> $this->input->post("judul"),
			'pengarang' 					=> $this->input->post("nama"),
			'penerbit' 						=> $this->input->post("penerbit"),
			'stok' 							=> $this->input->post("stok"),
			'th_terbit' 			 	    => $this->input->post("th_terbit"),
			'id_kategori' 			 	    => $this->input->post("id_kategori")
		);
		
		$this->user_model->simpan_buku($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			                                    </div>');

		redirect('laporan/buku');
	}

	public function update_buku()
	{
		$id['kd_buku'] = $this->input->post("kd_buku");
		$data = array(	
			'judul' 							=> $this->input->post("judul"),
			'pengarang' 						=> $this->input->post("pengarang"),
			'penerbit' 							=> $this->input->post("penerbit"),
			'stok' 								=> $this->input->post("stok"),
			'th_terbit' 			 		    => $this->input->post("th_terbit"),
			'id_kategori' 			 		    => $this->input->post("id_kategori"),
			
		);

		$this->user_model->update_buku($data,$id);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			                                    </div>');

		redirect('laporan/buku');
	}

	public function hapus_buku($kd_buku)
	{
		$id['kd_buku'] = $this->uri->segment(3);

		$this->user_model->hapus_buku($id);
		//redirect
		redirect('laporan/buku');
	}

##################################################################################################################
###########################################     FUNTION MEMBER     ###############################################
###############################################################################################################
	public function _member()
	{
		$this->load->view('member');
	}

	public function member(){
        $this->load->model('user_model');
        $data['member'] = $this->user_model->list_table3()->result();
        $this->load->view('member',$data);
    }
##################################################################################################################
###########################################       CRUD MEMBER      ###############################################
##################################################################################################################
	public function tolak_member($id_member)
	{
		$id['id_member'] = $this->uri->segment(3);

		$this->user_model->tolak_member($id);

		redirect('laporan/member');
	}
	public function terima_member($id_member)
	{
		$this->load->model('user_model');
		$id_member = $this->uri->segment(3);
		$this->user_model->terima_member($id_member);

		if($this->user_model->terima_member($id_member,$query) == FALSE)
		{
			$this->session->set_flashdata('message','Member Berhasil Menjadi Anggota ');
			redirect('laporan/member');
		}
		else
		{
			$this->session->set_flashdata('message','data member salah');
			redirect('laporan/member');
		}
	}
###############################################################################################################
########################################     FUNCTION PINJAM    ###############################################

	public function _pinjam()
	{
		$this->load->view('pinjam');
	}

	public function pinjam(){
        $this->load->model('user_model');
        $data['pinjam'] = $this->user_model->list_table4()->result();
        $this->load->view('pinjam',$data);
    }

#############################################################################################################################################################     CRUD PINJAM        ###############################################
     public function edit_pinjam($kd_transaksi)
	{
		$kd_transaksi = $this->uri->segment(3);

		$data = array(

			'title' 	=> 'Rekap pinjam',
			'pinjam'	=> $this->user_model->edit_pinjam($kd_transaksi)

		);

		$this->load->view('update_pinjam', $data);
	}

	public function tambah_pinjam()
	{
		$data = array(

			'title' 	=> 'Tambah Pinjam'

		);

		$this->load->view('tambah_pinjam', $data);
	}

	public function simpan_pinjam()
	{
		$data =  array(
			'kd_transaksi'			   		 		=> $this->input->post("kd_transaksi"),
			'id_anggota' 							=> $this->input->post("id_anggota"),
			'kd_buku' 								=> $this->input->post("kd_buku"),
			'tanggal_pinjam' 						=> $this->input->post("tanggal_pinjam"),
			'tanggal_kembali' 						=> $this->input->post("tanggal_kembali"),
			'jml_pinjam' 			 	     		=> $this->input->post("jml_pinjam"),
			'denda' 			 	    			=> $this->input->post("denda")
		);
		
		$this->user_model->simpan_pinjam($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			                                    </div>');

		redirect('laporan/pinjam');
	}

	public function update_pinjam()
	{
		$id['kd_transaksi'] = $this->input->post("kd_transaksi");
		$data = array(	
			'id_anggota' 							=> $this->input->post("id_anggota"),
			'kd_buku' 								=> $this->input->post("kd_buku"),
			'tanggal_pinjam' 						=> $this->input->post("tanggal_pinjam"),
			'tanggal_kembali' 						=> $this->input->post("tanggal_kembali"),
			'jml_pinjam' 			 	     		=> $this->input->post("jml_pinjam"),
			'denda' 			 	    			=> $this->input->post("denda"),
			
		);

		$this->user_model->update_pinjam($data,$id);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			                                    </div>');

		redirect('laporan/pinjam');
	}

	public function hapus_pinjam($kd_buku)
	{
		$id['kd_transaksi'] = $this->uri->segment(3);

		$this->user_model->hapus_pinjam($id);
		//redirect
		redirect('laporan/pinjam');
	}


// ###############################################################################################################
// ########################################      FUNCTION USER     ###############################################
	public function _user()
	{
		$this->load->view('user');
	}
	
    public function user(){
        $this->load->model('user_model');
        $data['user'] = $this->user_model->list_table5()->result();
        $this->load->view('user',$data);
    }
##################################################################################################################
##########################################       CRUD  USER        ###############################################
##################################################################################################################
    public function edit_user($firstname)
	{
		$firstname = $this->uri->segment(3);

		$data = array(

			'title' 	=> 'Rekap User',
			'user'	=> $this->user_model->edit_user($firstname)

		);

		$this->load->view('update_user', $data);
	}

	public function tambah_user()
	{
		$data = array(

			'title' 	=> 'Tambah User'

		);

		$this->load->view('tambah_user', $data);
	}

	public function simpan_user()
	{
		$data =  array(
			'firstname'			   		 		=> $this->input->post("firstname"),
			'lastname' 							=> $this->input->post("lastname"),
			'email' 							=> $this->input->post("email"),
			'password' 							=> $this->input->post("password")
			
		);
		
		$this->user_model->simpan_user($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			                                    </div>');

		redirect('laporan/user');
	}

	public function update_user()
	{
		$id['firstname'] = $this->input->post("firstname");
		$data = array(	
			'lastname' 								=> $this->input->post("lastname"),
			'email' 								=> $this->input->post("kd_buku"),
			'password' 								=> $this->input->post("password"),

		);

		$this->user_model->update_user($data,$id);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			                                    </div>');

		redirect('laporan/user');
	}

	public function hapus_user($kd_buku)
	{
		$id['firstname'] = $this->uri->segment(3);

		$this->user_model->hapus_user($id);
		//redirect
		redirect('laporan/user');
	}
####################################################################################################################################################################################################################################
}
?>