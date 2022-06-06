<?php
session_start();
$id_pemesanan = $_GET['id'];
$koneksi = new mysqli("localhost","root","","jaserba");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="cssadmin/totalbiaya.css">
</head>
<body>



         <?php 
             $ambil = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan='$id_pemesanan'");
             $pecah = $ambil->fetch_assoc();
          ?>

    <div class="wrapper-detail">
       <form method="post">
        <div class="title">
        <h2><?php echo $pecah['jenis_jasa'];?></h2>
        <p>Tanggal Pemesanan : <?php echo $pecah['tanggal_pemesanan'];?></p>
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
            <input type="text" name="mekanik"  placeholder="<?php echo $pecah['mekanik'];?>" class="input">
         </div>   
         <div class="inputfield">
            <label>Biaya Transportasi Rp.</label>
            <input type="number" name="biayatransport" readonly value="<?php echo $pecah['biaya_transport'];?>" class="input">
         </div>  
          <div class="inputfield">
              <label>Biaya Jasa Rp.</label>
              <input type="number" class="input" name="biayajasa"  placeholder="<?php echo $pecah['biaya_jasa'];?>">
           </div> 
           <div class="inputfield">
              <label>Biaya Tambahan Rp.</label>
              <input type="number" class="input" name="biayatambahan" placeholder="<?php echo $pecah['biaya_tambahan'];?>">
           </div> 

           <div class="inputfield">
            <label>Catatan</label>
            <textarea type="text" class="textarea" name ="keterangan" placeholder="<?php echo $pecah['keterangan'];?>"> </textarea>
         </div> 
         <div class="inputfield">
            <label>Total Biaya</label>
            <input type="text"readonly value="Rp. <?php echo $pecah['total_biaya'];?>" class="input">
         </div>
         <div class="inputfield">
            <label>Status Pesanan</label>
            <select name="status">
            <option value="">Pilih Status</option>
            <option value="Pesanan dalam proses">Diproses</option>
            <option value="Pesanan selesai">Selesai</option>
            <option value="Pesanan dibatalkan">Dibatalkan</option>
            </select>
         </div>  
          <div class="inputfield">
            <button type="submit" name="tambah" class="btn">Perbarui</button>
          </div>
        </div>
        </form>
    </div>

    <?php
        if (isset($_POST["tambah"]))
        {
            $mekanik = $_POST['mekanik'];
            $biayajasa = $_POST['biayajasa'];
            $biaya_tambahan =$_POST['biayatambahan'];
            $keterangan = $_POST['keterangan'];
            $biaya_transport = $_POST['biayatransport'];
            $status = $_POST['status'];

            $total_biaya = $biayajasa + $biaya_tambahan + $biaya_transport;

            $koneksi->query("UPDATE pemesanan SET mekanik='$mekanik' WHERE id_pemesanan=$id_pemesanan");
            $koneksi->query("UPDATE pemesanan SET biaya_jasa='$biayajasa' WHERE id_pemesanan=$id_pemesanan");
            $koneksi->query("UPDATE pemesanan SET biaya_tambahan='$biaya_tambahan' WHERE id_pemesanan=$id_pemesanan");
            $koneksi->query("UPDATE pemesanan SET keterangan='$keterangan' WHERE id_pemesanan=$id_pemesanan");
            $koneksi->query("UPDATE pemesanan SET total_biaya='$total_biaya' WHERE id_pemesanan=$id_pemesanan");
            $koneksi->query("UPDATE pemesanan SET status_pemesanan='$status' WHERE id_pemesanan=$id_pemesanan");
            
            echo "<script>location='daftarpemesanan.php';</script>";
        }
        
        ?>

</body>
</html>