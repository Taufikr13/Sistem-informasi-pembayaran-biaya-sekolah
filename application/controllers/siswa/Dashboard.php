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
				redirect('welcome');
        }
        
    }
    public function index(){
        $data['title'] = 'Dashboard';
        $data['session_user'] = $this->db->get_where('tb_siswa', ['id_siswa'=>$this->session->userdata('id_siswa')])->row();
        $this->load->view('siswa_temp/header',$data);
        $this->load->view('siswa_temp/sidebar');
        $this->load->view('siswa/dashboard',$data);
        $this->load->view('siswa_temp/footer');
    }
    public function historyBayar(){
        $data['title'] = 'History SPP';
        $data['session_user'] = $this->db->get_where('tb_siswa', ['id_siswa'=>$this->session->userdata('id_siswa')])->row();
        $nisn = $this->session->userdata('nisn');
        
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar, tb_bayarspp WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND tb_siswa.id_spp=tb_spp.id_spp AND tb_spp.id_tahunAjar=tb_tahunajar.id_tahunAjar AND tb_bayarspp.nisn = tb_siswa.nisn and tb_bayarspp.nisn = $nisn")->result();
        $this->load->view('siswa_temp/header',$data);
        $this->load->view('siswa_temp/sidebar');
        $this->load->view('siswa/historySpp',$data);
        $this->load->view('siswa_temp/footer');
    }
    public function historyBebas(){
        $data['title'] = 'History Pembayaran';
        $data['session_user'] = $this->db->get_where('tb_siswa', ['id_siswa'=>$this->session->userdata('id_siswa')])->row();
        $nisn = $this->session->userdata('nisn');
        
        $data['dataBayar'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan, tb_bebas, tb_bayarbebas WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND tb_siswa.nisn = tb_bayarbebas.nisn AND tb_bayarbebas.id_bebas = tb_bebas.id_bebas AND tb_bayarbebas.nisn = '$nisn' ORDER BY tanggal_bayar DESC")->result();
        $this->load->view('siswa_temp/header',$data);
        $this->load->view('siswa_temp/sidebar');
        $this->load->view('siswa/historyBebas',$data);
        $this->load->view('siswa_temp/footer');
    }
}


?>