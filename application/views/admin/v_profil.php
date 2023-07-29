<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="row">
    <div class="col-lg-8 mb-4">
    <?php foreach($userr as $det):?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $title?></h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?php echo $det->nama_user ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><?php echo $det->username ?></td>
                    </tr>
                </table>
                
            </div>
        </div>

    </div>
    <div class="col-lg-4 mb-4">

                            <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Foto Siswa</h6>
            </div>
                <div class="card-body text-center">
                    <img src="<?php echo base_url().'assets/photo/'. $det->foto ?>" alt="" width="250px" height="300px">     
                </div>
            </div>

                            <!-- Approach -->
    </div>
    
        <?php endforeach ?>
 
    </div> 

   <a href="<?php echo base_url('admin/dashboard')?>" class="btn btn-danger">Kembali</a>

</div>
</div>

