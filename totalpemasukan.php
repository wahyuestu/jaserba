<?php
session_start();
$id_pemesanan = $_GET['id'];
$koneksi = new mysqli("localhost","root","","jaserba");


?>

<?php
    $query    =mysqli_query($conn, "SELECT * FROM total_pemasukan");
    while ($data    =mysqli_fetch_array($query)){
        // looping atribut jumlah dan harga
        $jumlah[]    =$data['jumlah'];
        $n_harga[]    =$data['jumlah']*$data['harga'];
    }
    //total
    $jumlah_barang    =array_sum($jumlah);
    $total_harga    =array_sum($n_harga);
?>