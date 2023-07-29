<?php
class pengaturanSpp extends CI_Controller{
    public function Index(){
        $data['title'] = 'Pengaturan SPP';
        $data['tahunAjar'] = $this->pembayaranModel->get_data('tb_tahunAjar')->result();
        $data['dataSpp'] = $this->db->query("SELECT * FROM tb_spp, tb_tahunajar WHERE tb_spp.id_tahunAjar =tb_tahunajar.id_tahunAjar")->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_pengaturanSpp',$data);
        $this->load->view('admin_temp/footer');
    }

    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $id_tahunAjar = $this->input->post('id_tahunAjar');
            $nominal = $this->input->post('nominal');

            $data = array(
                'id_tahunAjar' => $id_tahunAjar,
                'nominal' => $nominal,
            );
            $this->pembayaranModel->insert_data($data,'tb_spp');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/pengaturanSpp');
        }
    }
    public function updateData($id){
        $where = array('id_spp'=>$id);
        $data['tahunAjar'] = $this->pembayaranModel->get_data('tb_tahunAjar')->result();
        $data['dataSpp'] = $this->db->query("SELECT * FROM tb_spp, tb_tahunajar WHERE tb_spp.id_tahunAjar=tb_tahunajar.id_tahunAjar AND id_spp='$id'")->result();
        $data['title'] = "Update Data SPP";
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_updatePspp',$data);
        $this->load->view('admin_temp/footer');

    }
    public function updateDataAksi(){
       
            $id = $this->input->post('id_spp');
            $id_tahunAjar = $this->input->post('id_tahunAjar');
            $nominal = $this->input->post('nominal');
            

            $data = array(
                'id_tahunAjar' => $id_tahunAjar,
                'nominal' => $nominal,
               
            );

            $where = array('id_spp' => $id);



            $this->pembayaranModel->update_data('tb_spp',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/pengaturanSpp');
     
    }
    public function _rules(){
        $this->form_validation->set_rules('id_tahunAjar','id_tahunAjar','required');
        $this->form_validation->set_rules('nominal','nominal','required');
    }

    public function deleteData($id){
        $where = array('id_spp'=>$id);
        $this->pembayaranModel->delete_data($where,'tb_spp');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

        redirect('admin/pengaturanSPP');



    }
   
}

?>