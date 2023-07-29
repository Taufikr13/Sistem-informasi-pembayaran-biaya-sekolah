<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <?php echo $this->session->flashdata('pesan');?>
    <?php echo $this->session->flashdata('pesan');?>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Siswa
        </div>
        <div class="card-body">
        <form class="form-inline">
            <div class="form-group mb-2 ml-5">
               <label for="">NISN :</label>
               <input type="text" name="nisn" class="form-control ml-2" placeholder="Mencari Gunakan NISN"><br>
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
        </form>
        </div>
    </div>  
    <?php
    if((isset($_GET['nisn']) && $_GET['nisn']!='')){
        $nisn = $_GET['nisn'];
    }else{
       echo'<div class="alert alert-info">Cari Siswa Menggunakan <span class="font-weight-bold">NISN</div>';
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
            <th class="text-center">Tahun Mulai / Selesai</th>
            <th class="text-center">Nominal</th>
            <th class="text-center">Sudah Bayar</th>
            <th class="text-center">Tunggakan</th>
            <th class="text-center">Action</th>

        </tr>
            
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($siswa as $sis):
        ?>

        <tr>
            <td><?php echo $i++?></td>
            <td><a href="<?php echo base_url('admin/pembayaranSiswa/history/'.$sis->nisn); ?>" title="Lihat History"><?php echo $sis->nama_siswa?></a></td>
            <td><?php echo $sis->nisn?></td>
            <td><?php echo $sis->kelas?></td>
            <td><?php echo $sis->jurusan?></td>
            <td><?php echo $sis->tahunMulai?>/<?php echo $sis->tahunSelesai?></td>
            <td>Rp. <?php echo number_format($sis->nominal,0,',','.')?></td>
            <td><?php if($dataBayar==0){
                echo "Rp. ", 0;
            } else{
                echo "Rp. ", number_format($dataBayar,0,',','.');
            }
                ?>
            </td>
            <?php $tunggakat = $sis->nominal-$dataBayar?>
            <td>Rp. <?php echo number_format($tunggakat,0,',','.')?></td>
            <td>
                <center>
                    <?php if($tunggakat==0){?>
                    <center><span class="btn btn-sm btn-success" style="cursor: default;">Lunas</span></center>
                    <?php }else{?>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/pembayaranSiswa/bayarSpp/'.$sis->nisn); ?>">
                       Bayar
                    </a>
                    <?php }?>
                </center>
            </td>
        </tr>

        <?php endforeach?>
        </tbody>
    </table>

</div>
</div>

