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
            <th class="text-center">Tahun Ajar</th>
            <th class="text-center">Nama Pembayaran</th>
            <th class="text-center">Nominal</th>
            <th class="text-center">Action</th>

        </tr>
            
        </thead>
        <tbody>
     
        <?php $i=1; foreach($dataBebas as $bebas):?>
        <tr>
            <td><?php echo $i++?></td>
          
            <td><?php echo $bebas->tahun;?></td>
            <td><?php echo $bebas->nama_pembayaran?></td>
            <td>Rp. <?php echo number_format($bebas->nominal_bebas,0,',','.')?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/pengaturanBebas/updateData/'.$bebas->id_bebas); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/pengaturanBebas/deleteData/'.$bebas->id_bebas); ?>">
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
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Pembayaran Bebas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/pengaturanBebas/tambahDataAksi/');?>" method="post">
                        
                            <div class="form-group">
                                <label for="">Tahun Ajar</label>
                                <select name="tahun" id="" class="form-control">
                                <option value=""> -- Pilih Tahun -- </option>

                                    <?php 
                                    $tahun = date('Y');
                                    for($i=2020;$i<$tahun+5;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>

                                    <?php } ?>
                                </select>
                                <?php echo form_error('tahun','<div class="text-small text-danger"></div>');?>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Pembayaran</label>
                                <input type="text" name="nama_pembayaran" class="form-control" placeholder="Nama Pembayaran"> 
                                <?php echo form_error('nama_pembayaran','<div class="text-small text-danger"></div>');?>
                            </div>
                            <div class="form-group">
                                <label for="">Nominal Pembayaran</label>
                                <input type="text" name="nominal_bebas" class="form-control" placeholder="Nominal Pertahun"> 
                                <?php echo form_error('nominal_bebas','<div class="text-small text-danger"></div>');?>
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

