<?php
class ProfilAdmin extends CI_Controller{
    public function index($id){
        $where = array('id_user' => $id);
        $data['title'] = 'Profil';
        $data['siswa'] = $this->db->query("SELECT * FROM tb_user WHERE id_user='$id'")->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_profil',$data);
        $this->load->view('admin_temp/footer');

    }
}


?>