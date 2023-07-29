<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card-body">
    <?php foreach($siswa as $sis):?>

     <form action="<?php echo base_url('admin/bayarBebas/updateDataAksi') ?>" method="post">
        <div class="form-group">
        <label for="">Nama</label>
        <input type="text" value="<?php echo$sis->nama_siswa?>" class="form-control" disabled>
        <input type="hidden" name="id_siswa" value="<?php echo$sis->id_siswa?>">
        <input type="hidden" name="id_bayarBebas" value="<?php echo $sis->id_bayarBebas?>">
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
        <input type="hidden" name="id_bebas" value="<?php echo $sis->id_bebas?>">
        <input type="text"value="<?php echo $sis->tahun?>/<?php echo $sis->nama_pembayaran?> / Rp.<?php echo number_format($sis->nominal_bebas ,0,',','.')?>" class="form-control" disabled>
        </div>
        <div class="form-goup">
        <label for="">Sudah Bayar</label>
        <input type="text" class="form-control" value="<?php echo $sis->jumlah_bayar?>">
        </div>
        <div class="form-goup">
        <label for="">Tangga Bayar</label>
        <input type="date" name="tanggal_bayar" class="form-control">
        </div>
        <div class="form-goup">
        <label for="">Jumlah Bayar </label>
        <input type="text" name="jumlah_bayar" class="form-control" max="<?php echo $sis->nominal_bebas?>">
        </div>
        <button type="submit" class="btn btn-danger mb-2 ml-auto mt-3">Bayar</button>     
        </form>
        <?php endforeach;?>
     
        
        
    </div>

</div>
</div>

