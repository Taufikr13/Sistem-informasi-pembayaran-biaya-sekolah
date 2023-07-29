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
            <th class="text-center">Kelas</th>
            <th class="text-center">Jurusan</th>
            <th class="text-center">Nama Pembayaran</th>
            <th class="text-center">Tanggal Bayar</th>
            <th class="text-center">Jumlah Bayar</th>

        </tr>
            
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($dataBayar as $sis):
        ?>

        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $sis->nama_siswa?></td>
            <td><?php echo $sis->nisn?></td>
            <td><?php echo $sis->kelas?></td>
            <td><?php echo $sis->jurusan?></td>
            <td><?php echo $sis->nama_pembayaran?></td>
            <td><?php echo $sis->tanggal_bayar?></td>
            <td>Rp. <?php echo number_format($sis->jumlah_bayar ,0,',','.')?></td>
        </tr>

        <?php endforeach?>
        </tbody>
    </table>

</div>
</div>

