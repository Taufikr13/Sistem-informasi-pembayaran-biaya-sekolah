<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <?php echo $this->session->flashdata('pesan');?>
    <?php echo $this->session->flashdata('pesan');?>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter laporan
        </div>
        <div class="card-body">
        <form class="form-inline">
        <div class="form-group mb-2 ml-5">
        <label for="">Tanggal Awal</label>
        <input type="date" class="form-control ml-2" name="tanggalAwal">
        </div>
       
        <div class="form-group mb-2 ml-5">
        <label for="">Tanggal Akhir</label>
        <input type="date" class="form-control ml-2" name="tanggalAkhir">
        </select>
        </div>
        
        <?php
        if((isset($_GET['tanggalAwal']) && $_GET['tanggalAwal']!='') && (isset($_GET['tanggalAkhir'])&& $_GET['tanggalAkhir']!='')){
            $tanggalAwal = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];
        }else{
            $tanggalAwal = '';
            $tanggalAkhir ='';
        }
        ?>
            <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
            <?php if(count($siswa)>0){?>
                <div class="dropdown show">
                <a class="btn btn-success dropdown-toggle mb-2 ml-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cetak
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo base_url('admin/bayarBebas/cetakLaporan?tanggalAwal='.$tanggalAwal),'&tanggalAkhir='.$tanggalAkhir?>"><i class="fas fa-print"> Print</i></a>
                    <a class="dropdown-item" href="#"><i class="fas fa-file"></i> Excel</a>
                    <a class="dropdown-item" href="<?php echo base_url('admin/pembayaranSiswa/pdf?tanggalAwal='.$tanggalAwal),'&tanggalAkhir='.$tanggalAkhir?>"><i class="fas fa-file"></i> PDF</a>
                </div>
                </div>
            <?php }else{?>
                <button type="button" class="btn btn-success mb-2 ml-3" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-print"> Cetak</i>
                </button>
                


            <?php }?>

        </form>
        </div>
    </div>  
    <?php
    if((isset($_GET['tanggalAwal']) && $_GET['tanggalAwal']!='') && (isset($_GET['tanggalAkhir']) && $_GET['tanggalAkhir']!='')){
        $tanggalAwal = $_GET['tanggalAwal'];
        $tanggalAkhir = $_GET['tanggalAkhir'];
    }else{
       echo'<div class="alert alert-info">Filter Laporan menggunakan <span class="font-weight-bold">Tanggal Awal</span> dan <span class="font-weight-bold">Tanggal Akhir</span></div>';
    }
    ?>  
    <table class="table table-striped table-bordered" id="dataTable">
        <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">NISN</th>
            <th class="text-center">Kelas</th>
            <th class="text-center">Jurusan</th>
            <th class="text-center">Nama Pembayaran</th>
            <th class="text-center">Tanggal Bayar</th>
            <th class="text-center">Jumlah Bayar</th>

        </tr>
            
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($siswa as $sis):
        ?>

        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $sis->nama_siswa?></td>
            <td><?php echo $sis->nisn?></td>
            <td><?php echo $sis->kelas?></td>
            <td><?php echo $sis->jurusan?></td>
            <td><?php echo $sis->nama_pembayaran?></td>
            <td><?php echo $sis->tanggal_bayar?></td>
            <td>Rp. <?php echo number_format($sis->jumlah_bayar ,0,',','.')?></td>
        </tr>

        <?php endforeach?>
        </tbody>
        <tr>
            <th colspan="7" class="text-center">Total</th>
            <td colspan="2">Rp. <?php echo number_format($total,0,',','.')?></td>
        </tr>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Filter laporan masih kosong, silahkan isi telebih dahulu pada tanggal awal dan tanggal akhir yang anda pilih 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

