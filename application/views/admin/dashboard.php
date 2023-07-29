<!-- Begin Page Content -->
<div class="container-fluid" >
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>Selamat Datang</span>
            <strong> <span class="font-weight-bold"><?php echo $this->session->userdata('nama_user')?></span></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
   <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $siswa?></div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="card shadow" style="width: 18rem;">
    <div class="card-header bg-secondary">
       <strong class="text-light">Kalender SMK Al HUSAENIYAH</strong>
    </div>
    <div class="card-body" style="font-size: 20px;">
        <?php echo $kalender?>
    </div>
    </div>
</div>
</div>

