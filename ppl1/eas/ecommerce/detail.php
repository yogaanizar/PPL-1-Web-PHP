<?php 
	session_start();

  include '../database/koneksi.php';
  include '../navbar/navbar.php';
  if(isset($_GET['kode_barang'])){
    $kode_barang = $_GET['kode_barang'];
  }else{
    echo ' Barang Tidak Tersedia';
  }

  $sql = "SELECT * FROM barang WHERE id_barang = '$kode_barang'";
  $result = $conn->query($sql);
  $row =mysqli_fetch_array($result);
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
        <div class="card-header">
          <center><h1>DETAIL BARANG</h1></center>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $row['nama_barang'] ?></h3>
              <div class="col-12">
                <?php echo "<img src='./gambar/$row[gambar]' style=height:700px />"?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $row['nama_barang'] ?></h3>
              <hr>
              <h4>Warna Tersedia</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off" checked>
                  <?php echo $row['warna']?>
                  <br>
                  <i class="fas fa-circle fa-2x text-brown"></i>
                </label>
              </div>
              <h4 class="mt-3">Ukuran</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl"><?php echo $row['ukuran']?></span>
                  <br>
                </label>
              </div>
              <h4 class="mt-3">Stok Tersedia</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl"><?php echo $row['stok']?> pcs</span>
                  <br>
                </label>
              </div>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Rp. <?php echo $row['harga']?>
                </h2>
                <h4 class="mt-0">
                  <small>Discout -10%</small>
                </h4>
              </div>

              <div class="mt-4">
                <a href="addCart.php? id_barang=<?php echo $row['id_barang']?>">
                  <div class="btn btn-primary btn-lg btn-flat">
                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                    Add to Cart
                  </div>
                </a>

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Add to Wishlist
                </div>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
              <!-- isideskripsi -->
              </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
              <!-- isikomentar -->
              </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> 
              <!-- rating -->
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <a href="ecommerce.php">
            <button class="btn btn-primary btn-md text-white" style="float: right ;">
              <i class="fa-solid fa-arrow-left"></i> Kembali
            </button>
          </a>
        </div>
      </div>
      </body>
    </html>