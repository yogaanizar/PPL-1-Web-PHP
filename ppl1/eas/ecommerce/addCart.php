<?php

    session_start();

    include '../database/koneksi.php';

     if(isset($_GET['id_barang'])){
         $id_barang = $_GET['id_barang'];
     }
     if(isset($_GET['btn'])){
         $btn = $_GET['btn'];
     }

     $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
     $result = $conn->query($sql);
     $row =mysqli_fetch_array($result);

     $item = array($row['id_barang'] 
             => array (
                 'nama_barang' => $row["nama_barang"],
                 'id_barang' => $row["id_barang"],
                 'stok' => $row["stok"],
                 'qty' => 1,
                 'harga' => $row["harga"],
                 'gambar' => $row["gambar"]
                )
            );
    if(!empty($_SESSION["cart_item"]) and $btn == 'minus') {
        $ada = 0;
        foreach($_SESSION["cart_item"] as $k => $v) {
            if($row["id_barang"] == $_SESSION["cart_item"][$k]["id_barang"]) {
                if( $_SESSION["cart_item"][$k]["qty"] == 0 ){
                    $_SESSION["cart_item"][$k]["qty"] = 0;
                    $ada = 1;
                    break; 
                }else{
                    $_SESSION["cart_item"][$k]["qty"] -= 1;
                    $ada = 1;
                    break;
                }
            }
        }
        if($ada == 0){
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $item);
        }
        header("location: cart.php");
    }elseif(!empty($_SESSION["cart_item"]) and $btn == 'plus' ) {
		$ada = 0;
		foreach($_SESSION["cart_item"] as $k => $v) {
			if($row["id_barang"] == $_SESSION["cart_item"][$k]["id_barang"]) {
                if( $_SESSION["cart_item"][$k]["qty"] >= $row['stok']){
                    $_SESSION["cart_item"][$k]["qty"] = $row['stok'];
                    $ada = 1;
                    break; 
                }else{
                    $_SESSION["cart_item"][$k]["qty"] += 1;
                    $ada = 1;
                    break;
                }
			}
		}
		if($ada == 0){
			$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $item);
		}
        header("location: cart.php");
	}elseif(!empty($_SESSION["cart_item"])) {
		$ada = 0;
		foreach($_SESSION["cart_item"] as $k => $v) {
			if($row["id_barang"] == $_SESSION["cart_item"][$k]["id_barang"]) {
                if( $_SESSION["cart_item"][$k]["qty"] >= $row['stok']){
                    $_SESSION["cart_item"][$k]["qty"] = $row['stok'];
                    $ada = 1;
                    break; 
                }else{
                    $_SESSION["cart_item"][$k]["qty"] += 1;
                    $ada = 1;
                    break;
                }
			}
		}
		if($ada == 0){
			$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $item);
		}
        header("location: ecommerce.php");
	}else {
		$_SESSION["cart_item"] = $item;
        header("location: cart.php");
	}