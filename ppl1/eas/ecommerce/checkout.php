<?php 
    session_start();
    include '../database/koneksi.php';
    if(isset($_POST['nama'])){
        $nama = $_POST['nama'];
    }
    if(isset($_POST['alamat'])){
        $alamat = $_POST['alamat'];
    }
    if(isset($_GET['total_bayar'])){
        $total_bayar = $_GET['total_bayar'];
    }
    
    $sql1 = "INSERT INTO `penjualan` (`nama`, `alamat`) VALUES ('$nama','$alamat')";
    $result = mysqli_query($conn, $sql1);

    $query = "SELECT * FROM penjualan";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while($row =mysqli_fetch_array($result)) {
            $kode_penjualan = $row['kode_penjualan'];
        }
    }

    foreach ($_SESSION["cart_item"] as $item){
        $id_barang = $item['id_barang'];
        $total_harga = $item['harga']* $item['qty'];
        $sql2 = "INSERT INTO `transaksi` (`id_barang`, `kode_penjualan`, `total_harga`) VALUES ('$id_barang', '$kode_penjualan', '$total_harga')";
        $result= mysqli_query($conn, $sql2);

    }
    header("location: detailTransaksi.php? total_bayar=$total_bayar&kode_penjualan=$kode_penjualan");

 ?>
