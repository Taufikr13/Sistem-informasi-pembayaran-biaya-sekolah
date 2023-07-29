<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasLogin extends CI_Controller {


	public function index()
	{
		$this->_rules();
		if($this->form_validation->run()==FALSE){
			$data['title']= "Halaman Login";
			$this->load->view('admin_temp/header',$data);
			$this->load->view('loginPetugas');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek = $this->pembayaranModel->cek_login($username, $password);
			if($cek == FALSE){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username Atau Password Salah !</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('petugasLogin');
			}else{
                
                $data_session = array(
                    'nama' => $username,
                    'status' => "login"
                    );
    
                $this->session->set_userdata($data_session);
				
                $this->session->set_userdata('nama_user',$cek->nama_user);
				$this->session->set_userdata('id_user',$cek->id_user);
				$this->session->set_userdata('foto',$cek->foto);
                    redirect('admin/dashboard');
            
			
			
			}

		}
		
	}

	public function _rules(){
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
	}

    public function logout(){
		$this->session->sess_destroy();
		redirect('petugasLogin');
	}
}
