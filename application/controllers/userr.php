<?php
 
class Userr extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_modell');
    }   
    function index()
    {           
        $this->form_validation->set_rules('firstname', 'Firstname', 'required|max_length[20]');           
        $this->form_validation->set_rules('lastname', 'Lastname', 'required|max_length[80]');           
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');            
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
 
        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('view_pendaftaran');
        }
        else
        {
 
            $form_data = array(
                            'firstname' => set_value('firstname'),
                            'lastname' => set_value('lastname'),
                            'email' => set_value('email'),
                            'password' => set_value('password')
                        );
 
            if ($this->user_modell->SaveForm($form_data) == TRUE) 
            {
                print_r($this->input->post());
                echo "<br><h3>Data berhasil disimpan.</h3>";
            }
            else
            {
            echo 'Terjadi kesalahan sewaktu menyimpan data';
            }
        }
    }
}
?>