<!DOCTYPE html>
<html lang="en"><head>
    <title></title>
</head><body>

            <center>
    
            <p> <h1>SMK AL-HUSAENIYAH</h1>
        <b>Terakreditasi B</b>
        <br> l.Raya Selakopi Km.11 No.15 (0266) 6546767 Lembur Sawah Cicantayan Sukabumi 43155, 
                <br>
                email :smkalhusaeniyah192@gmail.com
        </p>
        </center>
            </td>
    <hr style="border:1px solid black;">
    <br>
    <br>
<table width="100%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">NISN</th>
            <th class="text-center">Kelas</th>
            <th class="text-center">Bulan/Tahun SPP</th>
            <th class="text-center">Tanggal Bayar</th>
            <th class="text-center">Jumlah Bayar</th>

        </tr>
        <?php
        $i = 1;
        foreach($siswa as $sis):
        ?>

        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $sis->nama_siswa?></td>
            <td><?php echo $sis->nisn?></td>
            <td><?php echo $sis->kelas,' ',$sis->jurusan;?></td>
            <td><?php echo $sis->bulanbayarSpp,'/',$sis->tahunBayarspp?></td>
            <td><?php echo $sis->tanggal_bayar?></td>
            <td><?php echo $sis->jumlahBayar?></td>
        </tr>

        <?php endforeach?>
        <tr>
            <th colspan="6" class="text-center">Total</th>
            <td colspan="2">Rp. <?php echo number_format($total,0,',','.')?></td>
        </tr>
    </table>
</body></html>