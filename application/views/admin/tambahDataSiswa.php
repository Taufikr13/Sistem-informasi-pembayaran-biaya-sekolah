<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card" style="width:60%;">
        <div class="card-body">
            <form action="<?php echo base_url('admin/dataSiswa/tambahDataAksi') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control">
                    <?php echo form_error('nama_siswa')?>
                </div>
                 
                <div class="form-group">
                    <label for="">NIS</label>
                    <input type="text" name="nis" class="form-control">
                    <?php echo form_error('nis')?>
                </div>
                <div class="form-group">
                    <label for="">NISN</label>
                    <input type="text" name="nisn" class="form-control">
                    <?php echo form_error('nisn')?>
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="id_kelas" id="" class="form-control">
                        <option value=""> -- Pilih Kelas -- </option>
                        <?php
                        foreach($kelas as $kls):
                        
                        ?>
                        <option value="<?php echo $kls->id_kelas;?>"><?php echo $kls->kelas;?></option>
                        <?php endforeach ?>
                    </select>
                    <?php echo form_error('id_kelas')?>

                </div>
                <div class="form-group">
                    <label for="">Jurusan</label>
                    <select name="id_jurusan" id="" class="form-control">
                        <option value=""> -- Pilih jurusan -- </option>
                        <?php
                        foreach($jurusan as $jrs):
                        
                        ?>
                        <option value="<?php echo $jrs->id_jurusan;?>"><?php echo $jrs->jurusan;?></option>
                        <?php endforeach ?>
                    </select>
                    <?php echo form_error('id_jurusan')?>
                </div>
                <div class="form-group">
                    <label for="">No HP</label>
                    <input type="text" name="no_hp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jenis SPP</label>
                    <select name="id_spp" id="" class="form-control">
                        <option value=""> -- jenis SPP -- </option>
                        <?php
                        foreach($spp as $sp):
                        
                        ?>
                        <option value="<?php echo $sp->id_spp;?>"><?php echo $sp->tahunMulai;?>/<?php echo $sp->tahunSelesai;?> Rp. <?php echo number_format($sp->nominal,0,',','.')?> </option>
                        <?php endforeach ?>
                    </select>
                    <?php echo form_error('id_jurusan')?>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>

</div>
</div>

