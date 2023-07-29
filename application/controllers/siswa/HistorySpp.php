<?php

class HistorySpp extends CI_Controller{
   
    public function index(){
        $data['title'] = 'Dashboard';
        $data['session_user'] = $this->db->get_where('tb_siswa', ['id_siswa'=>$this->session->userdata('id_siswa')])->row();
        $nisn = $this->session->userdata('nisn');
        
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar, tb_bayarspp WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND tb_siswa.id_spp=tb_spp.id_spp AND tb_spp.id_tahunAjar=tb_tahunajar.id_tahunAjar AND tb_bayarspp.nisn = tb_siswa.nisn and tb_bayarspp.nisn = $nisn")->result();
        $this->load->view('siswa_temp/header',$data);
        $this->load->view('siswa_temp/sidebar');
        $this->load->view('siswa/historySpp',$data);
        $this->load->view('siswa_temp/footer');
    }
}

