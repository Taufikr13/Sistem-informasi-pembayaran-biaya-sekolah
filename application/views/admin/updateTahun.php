<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card" style="width:60%;">
        <div class="card-body">
        <?php foreach($tahun as $thn):?>
            <form action="<?php echo base_url('admin/dataTahun/updateDataAksi') ?>" method="post" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="">Tahun Mulai</label>
                    <input type="hidden" name="id_tahunAjar" class="form-control" value="<?php echo $thn->id_tahunAjar;?>">
                    <input type="text" name="tahunMulai" class="form-control" value="<?php echo $thn->tahunMulai;?>">
                    <?php echo form_error('tahunMulai','<div class="text-small text-danger"></div>');?>
                </div>
                <div class="form-group">
                    <label for="">Tahun Selesai</label>
                    <input type="text" name="tahunSelesai" class="form-control" value="<?php echo $thn->tahunSelesai;?>">
                    <?php echo form_error('tahunSelesai','<div class="text-small text-danger"></div>');?>
                </div>
                 
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="ket" class="form-control" value="<?php echo $thn->ket;?>">
                    <?php echo form_error('ket','<div class="text-small text-danger"></div>');?>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>

                <a href="<?php echo base_url('admin/dataKelas') ?>" class="btn btn-danger">Kembali</a>
            </form>
        <?php endforeach;?>
          
        </div>
    </div>

</div>
</div>

