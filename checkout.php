<?php
session_start();
$id_produk = $_GET['id'];
include "setting/koneksi.php";


?>

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
</head>
<body>

   <!-- Navbar -->
   <?php
   include 'menu.php';
   ?>

         <?php 
             $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
             $pecah = $ambil->fetch_assoc();
          ?>

    <div class="wrapper-nota">
       <form method="post">
        <div class="title">
        <?php echo $pecah['nama_produk'];?>
        <p>Tanggal Pemesanan : <?php echo $date = date('Y-m-d');?></p>
        </div>
        <div class="form"> 
           <div class="inputfield">
              <label>Nama Pemesan</label>
              <input type="text" class="input" name="nama" value="<?php echo $_SESSION["login"]['nama_pemesan'];?>" >
           </div>  
          <div class="inputfield">
              <label>Nomor Telepon</label>
              <input type="number" class="input" name="telepon" placeholder="Nomor Telepon">
           </div> 
          <div class="inputfield">
              <label>Alamat</label>
              <textarea class="textarea" name="alamat" placeholder="Alamat"></textarea>
           </div> 
           <div class="inputfield">
            <label>Keluhan</label>
            <textarea class="textarea" name="keluhan" placeholder="Keluhan"></textarea>
         </div> 
         <div class="inputfield">
            <label>Biaya Penjemputan</label>
            <input type="number" name="biayatransport" readonly value="<?php echo $pecah['bt_produk'];?>" class="input">
         </div> 
          <div class="inputfield terms">
              <label class="check">
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <p>Setuju dengan S&K yang berlaku</p>
           </div>
          <div class="inputfield">
            <button type="submit" name="pesan" class="btn">Pesan Jasa</button>
          </div>
        </div>
        </form>
    </div>

    <?php
        if (isset($_POST["pesan"]))
        {
            $id_pemesan = $_SESSION["login"]["id_user"];
            $nama = $_SESSION["login"]["nama_pemesan"];
            $tanggal_pemesanan = date("Y-m-d");
            $telepon = $_POST['telepon'];
            $alamat = $_POST['alamat'];
            $keluhan = $_POST['keluhan'];
            $transport = $pecah['bt_produk'];
            $id_pemesanan_jasa=$koneksi->insert_id;
            $jasa = $pecah['nama_produk'];

            $koneksi->query("INSERT INTO pemesanan (id_user, tanggal_pemesanan, nama_pemesan, jenis_jasa, telepon_pemesan, alamat_pemesan, keluhan_pemesan, biaya_transport) 
            VALUES('$id_pemesan','$tanggal_pemesanan','$nama','$jasa','$telepon','$alamat','$keluhan','$transport')");
            
           
            $koneksi->query("INSERT INTO pemesanan_jasa (id_pemesanan, id_jasa) VALUES ('$id_pemesanan_jasa','$id_produk)");
            echo "<script>location='riwayatpemesanan.php';</script>";
        }
        
        ?>

</body>
</html>