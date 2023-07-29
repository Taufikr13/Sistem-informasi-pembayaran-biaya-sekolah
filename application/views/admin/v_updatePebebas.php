<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card" style="width:60%;">
        <div class="card-body">
            <?php foreach($dataBebas as $bebas):?>
            <form action="<?php echo base_url('admin/pengaturanBebas/updateDataAksi') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Tahun Ajar</label>
                    <input type="hidden" name="id_bebas" class="form-control" value="<?php echo $bebas->id_bebas?>">
                    <select name="tahun" id="" class="form-control">
                        <option value="<?php echo $bebas->tahun?>"><?php echo $bebas->tahun?></option>
                        <?php 
                        $tahun = date('Y');
                        for($i=2020;$i<$tahun+5;$i++){?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>

                        <?php } ?>
                    </select>
                </div>
                 
                <div class="form-group">
                    <label for="">Nama Pembayaran</label>
                    <input type="text" name="nama_pembayaran" class="form-control" value="<?php echo $bebas->nama_pembayaran?>">
                </div>
                <div class="form-group">
                    <label for="">Nominal SPP</label>
                    <input type="text" name="nominal_bebas" class="form-control" value="<?php echo $bebas->nominal_bebas?>">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>

                <a href="<?php echo base_url('admin/pengaturanSpp') ?>" class="btn btn-danger">Kembali</a>
            </form>
            <?php endforeach;?>
        </div>
    </div>

</div>
</div>

