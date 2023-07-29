<?php
class PengaturanBebas extends CI_Controller{
    public function Index(){
        $data['title'] = 'Pengaturan Pembayaran Bebas';
        $data['dataBebas'] = $this->pembayaranModel->get_data('tb_bebas')->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_pengaturanBebas',$data);
        $this->load->view('admin_temp/footer');
    }

    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $tahun = $this->input->post('tahun');
            $nama_pembayaran = $this->input->post('nama_pembayaran');
            $nominal_bebas = $this->input->post('nominal_bebas');

            $data = array(
                'tahun' => $tahun,
                'nama_pembayaran' => $nama_pembayaran,
                'nominal_bebas' => $nominal_bebas,
            );
            $this->pembayaranModel->insert_data($data,'tb_bebas');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/pengaturanBebas');
        }
    }
    public function updateData($id){
        $where = array('id_bebas'=>$id);
        $data['dataBebas'] = $this->db->query("SELECT * FROM tb_bebas WHERE id_bebas='$id'")->result();
        $data['title'] = "Update Data Pembayaran Bebas";
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_updatePebebas',$data);
        $this->load->view('admin_temp/footer');

    }
    public function updateDataAksi(){
       
        $id = $this->input->post('id_bebas');
        $tahun = $this->input->post('tahun');
        $nama_pembayaran = $this->input->post('nama_pembayaran');
        $nominal_bebas = $this->input->post('nominal_bebas');
        

        $data = array(
            'tahun' => $tahun,
            'nama_pembayaran' => $nama_pembayaran,
            'nominal_bebas' => $nominal_bebas,
        );

        $where = array('id_bebas' => $id);



        $this->pembayaranModel->update_data('tb_bebas',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil diupdate</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');

      redirect('admin/pengaturanBebas');
 
    }
    public function _rules(){
        $this->form_validation->set_rules('tahun','tahun','required');
        $this->form_validation->set_rules('nama_pembayaran','nama_pembayaran','required');
        $this->form_validation->set_rules('nominal_bebas','nominal_bebas','required');
    }
    public function deleteData($id){
        $where = array('id_bebas'=>$id);
        $this->pembayaranModel->delete_data($where,'tb_bebas');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

        redirect('admin/pengaturanBebas');



    }
}

?>