<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Pembayaran-SPP.xls");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <style>
    </style>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td>
            <center>
    
            <p> <h1>SMK AL-HUSAENIYAH</h1>
        <b>“Terakreditasi B”</b>
        <br> l.Raya Selakopi Km.11 No.15 (0266) 6546767 Lembur Sawah Cicantayan Sukabumi 43155, 
                <br>
                email :smkalhusaeniyah192@gmail.com
        </p>
        </center>
            </td>
        </tr>
    </table>
    <hr style="border:1px solid black;">
    <br>
    
    <?php 
    if((isset($_GET['bulanbayarSpp']) && $_GET['bulanbayarSpp']!='') && (isset($_GET['tahunBayarspp'])&& $_GET['tahunBayarspp']!='')){
        $bulanbayarSpp = $_GET['bulanbayarSpp'];
        $tahunBayarspp = $_GET['tahunBayarspp'];
    }else{
        $bulanbayarSpp = '';
        $tahunBayarspp ='';
    }
    
    ?>

    <table class="table table-striped table-bordered" id="dataTable">
        <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">NISN</th>
            <th class="text-center">Kelas</th>
            <th class="text-center">Jurusan</th>
            <th class="text-center">Bulan SPP</th>
            <th class="text-center">Tahun SPP</th>
            <th class="text-center">Tanggal Bayar</th>
            <th class="text-center">Jumlah Bayar</th>

        </tr>
            
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($siswa as $sis):
        ?>

        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $sis->nama_siswa?></td>
            <td><?php echo $sis->nisn?></td>
            <td><?php echo $sis->kelas?></td>
            <td><?php echo $sis->jurusan?></td>
            <td><?php echo $sis->bulanbayarSpp?></td>
            <td><?php echo $sis->tahunBayarspp?></td>
            <td><?php echo $sis->tanggal_bayar?></td>
            <td>Rp. <?php echo number_format($sis->jumlahBayar,0,',','.')?></td>
        </tr>

        <?php endforeach?>
        </tbody>
        <tr>
            <th colspan="7" class="text-center">Total</th>
            <td colspan="2">Rp. <?php echo number_format($total,0,',','.')?></td>
        </tr>
    </table>
            <br>
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Sukabumi, <?php echo date("d M Y")?><br>Bendahara <br><br><br>
            </p>
            </td>
        </tr>
    </table>
</body>
</html>

<script>window.excel();</script>