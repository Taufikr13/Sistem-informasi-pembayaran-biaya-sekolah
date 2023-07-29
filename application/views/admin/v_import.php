<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>


    </div>
    <?php echo $this->session->flashdata('pesan');?>
    <div class="card" style="width: 60%;">
        <div class="card-body">
        <form method="POST" action="<?= site_url('admin/dataSiswa/uploaddata') ?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                        <label class="col-form-label text-md-left">Upload File</label> 
                                            <input type="file" class="form-control" name="importexcel" accept=".xls, .xlsx" required>
                                            <div class="mt-1">
                                                <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <div class="form-group mb-0">
                                <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button> 
                            </div>
                        </div>
                    </form>
        </div>

    </div>

</div>
</div>

