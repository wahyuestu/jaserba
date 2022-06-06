<?php
session_start();
$id_pemesanan = $_GET['id'];
$koneksi = new mysqli("localhost","root","","jaserba");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Pesanan</title>
	<link rel="stylesheet" type="text/css" href="cssadmin/detail.css">
</head>
<body>



         <?php 
             $ambil = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan='$id_pemesanan'");
             $pecah = $ambil->fetch_assoc();
          ?>

    <div class="wrapper">
       <form method="post">
        <div class="title">
        <h2><?php echo $pecah['jenis_jasa'];?></h2>
        <p>Tgl. Pemesanan : <?php echo $pecah['tanggal_pemesanan'];?> | Satus : <?php echo $pecah['status_pemesanan'];?></p>
        </div>
        <div class="form"> 
           <div class="inputfield">
              <label>Nama Pemesan</label>
              <input type="text" class="input"  readonly value="<?php echo $pecah['nama_pemesan'];?>" >
           </div>  
          <div class="inputfield">
              <label>Nomor Telepon</label>
              <input type="number" class="input" readonly value="<?php echo $pecah['telepon_pemesan'];?>" >
           </div> 
          <div class="inputfield">
              <label>Alamat</label>
              <textarea class="textarea" readonly><?php echo $pecah['alamat_pemesan'];?></textarea>
           </div> 
           <div class="inputfield">
            <label>Keluhan</label>
            <textarea class="textarea" readonly><?php echo $pecah['keluhan_pemesan'];?></textarea>
         </div> 
         <div class="inputfield">
            <label>Mekanik</label>
            <input type="text" name="mekanik"  readonly value="<?php echo $pecah['mekanik'];?>" class="input">
         </div>   
         <div class="inputfield">
            <label>Biaya Transportasi Rp.</label>
            <input type="number" name="biayatransport" readonly value="<?php echo $pecah['biaya_transport'];?>" class="input">
         </div>  
          <div class="inputfield">
              <label>Biaya Jasa Rp.</label>
              <input type="number" class="input" name="biayajasa"  readonly value="<?php echo $pecah['biaya_jasa'];?>">
           </div> 
           <div class="inputfield">
              <label>Biaya Tambahan Rp.</label>
              <input type="number" class="input" name="biayatambahan" readonly value="<?php echo $pecah['biaya_tambahan'];?>">
           </div> 

           <div class="inputfield">
            <label>Keterangan Biaya Tambahan</label>
            <textarea type="text" class="textarea" readonly><?php echo $pecah['keterangan'];?> </textarea>
         </div> 
         <div class="inputfield">
            <label>Total Biaya</label>
            <input type="text"readonly value="Rp. <?php echo $pecah['total_biaya'];?>" class="input">
         </div> 
          <div class="btn" href="daftarpemesanan.php">
          <a href="daftarpemesanan.php">Kembali</a>
          </div>
        </div>
        </form>
    </div>



</body>
</html>