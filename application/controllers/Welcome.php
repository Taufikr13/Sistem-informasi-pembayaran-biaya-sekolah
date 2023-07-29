<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->_rules();
		if($this->form_validation->run()==FALSE){
			$data['title']= "Login Siswa";
			$this->load->view('admin_temp/header',$data);
			$this->load->view('loginSiswa');
		}else{
			$nis = $this->input->post('nis');
			$nisn = $this->input->post('nisn');
			$cek = $this->pembayaranModel->cek_siswa($nis, $nisn);
			if($cek == FALSE){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>NIS Atau NISN Salah !</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('welcome');
			}else{
				$data_session = array(
                    'status' => "login"
                    );
    
                $this->session->set_userdata($data_session);
				
                $this->session->set_userdata('nama_siswa',$cek->nama_siswa);
				$this->session->set_userdata('id_siswa',$cek->id_siswa);
				$this->session->set_userdata('nisn',$cek->nisn);
			redirect('siswa/dashboard');
			
			}

		}
		
	}

	public function _rules(){
		$this->form_validation->set_rules('nis','nis','required');
		$this->form_validation->set_rules('nisn','nisn','required');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
