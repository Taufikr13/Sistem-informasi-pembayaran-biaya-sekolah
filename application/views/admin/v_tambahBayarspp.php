
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card shadow" style="width:60%;">
        <div class="card-body">
    <?php foreach($siswa as $sis):?>
    <form action="<?php echo base_url('admin/pembayaranSiswa/tambahDataAksi') ?>" method="post">
    <div class="form-group">
    <label for="">Taufik Rahmat Hidayat</label>
    <input type="text" class="form-control" value="<?php echo $sis->nama_siswa?>" disabled>
    <input type="hidden" name="id_siswa" value="<?php echo$sis->id_siswa?>">
    </div>

    <div class="form-group">
    <label for="">NISN</label>
    <input type="text" name="nisn" class="form-control" value="<?php echo $sis->nisn?>" disabled>
    <input type="hidden" name="nisn" value="<?php echo$sis->nisn?>">
    </div>

    <div class="form-group">
    <label for="">Tanggal Bayar</label>
    <input type="date" name="tanggal_bayar" class="form-control">
    </div>
    
    <div class="form-group">
    <label for="">tahun Ajar</label>
    <input type="text" value="<?php echo$sis->tahunMulai?>/<?php echo$sis->tahunSelesai?>" class="form-control" disabled>
    <input type="hidden" name="id_tahunAjar" value="<?php echo$sis->id_tahunAjar?>">
    </div>

    <div class="form-group">
    <label for="">Tahun SPP</label>
    <select name="tahunBayarspp" id="" class="form-control">
        <option value=""> -- Pilih Tahun SPP --</option>
    <?php 
        $tahun = date('Y');
        for($i=2020;$i<$tahun+5;$i++){?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>

    <?php } ?>
    </select>
   
    </div>

    <div class="form-group">
    <label for="">Bulan SPP</label>
    <select name="bulanbayarSpp" id="" class="form-control">
        <option value=""> -- Pilih Bulan SPP-- </option>
        <option value="Januari">Januari</option>
        <option value="Februari">Februari</option>
        <option value="Maret">Maret</option>
        <option value="April">April</option>
        <option value="Mei">Mei</option>
        <option value="Juni">Juni</option>
        <option value="Juli">Juli</option>
        <option value="Agustus">Agustus</option>
        <option value="September">September</option>
        <option value="Oktober">Oktober</option>
        <option value="November">November</option>
        <option value="Desember">Desember</option>
    </select>

    </div>
    
    <div class="form-group">
    <label for="">Sudah Bayar</label>
    <input type="text" value="<?php echo $dataBayar?>" class="form-control" disabled>
    <input type="hidden" name="id_spp" value="<?php echo $sis->id_spp?>">
    </div>
   
    <div class="form-group">
    <label for="">Jumlah Bayar <b>(Jumlah Yang Harus Dibayar adalah) Rp. <?php $harusBayar = $sis->nominal-$dataBayar; echo number_format($harusBayar,0,',','.') ?></b></label>
    <input type="text" name="jumlahBayar" class="form-control">
    </div>
    <button name="submit" type="submit" class="btn btn-primary">simpan</button>
    
    </form>
    <?php endforeach;?>
    </div>
    </div>
</div>
</div>

