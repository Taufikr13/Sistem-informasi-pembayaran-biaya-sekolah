<?php
class PembayaranSiswa extends CI_Controller{
    public function Index(){

        
        $data['title'] = 'Transaksi SPP';
        if((isset($_GET['nisn']) && $_GET['nisn']!='')){
            $nisn = $_GET['nisn'];
        }else{
            $nisn='';
        }
        // $data['pembayaran'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE nisn='$nisn'")->result();
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND tb_siswa.id_spp=tb_spp.id_spp AND tb_spp.id_tahunAjar=tb_tahunajar.id_tahunAjar AND nisn = '$nisn' LIMIT 1")->result();
    
        $data['dataBayar']= $this->db->select_sum('jumlahBayar')->where('nisn',$nisn)->get('tb_bayarspp')->row()->jumlahBayar;
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/pembayaranSiswa',$data);
        $this->load->view('admin_temp/footer');
    }

    public function bayarSpp($nisn){
        $where = array('nisn' => $nisn);
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar 
        WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan 
        AND tb_siswa.id_spp=tb_spp.id_spp AND tb_spp.id_tahunAjar=tb_tahunajar.id_tahunAjar 
        AND nisn = '$nisn' LIMIT 1")->result();
        $data['dataBayar']= $this->db->select_sum('jumlahBayar')->where('nisn',$nisn)->get('tb_bayarspp')->row()->jumlahBayar;
        $data['title'] = 'Pembayaran SPP';
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/v_tambahBayarspp',$data);
        $this->load->view('admin_temp/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $id_siswa = $this->input->post('id_siswa');
            $nisn = $this->input->post('nisn');
            $tanggal_bayar = $this->input->post('tanggal_bayar');
            $id_tahunAjar = $this->input->post('id_tahunAjar');
            $tahunBayarspp = $this->input->post('tahunBayarspp');
            $bulanbayarSpp = $this->input->post('bulanbayarSpp');
            $id_spp = $this->input->post('id_spp');
            $jumlahBayar = $this->input->post('jumlahBayar');

            $data = array(
                'id_siswa' => $id_siswa,
                'nisn' => $nisn,
                'tanggal_bayar' => $tanggal_bayar,
                'id_tahunAjar' => $id_tahunAjar,
                'tahunBayarspp' => $tahunBayarspp,
                'bulanbayarSpp' => $bulanbayarSpp,
                'id_spp' => $id_spp,
                'jumlahBayar' => $jumlahBayar,
            );
            $this->pembayaranModel->insert_data($data,'tb_bayarspp');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/pembayaranSiswa');
        }

    }

    public function history($nisn){
        $where = array('nisn' => $nisn);
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar, tb_bayarspp WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND tb_siswa.id_spp=tb_spp.id_spp AND tb_spp.id_tahunAjar=tb_tahunajar.id_tahunAjar AND tb_bayarspp.nisn = tb_siswa.nisn and tb_bayarspp.nisn = $nisn")->result();
        $data['title'] = 'History Pembayaran SPP';
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/historySpp',$data);
        $this->load->view('admin_temp/footer');
    }

    public function kwitansi($id_pembayaranSpp){
        $where = array('id_pembayaranSpp' => $id_pembayaranSpp);
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar, tb_bayarspp WHERE tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_jurusan = tb_jurusan.id_jurusan AND tb_siswa.id_spp=tb_spp.id_spp AND tb_spp.id_tahunAjar=tb_tahunajar.id_tahunAjar AND tb_bayarspp.nisn = tb_siswa.nisn and tb_bayarspp.id_pembayaranSpp = '$id_pembayaranSpp' LIMIT 1")->result();
        $data['title'] = 'Kwitansi Pembayaran';
        
        $this->load->view('admin/kwitansiSpp',$data);
        
    }

    public function _rules(){
        $this->form_validation->set_rules('nisn','nisn','required');
        $this->form_validation->set_rules('tanggal_bayar','tanggal_bayar','required');
        $this->form_validation->set_rules('id_tahunAjar','id_tahunAjar','required');
        $this->form_validation->set_rules('tahunBayarspp','tahunBayarspp','required');
        $this->form_validation->set_rules('bulanbayarSpp','bulanbayarSpp','required');
        $this->form_validation->set_rules('id_spp','id_spp','required');
        $this->form_validation->set_rules('jumlahBayar','jumlahBayar','required');
    }
    public function deleteData($id){
        $where = array('id_pembayaranSpp'=>$id);
        $this->pembayaranModel->delete_data($where,'tb_bayarspp');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

        redirect('admin/pembayaranSiswa');



    }

    public function laporanSpp(){
        $data['title'] = 'Laporan SPP';
        if((isset($_GET['tanggalAwal']) && $_GET['tanggalAwal']!='') && (isset($_GET['tanggalAkhir'])&& $_GET['tanggalAkhir']!='')){
            $tanggalAwal = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];
        }else{
            $tanggalAwal = '';
            $tanggalAkhir ='';
        }
        // $data['pembayaran'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE nisn='$nisn'")->result();
        $data['siswa'] = $this->db->query("SELECT * FROM tb_bayarspp,tb_siswa, tb_kelas, tb_jurusan 
        where tb_siswa.id_jurusan=tb_jurusan.id_jurusan and tb_Siswa.id_kelas=tb_kelas.id_kelas and tb_bayarspp.nisn=tb_siswa.nisn and tanggal_bayar BETWEEN '$tanggalAwal' and '$tanggalAkhir' order by id_pembayaranSpp DESC")->result();
        $this->db->select_sum('jumlahBayar');
        $this->db->where('tanggal_bayar >=', $tanggalAwal);
        $this->db->where('tanggal_bayar <=', $tanggalAkhir);
        $query = $this->db->get('tb_bayarspp');
        $result = $query->row();
        $total = $result->jumlahBayar;
        $data['total'] = $total;

        // $data['dataBayar']= $this->db->select_sum('jumlahBayar')->where('nisn',$nisn)->get('tb_bayarspp')->row()->jumlahBayar;
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin_temp/sidebar');
        $this->load->view('admin/laporanSpp',$data);
        $this->load->view('admin_temp/footer');
    }


