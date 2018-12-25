<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_model');
    } 
     public function index(){
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

  public function login(){
        $this->load->view('/login');
    }	
 }
	