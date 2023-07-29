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
            <th class="text-center">Kode Seragam</th>
            <th class="text-center">Tahun Ajar</th>
            <th class="text-center">Nominal Seragam</th>
      
            <th class="text-center">Action</th>

        </tr>
            
        </thead>
        <tbody>
     
        <?php $i=1; foreach($dataSeragam as $seragam):?>
        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $seragam->id_seragam;?></td>
            <td><?php echo $seragam->tahunSeragam;?></td>
            <td>Rp. <?php echo number_format($seragam->nominalSeragam,0,',','.')?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/pengaturanSeragam/updateData/'.$seragam->id_seragam); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataKelas/deleteData/'.$seragam->id_seragam); ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </center>
            </td>
           
        </tr>
        <?php endforeach;?>
      
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Pembayaran Seragam</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/pengaturanSeragam/tambahDataAksi/');?>" method="post">
                        
                            <div class="form-group">
                                <label for="">Tahun</label>
                                <select name="tahunSeragam" id="" class="form-control ml-2">
                                <option value=""> -- Pilih Tahun -- </option>

                                    <?php 
                                    $tahun = date('Y');
                                    for($i=2020;$i<$tahun+5;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>

                                    <?php } ?>
                                </select>
                                <?php echo form_error('tahunSeragam','<div class="text-small text-danger"></div>');?>
                            </div>
                            <div class="form-group">
                                <label for="">Nominal</label>
                                <input type="text" name="nominalSeragam" class="form-control" placeholder="Nominal Pertahun"> 
                                <?php echo form_error('nominalSeragam','<div class="text-small text-danger"></div>');?>
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

