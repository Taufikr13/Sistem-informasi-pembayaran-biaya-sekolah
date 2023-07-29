<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <?php echo $this->session->flashdata('pesan');?>
    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 10px;"><i class="fa fa-plus"> Tambah Data</i></button>
    <table class="table table-striped table-bordered" id="dataTable">
       <thead>
       <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kode Jurusan</th>
            <th class="text-center">Jurusan</th>
            <th class="text-center">Singkatan</th>
            <th class="text-center">Action</th>

        </tr>

       </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($jurusan as $jrs):
        ?>

        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $jrs->id_jurusan?></td>
            <td><?php echo $jrs->jurusan?></td>
            <td><?php echo $jrs->singkatan?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataJurusan/updateData/'.$jrs->id_jurusan); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataJurusan/deleteData/'.$jrs->id_jurusan); ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </center>
            </td>
        </tr>
        
        <?php endforeach?>
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('admin/dataJurusan/tambahDataAksi/');?>" method="post">
            
                <div class="form-group">
                    <label for="">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control"> 
                    <?php echo form_error('jurusan','<div class="text-small text-danger"></div>');?>
                </div>
                <div class="form-group">
                    <label for="">Singkatan</label>
                    <input type="text" name="singkatan" class="form-control"> 
                    <?php echo form_error('singkatan','<div class="text-small text-danger"></div>');?>
                </div>
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
        </form>
    </div>
    </div>
    </div>
    </div>


</div>
</div>

