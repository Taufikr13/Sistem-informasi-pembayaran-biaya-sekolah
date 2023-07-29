<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card" style="width:60%;">
        <div class="card-body">
            
            <form action="<?php echo base_url('admin/gantiPassword/gantiPasswordAksi') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Password Baru</label>
                    <input type="password" name="passBaru" class="form-control">
                    <?php echo form_error('passBaru','<div class="text-small text-danger"></div>');?>
                </div>
                 
                <div class="form-group">
                    <label for="">Ulangi Password</label>
                    <input type="password" name="ulangPass" class="form-control">
                    <?php echo form_error('ulangPass','<div class="text-small text-danger"></div>');?>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>

                <a href="<?php echo base_url('admin/dashboard') ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>

</div>
</div>

