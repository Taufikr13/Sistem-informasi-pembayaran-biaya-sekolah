<?php
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
class DataSiswa extends CI_Controller{
    public function index(){
        $data['title'] = 'Data Siswa';
        // $perintah = mysqli_query($conn,"SELECT * FROM absen INNER JOIN tb_pegawai ON absen.id_pegawai = tb_pegawai.id_pegawai");
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan=tb_jurusan.id_jurusan")->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/dataSiswa',$data);
        $this->load->view('admin_temp/footer');
    }
    public function tambahData(){
        $data['title'] = 'Tambah Data Siswa';
        $data['kelas'] = $this->pembayaranModel->get_data('tb_kelas')->result();
        $data['jurusan'] = $this->pembayaranModel->get_data('tb_jurusan')->result();
        $data['spp'] = $this->db->query("SELECT * FROM tb_spp, tb_tahunajar WHERE tb_spp.id_tahunAjar = tb_tahunajar.id_tahunAjar ")->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/tambahDataSiswa',$data);
        $this->load->view('admin_temp/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $nama_siswa = $this->input->post('nama_siswa');
            $nis = $this->input->post('nis');
            $nisn = $this->input->post('nisn');
            $id_kelas = $this->input->post('id_kelas');
            $id_jurusan = $this->input->post('id_jurusan');
            $no_hp = $this->input->post('no_hp');
            $id_spp = $this->input->post('id_spp');
            $foto = $_FILES['foto']['name'];
            if($foto=''){

            }else{
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $config['file_name'] = 'foto' .uniqid();
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto')){
                    echo "Foto Gagal Diupload";
                }else{
                    $foto = $this->upload->data('file_name');
                }
            }
            
            $data = array(
                'nama_siswa' => $nama_siswa,
                'nis' => $nis,
                'nisn' => $nisn,
                'id_kelas' => $id_kelas,
                'id_jurusan' => $id_jurusan,
                'id_spp' => $id_spp,
                'foto' => $foto,
                'no_hp' => $no_hp,

            );
            $this->pembayaranModel->insert_data($data,'tb_siswa');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan <i class="fas fa-user-plus"></i></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataSiswa');

        }



    }

    public function updateData($id){
        $where = array('id_siswa' => $id);
        $data['title'] = 'Update Data Siswa';
        $data['kelas'] = $this->pembayaranModel->get_data('tb_kelas')->result();
        $data['jurusan'] = $this->pembayaranModel->get_data('tb_jurusan')->result();
        $data['spp'] = $this->db->query("SELECT * FROM tb_spp, tb_tahunajar WHERE tb_spp.id_tahunAjar = tb_tahunajar.id_tahunAjar ")->result();
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND tb_siswa.id_spp=tb_spp.id_spp AND tb_spp.id_tahunAjar=tb_tahunajar.id_tahunAjar AND id_siswa = '$id'")->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/updateDataSiswa',$data);
        $this->load->view('admin_temp/footer');

        
    }

    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id = $this->input->post('id_siswa');
            $nama_siswa = $this->input->post('nama_siswa');
            $nis = $this->input->post('nis');
            $nisn = $this->input->post('nisn');
            $id_kelas = $this->input->post('id_kelas');
            $id_jurusan = $this->input->post('id_jurusan');
            $id_spp = $this->input->post('id_spp');
            $no_hp = $this->input->post('no_hp');
            $foto = $_FILES['userfile']['name'];

            if($foto){
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $config['file_name'] = 'foto' . time();
                
                $this->load->library('upload',$config);

                if($this->upload->do_upload('userfile')){
                   $userfile = $this->upload->data('file_name');
                   $this->db->set('foto',$userfile);
                }else{
                    echo 'gagal di rubah';
                }
            }
            
            $data = array(
                
                'nis' => $nis,
                'nama_siswa' => $nama_siswa,
                'nisn' => $nisn,
                'id_kelas' => $id_kelas,
                'id_jurusan' => $id_jurusan,
                'id_spp' => $id_spp,
                'no_hp' => $no_hp,
                
                

            );

            $where = array('id_siswa' => $id);

            $this->pembayaranModel->update_data('tb_siswa',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataSiswa');

        }

    }

    public function detailSiswa($id){
        $where = array('id_siswa' => $id);
        $data['title'] = 'Detali Siswa';
        $data['kelas'] = $this->pembayaranModel->get_data('tb_kelas')->result();
        $data['jurusan'] = $this->pembayaranModel->get_data('tb_jurusan')->result();
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND tb_siswa.id_spp=tb_spp.id_spp AND tb_spp.id_tahunAjar=tb_tahunajar.id_tahunAjar AND id_siswa = '$id'")->result();
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_detailSiswa',$data);
        $this->load->view('admin_temp/footer');

        
    }
    public function _rules(){
        $this->form_validation->set_rules('nama_siswa','Nama siswa','required');
        $this->form_validation->set_rules('nis','NIS','required');
        $this->form_validation->set_rules('nisn','nisn','required');
        $this->form_validation->set_rules('id_jurusan','Jurusan','required');
        $this->form_validation->set_rules('id_kelas','Kelas','required');

    }
    public function import(){
        $data['title'] = 'Import data';
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_import',$data);
        $this->load->view('admin_temp/footer');
    }

    public function uploaddata()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('importexcel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $siswa = array(
                            'nis'  => $row->getCellAtIndex(1),
                            'nisn'  => $row->getCellAtIndex(2),
                            'nama_siswa'  => $row->getCellAtIndex(3),
                            'id_kelas'       => $row->getCellAtIndex(4),
                            'id_jurusan'       => $row->getCellAtIndex(5),
                            'no_hp'       => $row->getCellAtIndex(6),
                            'id_spp'       => $row->getCellAtIndex(7),
                            'foto'       => $row->getCellAtIndex(8),
                        );
                        $this->pembayaranModel->import_data($siswa);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('uploads/' . $file['file_name']);
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil diimport</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/dataSiswa/import');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
        };
    } 

    public function format_excel(){
        force_download('format/format.xlsx',NULL);
    }
}

?>