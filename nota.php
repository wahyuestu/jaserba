<?php 
session_start();
$id_pemesanan = $_GET['id'];
include "setting/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>nota</title>
	<link rel="stylesheet" type="text/css" href="css/nota.css">
</head>
<body>


            <?php 
            $ambil = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan='$id_pemesanan'");
            $pecah = $ambil->fetch_assoc();
            ?>

    <div class="wrapper">
        <div class="title">
        <?php echo $pecah['jenis_jasa'];?>
        <p>No. Pesanan : <?php echo $pecah['id_pemesanan'];?> | Status : <span><?php echo $pecah['status_pemesanan'];?></span></p>
        </div>
        <div class="form"> 
           <div class="inputfield">
              <label>Tanggal Pemesanan</label>
              <input type="text" class="input" readonly value="<?php echo $pecah['tanggal_pemesanan'];?>">
           </div>  
          <div class="inputfield">
              <label>Nomor Telepon</label>
              <input type="text" class="input" readonly value="<?php echo $pecah['telepon_pemesan'];?>">
           </div> 
          <div class="inputfield">
              <label>Alamat</label>
              <textarea class="textarea" type="text" readonly><?php echo $pecah['alamat_pemesan'];?></textarea>
           </div>

            <!-- Biaya -->
           <div class="title">
            Rincian Biaya
            </div>

            <div class="inputfield">
              <label>Biaya Transportasi</label>
              <input type="text" class="input" readonly value="Rp. <?php echo $pecah['biaya_transport'];?>">
           </div>  
          <div class="inputfield">
              <label>Biaya Jasa</label>
              <input type="text" class="input" readonly value="Rp. <?php echo $pecah['biaya_jasa'];?>">
           </div> 
           <div class="inputfield">
              <label>Biaya Tambahan</label>
              <input type="text" class="input" readonly value="Rp. <?php echo $pecah['biaya_tambahan'];?>">
           </div> 

           <div class="inputfield">
            <label>Catatan</label>
            <textarea type="text" class="textarea" readonly><?php echo $pecah['keterangan'];?></textarea>
         </div> 
         <div class="inputfield">
            <label>Total Biaya</label>
            <input type="text" readonly value="Rp. <?php echo $pecah['total_biaya'];?>" class="input">
         </div> 
         <div class="btn" href="riwayatpemesanan.php">
            <a href="riwayatpemesanan.php">Kembali</a>
          </div>
    </div>


</body>
</html>