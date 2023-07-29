<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>

    <table class="table table-striped table-bordered" id="dataTable">
        <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">NISN</th> 
            <th class="text-center">Bulan SPP</th>
            <th class="text-center">Tahun SPP</th>
            <th class="text-center">Tanggal Bayar</th>
            <th class="text-center">Jumlah Bayar</th>
            <th class="text-center">Action</th>

        </tr>
            
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($siswa as $kls):
        ?>

        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $kls->nama_siswa?></td>
            <td><?php echo $kls->nisn?></td>
            <td><?php echo $kls->bulanbayarSpp?></td>
            <td><?php echo $kls->tahunBayarspp?></td>
            <td><?php echo $kls->tanggal_bayar?></td>
            <td>Rp. <?php echo number_format($kls->jumlahBayar ,0,',','.')?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary"href="<?php echo base_url('admin/PembayaranSiswa/Kwitansi/'.$kls->id_pembayaranSpp); ?>" title="Cetak Kwitansi">
                        <i class="fas fa-print"></i>
                    </a>
                    <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/PembayaranSiswa/deleteData/'.$kls->id_pembayaranSpp); ?>">
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

