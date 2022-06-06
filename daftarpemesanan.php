<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "jaserba");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admin</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index2.php">Hallo Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index2.php">Daftar Jasa <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active" href="#">Daftar Pemesanan</a>
                    <a class="nav-item nav-link" href="logoutadmin.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="container con-admin">

        <h2> Daftar Pemesanan</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Pemesan</th>
                    <th>Id Pemesan</th>
                    <th>Tanggal</th>
                    <th>Jenis Jasa</th>
                    <th>Status</th>
                    <th>Total Biaya</th>
                    <th>Mekanik</th>
                    <th>Aksi</th>
                </tr>
            <tfoot>
                <tr>
                    <th>Total Pesanan jasa :</th>
                    <td></td>
                </tr>
                <th>Total Pemasukan jasa :</th>
                <td></td>
            </tfoot>
            </thead>

            <tbody>
                <?php 
                $ambil = $koneksi->query("SELECT * FROM pemesanan");?>
                <?php 
                while ($pecah = $ambil->fetch_assoc())  {; 
                ?>
                    <tr>
                        <td><?php echo $pecah['id_pemesanan']; ?></td>
                        <td><?php echo $pecah['nama_pemesan']; ?></td>
                        <td><?php echo $pecah['id_user']; ?></td>
                        <td><?php echo $pecah['tanggal_pemesanan']; ?></td>
                        <td><?php echo $pecah['jenis_jasa']; ?></td>
                        <td><?php echo $pecah['status_pemesanan']; ?></td>
                        <td><?php echo $pecah['total_biaya']; ?></td>
                        <td><?php echo $pecah['mekanik']; ?></td>
                        <td>
                            <a href="totalbiaya.php?id=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-danger">ubah</a>
                            <a href="detail.php?id=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-primary">detail</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>