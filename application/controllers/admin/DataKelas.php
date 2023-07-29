<?php
class DataKelas extends CI_Controller{
    public function index(){
        $data['title'] = 'Data Kelas';
        $data['kelas'] = $this->pembayaranModel->get_data('tb_kelas')->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/dataKelas',$data);
        $this->load->view('admin_temp/footer'); 
    }
    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $kelas = $this->input->post('kelas');
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'kelas' => $kelas,
                'keterangan' => $keterangan,
            );
            $this->pembayaranModel->insert_data($data,'tb_kelas');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataKelas');
        }
    }

    public function updateData($id){
        $where = array('id_kelas'=>$id);
        $data['kelas'] = $this->db->query("SELECT * FROM tb_kelas WHERE id_kelas='$id'")->result();
        $data['title'] = "Update Data Kelas";
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/updateKelas',$data);
        $this->load->view('admin_temp/footer');

    }
    public function updateDataAksi(){
       
            $id = $this->input->post('id_kelas');
            $kelas = $this->input->post('kelas');
            $keterangan = $this->input->post('keterangan');
            

            $data = array(
                'kelas' => $kelas,
                'keterangan' => $keterangan,
               
            );

            $where = array('id_kelas' => $id);



            $this->pembayaranModel->update_data('tb_kelas',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataKelas');
     
    }
    public function _rules(){
        $this->form_validation->set_rules('kelas','Kelas','required');
        $this->form_validation->set_rules('keterangan','keterangan','required');
    }

    public function deleteData($id){
        $where = array('id_kelas'=>$id);
        $this->pembayaranModel->delete_data($where,'tb_kelas');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

        redirect('admin/dataKelas');



    }
}




?>