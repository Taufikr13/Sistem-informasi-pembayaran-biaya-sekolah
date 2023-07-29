<?php

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') !='login'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login !</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('petugasLogin');
        }
        
    }
    public function index($tahun = NULL, $bulan =NULL){
        $data['title'] = 'Dashboard';
        $data['session_user'] = $this->db->get_where('tb_user', ['id_user'=>$this->session->userdata('id_user')])->row();

        $id_user = $this->session->userdata('id_user');
        $siswa = $this->db->query("SELECT * FROM tb_siswa");
        $data['siswa'] = $siswa->num_rows();
        $data['user'] = $this->db->get_where('tb_user', ['id_user'=>$this->session->userdata('id_user')])->row();

        $kalender = array(
            'start_day' => 'monday',
            'show_next_prev' => TRUE,
            'next_prev_url' => base_url()."admin/dashboard/index",
            'local_time' => time()
        );
       
        $this->load->library('calendar',$kalender);
        $data['kalender'] = $this->calendar->generate($tahun, $bulan);
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin_temp/footer');
    }
    public function panduan(){
        force_download('panduan/panduan.docx',NULL);
    }

    public function profilAdmin($id){
        $where = array('id_user' => $id);
        $data['title'] = 'Profil';
        $data['userr'] = $this->db->query("SELECT * FROM tb_user WHERE id_user='$id'")->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_profil',$data);
        $this->load->view('admin_temp/footer');

    }
}


?>