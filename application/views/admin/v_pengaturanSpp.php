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
            <th class="text-center">Kode SPP</th>
            <th class="text-center">Tahun Ajar</th>
            <th class="text-center">Nominal</th>
            <th class="text-center">Action</th>

        </tr>
            
        </thead>
        <tbody>
     
        <?php $i=1; foreach($dataSpp as $spp):?>
        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $spp->id_spp;?></td>
            <td><?php echo $spp->tahunMulai;?>/<?php echo $spp->tahunSelesai;?></td>
            <td>Rp. <?php echo number_format($spp->nominal,0,',','.')?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/pengaturanSpp/updateData/'.$spp->id_spp); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/pengaturanSpp/deleteData/'.$spp->id_spp); ?>">
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
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Pembayaran SPP</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/pengaturanSpp/tambahDataAksi/');?>" method="post">
                        
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="id_tahunAjar" id="" class="form-control">
                                    <option value=""> -- Pilih Tahun Ajar -- </option>
                                    <?php foreach($tahunAjar as $thn):?>
                                        <option value="<?php echo $thn->id_tahunAjar?>"> <?php echo $thn->tahunMulai?>/<?php echo $thn->tahunSelesai?></option>
                                    <?php endforeach?>
                                </select> 
                                <?php echo form_error('id_tahunAjar','<div class="text-small text-danger"></div>');?>
                            </div>
                            <div class="form-group">
                                <label for="">Nominal</label>
                                <input type="text" name="nominal" class="form-control" placeholder="Nominal Pertahun"> 
                                <?php echo form_error('nominal','<div class="text-small text-danger"></div>');?>
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

