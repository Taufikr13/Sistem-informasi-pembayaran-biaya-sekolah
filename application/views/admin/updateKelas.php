<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card" style="width:60%;">
        <div class="card-body">
            <?php foreach($kelas as $kls):?>
            <form action="<?php echo base_url('admin/dataKelas/updateDataAksi') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="hidden" name="id_kelas" class="form-control" value="<?php echo $kls->id_kelas?>">
                    <input type="text" name="kelas" class="form-control" value="<?php echo $kls->kelas?>">
                    <?php echo form_error('kelas','<div class="text-small text-danger"></div>');?>
                </div>
                 
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="<?php echo $kls->keterangan?>">
                    <?php echo form_error('keterangan','<div class="text-small text-danger"></div>');?>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>

                <a href="<?php echo base_url('admin/dataKelas') ?>" class="btn btn-danger">Kembali</a>
            </form>
            <?php endforeach;?>
        </div>
    </div>

</div>
</div>

