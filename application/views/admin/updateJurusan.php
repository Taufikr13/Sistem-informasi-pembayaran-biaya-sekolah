<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card" style="width:60%;">
        <div class="card-body">
            <?php foreach($jurusan as $jrs):?>
            <form action="<?php echo base_url('admin/dataJurusan/updateDataAksi') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Jurusan</label>
                    <input type="hidden" name="id_jurusan" class="form-control" value="<?php echo $jrs->id_jurusan?>">
                    <input type="text" name="jurusan" class="form-control" value="<?php echo $jrs->jurusan?>">
                    <?php echo form_error('jurusan','<div class="text-small text-danger"></div>');?>
                </div>
                 
                <div class="form-group">
                    <label for="">Singkatan</label>
                    <input type="text" name="singkatan" class="form-control" value="<?php echo $jrs->singkatan?>">
                    <?php echo form_error('singkatan','<div class="text-small text-danger"></div>');?>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>

                <a href="<?php echo base_url('admin/dataJurusan') ?>" class="btn btn-danger">Kembali</a>
            </form>
            <?php endforeach;?>
        </div>
    </div>

</div>
</div>

