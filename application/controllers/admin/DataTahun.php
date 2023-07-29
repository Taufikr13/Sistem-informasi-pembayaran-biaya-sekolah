<?php
class DataTahun extends CI_Controller{
    public function index(){
        $data['title'] = 'Data Tahun Ajar';
        $data['tahunAjar'] = $this->pembayaranModel->get_data('tb_tahunAjar')->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/tahunAjar');
        $this->load->view('admin_temp/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $tahunMulai = $this->input->post('tahunMulai');
            $tahunSelesai = $this->input->post('tahunSelesai');
            $ket = $this->input->post('ket');

            $data = array(
                'tahunMulai' => $tahunMulai,
                'tahunSelesai' => $tahunSelesai,
                'ket' => $ket,
            );
            $this->pembayaranModel->insert_data($data,'tb_tahunajar');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataTahun');
        }
    }

    public function updateData($id){
        $where = array('id_tahunAjar'=>$id);
        $data['tahun'] = $this->db->query("SELECT * FROM tb_tahunajar WHERE id_tahunAjar='$id'")->result();
        $data['title'] = "Update Tahun Ajar";
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/updateTahun',$data);
        $this->load->view('admin_temp/footer');

    }
    public function updateDataAksi(){
       
        $id = $this->input->post('id_tahunAjar');
        $tahunMulai = $this->input->post('tahunMulai');
        $tahunSelesai = $this->input->post('tahunSelesai');
        $ket = $this->input->post('ket');
        

        $data = array(
            'tahunMulai' => $tahunMulai,
            'tahunSelesai' => $tahunSelesai,
            'ket' => $ket,
           
        );

        $where = array('id_tahunAjar' => $id);



        $this->pembayaranModel->update_data('tb_tahunajar',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil diupdate</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');

      redirect('admin/dataTahun');
 
    }
    public function _rules(){
        $this->form_validation->set_rules('tahunMulai','Tahun Mulai','required');
        $this->form_validation->set_rules('tahunSelesai','Tahun Selesai','required');
        $this->form_validation->set_rules('ket','keterangan','required');
    }

    public function deleteData($id){
        $where = array('id_tahunAjar'=>$id);
        $this->pembayaranModel->delete_data($where,'tb_tahunajar');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

    redirect('admin/dataTahun');
    }
}


?>