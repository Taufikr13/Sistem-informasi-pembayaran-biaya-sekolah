<?php
class pengaturanSeragam extends CI_Controller{
    public function Index(){
        $data['title'] = 'Pengaturan Seragam';
        $data['tahunAjar'] = $this->pembayaranModel->get_data('tb_tahunAjar')->result();
        $data['dataSeragam'] = $this->pembayaranModel->get_data('tb_seragam')->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_peSeragam',$data);
        $this->load->view('admin_temp/footer');
    }

    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $tahunSeragam = $this->input->post('tahunSeragam');
            $nominalSeragam = $this->input->post('nominalSeragam');

            $data = array(
                'tahunSeragam' => $tahunSeragam,
                'nominalSeragam' => $nominalSeragam,
            );
            $this->pembayaranModel->insert_data($data,'tb_seragam');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/pengaturanSeragam');
        }
    }
    public function updateData($id){
        $where = array('id_seragam'=>$id);
        $data['dataSeragam'] = $this->db->query("SELECT * FROM tb_seragam WHERE id_seragam='$id'")->result();
        $data['title'] = "Update Data Seragam";
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_updatePspp',$data);
        $this->load->view('admin_temp/footer');

    }
    public function _rules(){
        $this->form_validation->set_rules('tahunSeragam','tahunSeragam','required');
        $this->form_validation->set_rules('nominalSeragam','nominalSeragam','required');
    }
}

?>