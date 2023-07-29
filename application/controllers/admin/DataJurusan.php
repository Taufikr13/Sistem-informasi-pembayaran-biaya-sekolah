<?php
class DataJurusan extends CI_Controller{
    public function index(){
        $data['title'] = 'Data Jurusan';
        $data['jurusan'] = $this->pembayaranModel->get_data('tb_jurusan')->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/dataJurusan',$data);
        $this->load->view('admin_temp/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $jurusan = $this->input->post('jurusan');
            $singkatan = $this->input->post('singkatan');

            $data = array(
                'jurusan' => $jurusan,
                'singkatan' => $singkatan,
            );
            $this->pembayaranModel->insert_data($data,'tb_jurusan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataJurusan');
        }
    }

    public function updateData($id){
        $where = array('id_jurusan'=>$id);
        $data['jurusan'] = $this->db->query("SELECT * FROM tb_jurusan WHERE id_jurusan='$id'")->result();
        $data['title'] = "Update Data Jurusan";
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/updateJurusan',$data);
        $this->load->view('admin_temp/footer');

    }

    public function updateDataAksi(){
       
        $id = $this->input->post('id_jurusan');
        $jurusan = $this->input->post('jurusan');
        $singkatan = $this->input->post('singkatan');
        

        $data = array(
            'jurusan' => $jurusan,
            'singkatan' => $singkatan,
           
        );

        $where = array('id_jurusan' => $id);



        $this->pembayaranModel->update_data('tb_jurusan',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil diupdate</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');

      redirect('admin/dataJurusan');
 
    }
    public function _rules(){
        $this->form_validation->set_rules('jurusan','Jurusan','required');
        $this->form_validation->set_rules('singkatan','singkatan','required');
    }
    public function deleteData($id){
        $where = array('id_jurusan'=>$id);
        $this->pembayaranModel->delete_data($where,'tb_jurusan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

        redirect('admin/dataJurusan');



    }
}


?>