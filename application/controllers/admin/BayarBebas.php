<?php
class BayarBebas extends CI_Controller{
    public function Index(){

        
        $data['title'] = 'Transaksi Pembayaran';
        if((isset($_GET['nisn']) && $_GET['nisn']!='')){
            $nisn = $_GET['nisn'];
        }else{
            $nisn='';
        }
        // $data['pembayaran'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE nisn='$nisn'")->result();
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND nisn = '$nisn' LIMIT 1")->result();
        $data['dataBayar'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan, tb_bebas, tb_bayarbebas WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND tb_siswa.nisn = tb_bayarbebas.nisn AND tb_bayarbebas.id_bebas = tb_bebas.id_bebas AND tb_bayarbebas.nisn = '$nisn' ORDER BY tanggal_bayar DESC")->result();
        $data['dataBebas'] = $this->pembayaranModel->get_data('tb_bebas')->result();
    
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_bayarBebas',$data);
        $this->load->view('admin_temp/footer');
    }

    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $id_siswa = $this->input->post('id_siswa');
            $nisn = $this->input->post('nisn');
            $id_bebas = $this->input->post('id_bebas');
            $tanggal_bayar = $this->input->post('tanggal_bayar');
            $jumlah_bayar = $this->input->post('jumlah_bayar');


            $data = array(
                'id_siswa' => $id_siswa,
                'nisn' => $nisn,
                'id_bebas' => $id_bebas,
                'tanggal_bayar' => $tanggal_bayar,
                'jumlah_bayar' => $jumlah_bayar,
            );
            $this->pembayaranModel->insert_data($data,'tb_bayarbebas');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/bayarBebas');
        }
    }


    public function updateBebas($id){
        $data['title'] = 'Transaksi Bebas';
        $where = array('id_bayarBebas'=>$id);
        $data['siswa'] = $this->db->query("SELECT * FROM tb_bebas,tb_siswa, tb_kelas, tb_jurusan, tb_bayarbebas 
        where tb_siswa.id_jurusan=tb_jurusan.id_jurusan 
        and  tb_Siswa.id_kelas=tb_kelas.id_kelas 
        and tb_bayarbebas.nisn=tb_siswa.nisn 
        and tb_bayarbebas.id_bebas=tb_bebas.id_bebas and id_bayarBebas ='$id' ")->result();
        
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/updateBayarbebas',$data);
        $this->load->view('admin_temp/footer');
    }
    public function updateDataAksi(){
        $id =$this->input->post('id_bayarBebas');
        $id_siswa = $this->input->post('id_siswa');
        $nisn = $this->input->post('nisn');
        $id_bebas = $this->input->post('id_bebas');
        $tanggal_bayar = $this->input->post('tanggal_bayar');
        $jumlah_bayar = $this->input->post('jumlah_bayar');


        $data = array(
            'id_siswa' => $id_siswa,
            'nisn' => $nisn,
            'id_bebas' => $id_bebas,
            'tanggal_bayar' => $tanggal_bayar,
            'jumlah_bayar' => $jumlah_bayar,
        );

        $where = array('id_bayarBebas' => $id);
        $this->pembayaranModel->update_data('tb_bayarbebas',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil ditambahkan</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');

      redirect('admin/bayarBebas');
    }

    public function _rules(){
        $this->form_validation->set_rules('nisn','nisn','required');
        $this->form_validation->set_rules('id_bebas','id_bebas','required');
        $this->form_validation->set_rules('tanggal_bayar','tanggal_bayar','required');
        $this->form_validation->set_rules('jumlah_bayar','jumlah_bayar','required');
    }
    
    public function laporanBebas(){
        
        $data['title'] = 'Laporan Pembayaran';
        if((isset($_GET['tanggalAwal']) && $_GET['tanggalAwal']!='') && (isset($_GET['tanggalAkhir'])&& $_GET['tanggalAkhir']!='')){
            $tanggalAwal = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];
        }else{
            $tanggalAwal = '';
            $tanggalAkhir ='';
        }
        $data['siswa'] = $this->db->query("SELECT * FROM tb_bebas,tb_siswa, tb_kelas, tb_jurusan, tb_bayarbebas 
        where tb_siswa.id_jurusan=tb_jurusan.id_jurusan 
        and  tb_Siswa.id_kelas=tb_kelas.id_kelas 
        and tb_bayarbebas.nisn=tb_siswa.nisn 
        and tb_bayarbebas.id_bebas=tb_bebas.id_bebas and tanggal_bayar BETWEEN '$tanggalAwal' and '$tanggalAkhir' order by id_bayarBebas DESC")->result();
        $this->db->select_sum('jumlah_bayar');
        $this->db->where('tanggal_bayar >=', $tanggalAwal);
        $this->db->where('tanggal_bayar <=', $tanggalAkhir);
        $query = $this->db->get('tb_bayarbebas');
        $result = $query->row();
        $total = $result->jumlah_bayar;
        $data['total'] = $total;
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_laporanBebas',$data);
        $this->load->view('admin_temp/footer');
    }
    public function cetakLaporan(){
        $data['title'] = 'Laporan Pembayaran';
        if((isset($_GET['tanggalAwal']) && $_GET['tanggalAwal']!='') && (isset($_GET['tanggalAkhir'])&& $_GET['tanggalAkhir']!='')){
            $tanggalAwal = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];
        }else{
            $tanggalAwal = '';
            $tanggalAkhir ='';
        }
        // $data['pembayaran'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE nisn='$nisn'")->result();
        $data['siswa'] = $this->db->query("SELECT * FROM tb_bebas,tb_siswa, tb_kelas, tb_jurusan, tb_bayarbebas 
        where tb_siswa.id_jurusan=tb_jurusan.id_jurusan 
        and  tb_Siswa.id_kelas=tb_kelas.id_kelas 
        and tb_bayarbebas.nisn=tb_siswa.nisn 
        and tb_bayarbebas.id_bebas=tb_bebas.id_bebas and tanggal_bayar BETWEEN '$tanggalAwal' and '$tanggalAkhir' order by id_bayarBebas DESC")->result();
        $this->db->select_sum('jumlah_bayar');
        $this->db->where('tanggal_bayar >=', $tanggalAwal);
        $this->db->where('tanggal_bayar <=', $tanggalAkhir);
        $query = $this->db->get('tb_bayarbebas');
        $result = $query->row();
        $total = $result->jumlah_bayar;
        $data['total'] = $total;
        // $data['dataBayar']= $this->db->select_sum('jumlahBayar')->where('nisn',$nisn)->get('tb_bayarspp')->row()->jumlahBayar;
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin/cetaklaporanBebas',$data);
       
        
    }

    public function kwitansi($id_bayarBebas){
        $where = array('id_bayarBebas' => $id_bayarBebas);
        $data['siswa'] = $this->db->query("SELECT * FROM tb_bebas,tb_siswa, tb_kelas, tb_jurusan, tb_bayarbebas 
        where tb_siswa.id_jurusan=tb_jurusan.id_jurusan 
        and  tb_Siswa.id_kelas=tb_kelas.id_kelas 
        and tb_bayarbebas.nisn=tb_siswa.nisn 
        and tb_bayarbebas.id_bebas=tb_bebas.id_bebas and id_bayarBebas='$id_bayarBebas'")->result();
        $data['title'] = 'Kwitansi Pembayaran';
        
        $this->load->view('admin/kwitansiBebas',$data);
        
    }

    public function deleteData($id){
        $where = array('id_bayarBebas'=>$id);
        $this->pembayaranModel->delete_data($where,'tb_bayarbebas');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

        redirect('admin/pembayaranSiswa');



    }
   
}

?>
