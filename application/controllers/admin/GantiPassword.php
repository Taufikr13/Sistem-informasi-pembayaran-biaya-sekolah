<?php
class GantiPassword extends CI_Controller{

    public function index(){
        $data['title']="Ganti Password";
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('v_gantiPassword',$data);
        $this->load->view('admin_temp/footer');
    }

    public function gantiPasswordAksi(){
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passBaru', 'password baru','required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass', 'ulangi password','required');

        if($this->form_validation->run() !=FALSE){
            $data = array('password'=>md5($passBaru));
            $id = array('id_user'=> $this->session->userdata('id_user'));
            $this->pembayaranModel->update_data('tb_user',$data,$id);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password Berhasil diganti</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('petugasLogin');
     
        }else{
            $data['title']="Ganti Password";
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('v_gantiPassword',$data);
        $this->load->view('admin_temp/footer');
        }
    }
}


?>