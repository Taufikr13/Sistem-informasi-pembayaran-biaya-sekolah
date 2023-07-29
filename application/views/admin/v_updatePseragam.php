<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card" style="width:60%;">
        <div class="card-body">
            <?php foreach($dataSpp as $spp):?>
            <form action="<?php echo base_url('admin/pengaturanSpp/updateDataAksi') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Tahun Ajar</label>
                    <input type="hidden" name="id_tahunAjar" class="form-control" value="<?php echo $spp->id_spp?>">
                    <select name="id_tahunAjar" id="" class="form-control">
                        <option value="<?php echo $spp->id_tahunAjar?>"><?php echo $spp->tahunMulai?>/<?php echo $spp->tahunSelesai?></option>
                        <?php foreach($tahunAjar as $tahun): ?>
                        <option value="<?php echo $tahun->id_tahunAjar?>"><?php echo $tahun->tahunMulai?>/<?php echo $tahun->tahunSelesai?></option>
                        <?php endforeach?>
                    </select>
                </div>
                 
                <div class="form-group">
                    <label for="">Nominal SPP</label>
                    <input type="text" name="nominal" class="form-control" value="<?php echo $spp->nominal?>">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>

                <a href="<?php echo base_url('admin/pengaturanSpp') ?>" class="btn btn-danger">Kembali</a>
            </form>
            <?php endforeach;?>
        </div>
    </div>

</div>
</div>

