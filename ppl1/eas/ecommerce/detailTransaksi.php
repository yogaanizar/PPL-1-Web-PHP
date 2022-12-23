<?php

use LDAP\Result;

	session_start();
  include '../database/koneksi.php';
  include '../navbar/navbar.php';

  if(isset($_GET['total_bayar'])){
    $total_bayar = $_GET['total_bayar'];
  }
  if(isset($_GET['kode_penjualan'])){
    $kode_penjualan = $_GET['kode_penjualan'];
  }
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
            <button class="btn btn-md btn-primary">
              <i class="fa-solid fa-cart-shopping fa-lg"></i>
              Shopping Cart
              <span class="badge badge-warning"></span>
            </button>
          </nav>
          </div>
        </div>
        <div class="row m-2">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <center>
                  <h4>Detail Transaksi</h4>
                </center>
              </div>
            </div>
            <div class="card-body">
              <a href="ecommerce.php">
                <button class="btn btn-sm btn-primary mb-3">
                  <i class="fa-solid fa-cart-shopping fa-lg"></i>
                  Back to Shopping
                </button>
              </a>
              <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <center><h4>Deskripsi Transaksi Customer</h4></center>
                    </div>
                    <div class="card-body">
                    <?php 
                      $sql = "SELECT * FROM transaksi
                      INNER JOIN  barang ON transaksi.id_barang = barang.id_barang
                      INNER JOIN penjualan ON transaksi.kode_penjualan = penjualan.kode_penjualan WHERE transaksi.kode_penjualan='$kode_penjualan'";	
                      $result = $conn->query($sql);
                      $row =mysqli_fetch_array($result);
                    ?>
                      <p><h5><b>Nama &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp</b><?php echo $row['nama']?></h5></p>
                      <p><h5><b>Alamat &nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp</b><?php echo $row['alamat']?></h5></p>
                      <p><h5><b>Tanggal Transaksi&nbsp&nbsp:&nbsp&nbsp&nbsp</b><?php echo $row['tanggal_penjualan']?></h5></p>
                      <p><h5><b>Barang Dibeli &nbsp&nbsp&nbsp:</b>&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $row['nama_barang']?></h5></p>
                      <?php
                        while($row =mysqli_fetch_array($result)) {
                      ?>
                      <p><h5><b>Barang Dibeli &nbsp&nbsp&nbsp:</b>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row['nama_barang']?></h5></p>
                      <?php 
                        }
                      ?>
                      <p><b><h5>Total Bayar : <?php echo $total_bayar?></h5></b></p>
                    </div>
                    <div class="card-footer">
                      <a href="bayar.php">
                      <button class="btn btn-md btn-success text-white float-right">Bayar</button>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
              </div>
            </div>
          </div>
        </div>
      </body>
    </html>