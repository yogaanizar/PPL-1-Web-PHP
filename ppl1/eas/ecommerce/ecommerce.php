<?php
	session_start();
  include '../database/koneksi.php';
  include '../navbar/navbar.php';

?>
<html>
<div class="content-wrapper">
    <section class="content-header bg-primary mb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <i class="nav-icon text-white fa-solid fa-cart-shopping"> E-Commerce Politeknik Negeri Bandung</i>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">E-Commerce</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
      <div class="card mr-2 ml-2">
        <div class="row">
          <div class="col">
          <nav class="navbar navbar-light bg-secondary">
            <div class="col-md-2">
            <a class="navbar-brand ml-5 text-white">E-Commerce</a>
            </div>
            <div class="col-md-8">
            <form class="form-inline float-right">
              <input class="form-control mr-sm-2" type="search" placeholder="Pencarian Barang" aria-label="Search">
              <button class="btn btn-md btn-primary" type="submit">Cari</button>
            </form>
            </div>
            <a href="cart.php">
              <button class="btn btn-md btn-primary">
                <i class="fa-solid fa-cart-shopping fa-lg"></i>
                Shopping Cart
                <span class="badge badge-warning"></span>
              </button>
            </a>
          </nav>
          </div>
        </div>
          <div class="mt-5 mb-5">
            <center><h1><b>Selamat Datang di <i> E-Commerce Politeknik Negeri Bandung</i></b></h1></center>
          </div>
        <div class="card-body">
            <div class="row">
                <?php 
                    $sql = "SELECT * FROM barang";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) > 0) {
                       while($row =mysqli_fetch_array($result)) {
                ?>
                <!-- view Barang -->
                <div class="card col-md-3">
                    <div class="card-header">
                        <h4><center><b>PRODUK</b></center></h4>
                    </div>
                    <a href="detail.php? kode_barang=<?php echo $row['id_barang']?>">
                        <div class="card-body">
                            <center>
                                <?php echo "<img src='./gambar/$row[gambar]' style=height:300px />"?>
                            </center>
                        </div> 
                    </a>
                    <div class="card-footer" style="height: 150px ;">
                        <p><h5><?php echo $row['nama_barang']?></h5></p>
                        <p><h4><b>Rp. <?php echo $row['harga']?></b></h4></p>
                    </div>   
                    <div class="card-footer mb-2">
                        <a href="detail.php? kode_barang=<?php echo $row['id_barang']?>">
                            <button class="btn btn-primary btn-md text-white btn-block">
                                <i class="fa-solid fa-circle-info"></i> Details
                            </button>
                        </a>
                    </div>
                </div>
                <!-- end view Barang -->
                <?php 
                        }
                    }
                ?>
        </div>
      </div>
      </body>
    </html>