    public function cetakLaporan(){
        $data['title'] = 'Laporan SPP';
        if((isset($_GET['tanggalAwal']) && $_GET['tanggalAwal']!='') && (isset($_GET['tanggalAkhir'])&& $_GET['tanggalAkhir']!='')){
            $tanggalAwal = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];
        }else{
            $tanggalAwal = '';
            $tanggalAkhir ='';
        }
        // $data['pembayaran'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE nisn='$nisn'")->result();
        $data['siswa'] = $this->db->query("SELECT * FROM tb_bayarspp,tb_siswa, tb_kelas, tb_jurusan 
        where tb_siswa.id_jurusan=tb_jurusan.id_jurusan and tb_Siswa.id_kelas=tb_kelas.id_kelas and tb_bayarspp.nisn=tb_siswa.nisn and tanggal_bayar BETWEEN '$tanggalAwal' and '$tanggalAkhir' order by id_pembayaranSpp DESC")->result();
        $this->db->select_sum('jumlahBayar');
        $this->db->where('tanggal_bayar >=', $tanggalAwal);
        $this->db->where('tanggal_bayar <=', $tanggalAkhir);
        $query = $this->db->get('tb_bayarspp');
        $result = $query->row();
        $total = $result->jumlahBayar;
        $data['total'] = $total;
        // $data['dataBayar']= $this->db->select_sum('jumlahBayar')->where('nisn',$nisn)->get('tb_bayarspp')->row()->jumlahBayar;
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin/cetaklaporanSpp',$data);
       
        
    }


    public function cetakExcel(){
        $data['title'] = 'Laporan SPP';
        if((isset($_GET['tanggalAwal']) && $_GET['tanggalAwal']!='') && (isset($_GET['tanggalAkhir'])&& $_GET['tanggalAkhir']!='')){
            $tanggalAwal = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];
        }else{
            $tanggalAwal = '';
            $tanggalAkhir ='';
        }
        // $data['pembayaran'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE nisn='$nisn'")->result();
        $data['siswa'] = $this->db->query("SELECT * FROM tb_bayarspp,tb_siswa, tb_kelas, tb_jurusan 
        where tb_siswa.id_jurusan=tb_jurusan.id_jurusan and tb_Siswa.id_kelas=tb_kelas.id_kelas and tb_bayarspp.nisn=tb_siswa.nisn and tanggal_bayar BETWEEN '$tanggalAwal' and '$tanggalAkhir' order by id_pembayaranSpp DESC")->result();
         $this->db->select_sum('jumlahBayar');
         $this->db->where('tanggal_bayar >=', $tanggalAwal);
         $this->db->where('tanggal_bayar <=', $tanggalAkhir);
         $query = $this->db->get('tb_bayarspp');
         $result = $query->row();
         $total = $result->jumlahBayar;
         $data['total'] = $total;
        // $data['dataBayar']= $this->db->select_sum('jumlahBayar')->where('nisn',$nisn)->get('tb_bayarspp')->row()->jumlahBayar;
        $this->load->view('admin_temp/header',$data);
        $this->load->view('admin/sppExcel',$data);
       
        
    }

    public function pdf(){
        $this->load->library('dompdf_gen');
        $data['title'] = 'Laporan SPP';
        if((isset($_GET['tanggalAwal']) && $_GET['tanggalAwal']!='') && (isset($_GET['tanggalAkhir'])&& $_GET['tanggalAkhir']!='')){
            $tanggalAwal = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];
        }else{
            $tanggalAwal = '';
            $tanggalAkhir ='';
        }
        // $data['pembayaran'] = $this->db->query("SELECT * FROM tb_siswa,tb_kelas,tb_jurusan,tb_spp, tb_tahunajar WHERE nisn='$nisn'")->result();
        $data['siswa'] = $this->db->query("SELECT * FROM tb_bayarspp,tb_siswa, tb_kelas, tb_jurusan 
        where tb_siswa.id_jurusan=tb_jurusan.id_jurusan and tb_Siswa.id_kelas=tb_kelas.id_kelas and tb_bayarspp.nisn=tb_siswa.nisn and tanggal_bayar BETWEEN '$tanggalAwal' and '$tanggalAkhir' order by id_pembayaranSpp DESC")->result();
        $this->db->select_sum('jumlahBayar');
        $this->db->where('tanggal_bayar >=', $tanggalAwal);
        $this->db->where('tanggal_bayar <=', $tanggalAkhir);
        $query = $this->db->get('tb_bayarspp');
        $result = $query->row();
        $total = $result->jumlahBayar;
        $data['total'] = $total;
        // $data['dataBayar']= $this->db->select_sum('jumlahBayar')->where('nisn',$nisn)->get('tb_bayarspp')->row()->jumlahBayar;
        
        $this->load->view('admin/laporansppPdf',$data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_SPP.pdf", array('Attachment'=>0));

    }


}

?>
