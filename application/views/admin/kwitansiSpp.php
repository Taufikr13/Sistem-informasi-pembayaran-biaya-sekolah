<?php
$nomor_kwitansi = "KW00";
$yr = date('Y');
$total_pembayaran = "$100";


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }
        
        .container {
            width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border: 2px solid #000;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .logo img {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
        }

        table th{
            text-align: left;

        }
        
        .label {
            font-weight: bold;
        }
        
        .total {
            font-weight: bold;
        }
        
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        
        .cop {
            text-align: center;
            margin-top: 5px;
            font-size: 14px;
            
            border-bottom: 2px solid #000;
            border-top: 2px solid #000;
            padding-top: 10px;
        }
        
        .signature {
            margin-top: 40px;
            text-align: right;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">KWITANSI PEMBAYARAN SPP SEKOLAH</div>
        
        <div class="logo">
            <img src="<?php echo base_url('assets/img/smk.png')?>" alt="Logo Sekolah">
            <div class="cop">
            <b>SMK AL-HUSAENIYAH</b> <br>
            <b>“Terakreditasi B”</b> <br>
            <i style="font-size: 12px;">Jl.Raya Selakopi Km.11 No.15 (0266) 6546767 Lembur Sawah Cicantayan Sukabumi 43155, 
            <br> email :smkalhusaeniyah@yahoo.com</i>

            </div>
        </div>
        <table>
            <?php foreach ($siswa as $sis): 
            ?>
            <tr>
                <th class="label">Nomor Kwitansi</th>
                <td><?php echo $nomor_kwitansi,$yr; echo $sis->id_pembayaranSpp;?></td>
            </tr>
            <tr> 
                <th class="label">Tanggal Bayar</th>
                <td><?php echo $sis->tanggal_bayar; ?></td>
            </tr>
            <tr>
                <th class="label">Nama Siswa</th>
                <td><?php echo $sis->nama_siswa; ?></td>
            </tr>
            <tr>
                <th class="label">NISN</th>
                <td><?php echo $sis->nisn; ?></td>
            </tr>
            <tr>
                <th class="label">Kelas</th>
                <td><?php echo $sis->kelas ,' ',$sis->jurusan; ?></td>
            </tr>
            <tr>
                <th class="label">Bulan SPP</th>
                <td><?php echo $sis->bulanbayarSpp;?></td>
            </tr>
            <tr>
                <th class="label">Tahun SPP</th>
                <td><?php echo $sis->tahunBayarspp;?></td>
            </tr>
            <tr>
                <th class="label">Total Pembayaran</th>
                <td class="total">Rp. <?php echo number_format($sis->jumlahBayar,0,',','.')?></td>
            </tr>
            <?php endforeach ?>
        </table>
        
        <div class="footer">
            Terima kasih atas pembayaran Anda.
        </div>
        
        <div class="signature">
            <p>
            <?php
            date_default_timezone_set('Asia/Jakarta');

            $tanggal = date('d F Y');

            echo "Sukabumi, " . $tanggal;
            ?>
            </p>
            <br>
            <p>Bayu Setiawan, S.Pd</p>
            <img>
        </div>
    </div>
    <script>window.print();</script>
</body>
</html>