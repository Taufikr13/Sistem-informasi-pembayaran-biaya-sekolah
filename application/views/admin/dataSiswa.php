<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>
        

    </h1>
    <a href="<?php echo base_url('admin/dataSiswa/format_excel')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Format Excel</a>
    </div>
    <?php echo $this->session->flashdata('pesan');?>
    <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataSiswa/tambahData')?>"> <i class="fas fa-plus"> Tambah Data</i></a>
    <a class="mb-2 mt-2 btn btn-sm btn-primary" href="<?php echo base_url('admin/dataSiswa/import')?>"> <i class="fas fa-upload"> Import</i></a>

    <div class="table-responsive">
    <table class="table table-striped table-bordered" id="dataTable">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIS</th>
                <th class="text-center">NISN</th>
                <th class="text-center">Nama Siswa</th>
                <th class="text-center">Action</th>

            </tr>
        </thead>
        <tbody>
        <tr>
        <?php
        $i = 1;
        foreach($siswa as $sis):
        ?>
            <td><?php echo $i++?></td>
            <td><?php echo $sis->nis?></td>
            <td><?php echo $sis->nisn?></td>
            <td><?php echo $sis->nama_siswa?></td>           
            <td>
                <center>
                    <a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/dataSiswa/detailSiswa/'.$sis->id_siswa); ?>">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataSiswa/updateData/'.$sis->id_siswa); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataSiswa/deleteData/'.$sis->id_siswa); ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                    
                </center>
            </td>
        </tr>

        <?php endforeach?>

        </tbody>
        
    </table>

    </div>
    
</div>
</div>


    