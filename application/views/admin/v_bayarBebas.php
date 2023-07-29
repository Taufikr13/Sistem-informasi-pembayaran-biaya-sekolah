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
            Filter Data Siswa
        </div>
        <div class="card-body">
        <form class="form-inline">
            <div class="form-group mb-2 ml-5">
               <label for="">NISN :</label>
               <input type="text" name="nisn" class="form-control ml-2" placeholder="Mencari Gunakan NISN"><br>
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
        </form>
        </div>
    </div>  
    <?php
    if((isset($_GET['nisn']) && $_GET['nisn']!='')){
        $nisn = $_GET['nisn'];
    ?>
    
    
    <?php }else{
       echo'<div class="alert alert-info">Cari Siswa Menggunakan <span class="font-weight-bold">NISN</div>';
    }
    ?>  

<div class="row">
<?php foreach($siswa as $sis):?>
    <div class="col-lg-8 mb-4">
    <div class="card shadow mb-4">
        <div class="card-body">


     <form action="<?php echo base_url('admin/bayarBebas/tambahDataAksi') ?>" method="post">
        <div class="form-group">
        <label for="">Nama</label>
        <input type="text" value="<?php echo$sis->nama_siswa?>" class="form-control" disabled>
        <input type="hidden" name="id_siswa" value="<?php echo$sis->id_siswa?>">
        </div>
        <div class="form-group">
        <label for="">NISN</label>
        
        <input type="text" class="form-control" value="<?php echo $sis->nisn?>" disabled>
        <input type="hidden" name="nisn" value="<?php echo$sis->nisn?>">
        </div>
        <div class="form-group">
        <label for="">Kelas</label>
        <input type="text" value="<?php echo$sis->kelas?> / <?php echo$sis->jurusan?>" class="form-control" disabled>
        </div>
        <div class="form-group">
        <label for="">Pembayaran</label>
        <select name="id_bebas" id="" class="form-control">
        <option value=""> -- Pilih Pembayaran -- </option>
        <?php foreach($dataBebas as $bebas):?>
            <option value="<?php echo $bebas->id_bebas?>"><?php echo $bebas->tahun?> / <?php echo $bebas->nama_pembayaran?> / Rp. <?php echo number_format($bebas->nominal_bebas,0,',','.')?></option>
        <?php endforeach;?>
        </select>
        </div>
        <div class="form-goup">
        <label for="">Tangga Bayar</label>
        <input type="date" name="tanggal_bayar" class="form-control">
        </div>
        <div class="form-goup">
        <label for="">Jumlah Bayar</label>
        <input type="text" name="jumlah_bayar" class="form-control">
        </div>
        <button type="submit" class="btn btn-danger mb-2 ml-auto mt-3">Bayar</button>     
        </form>
     
        </div>
        
    </div>
    
    </div>
    <div class="col-lg-4 mb-4">
            <div class="card shadow" style="width:100%;">
            <div class="card-body text-center">
                <img src="<?php echo base_url().'assets/photo/'. $sis->foto ?>" alt="" width="250px" height="300px">     
            </div>
            </div>
        </div>
    <?php endforeach?>
</div>
<h2>History Bayar</h2>
<table class="table table-striped table-bordered table-hover" id="dataTable">
<thead class="thead-dark">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Kelas</th>
            <th class="text-center">Nama Pembayaran</th>
            <th class="text-center">Nominal</th>
            <th class="text-center">Sudah Bayar</th>
            <th class="text-center">Tanggal Bayar</th>
            <th class="text-center">Tunggakan</th>
            <th class="text-center">Action</th>
        </tr>
            
</thead>
<tbody>
    <?php $i=1; foreach($dataBayar as $bayar):?>
    <tr>
        <td><?php echo $i++?></td>
        <td><?php echo $bayar->nama_siswa?></td>
        <td><?php echo $bayar->kelas?>/<?php echo $bayar->jurusan?></td>
        <td><?php echo $bayar->nama_pembayaran?></td>
        <td>Rp. <?php echo number_format($bayar->nominal_bebas ,0,',','.')?></td>
        <td>Rp. <?php echo number_format($bayar->jumlah_bayar ,0,',','.')?></td>
        <td><?php echo $bayar->tanggal_bayar?></td>
        <td>Rp. <?php $tunggakan = $bayar->nominal_bebas- $bayar->jumlah_bayar; echo number_format($tunggakan ,0,',','.')?></td>
        <td>
        <center>
            <?php if($tunggakan==0){?>
            <center>
                <span class="btn btn-sm btn-success" style="cursor: default;" title="Lunas"><i class="fas fa-check"></i></span>
                <a class="btn btn-sm btn-primary"href="<?php echo base_url('admin/bayarBebas/kwitansi/'.$bayar->id_bayarBebas); ?>" title="Cetak Kwitansi">
                        <i class="fas fa-print"></i>
                    </a>
                    <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/bayarBebas/deleteData/'.$bayar->id_bayarBebas); ?>">
                        <i class="fas fa-trash"></i>
                    </a>
            </center>
            <?php }else{?>
            <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/bayarBebas/updateBebas/'.$bayar->id_bayarBebas); ?>">
            Bayar
            </a>
            <a class="btn btn-sm btn-primary"href="<?php echo base_url('admin/bayarBebas/kwitansi/'.$bayar->id_bayarBebas); ?>" title="Cetak Kwitansi">
            <i class="fas fa-print"></i>
            </a>
            <?php }?>
        </center>
        </td>
    </tr>
    <?php endforeach;?>
</tbody>
</table>
</div>
</div>

