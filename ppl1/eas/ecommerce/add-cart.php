<?php

    session_start();

    include 'database.php';

    if(isset($_GET['id_barang'])){
        $productByCode = db_select("SELECT * FROM barang WHERE id_barang='" . $_GET["id_barang"] . "'");
		$itemArray = array($productByCode[0]["id_barang"]
            => array(
                'nama_barang'=>$productByCode[0]["nama_barang"], 
                'id_barang'=>$productByCode[0]["id_barang"], 
                'stok'=>$productByCode[0]["stok"], 
                'qty'=>1, 
                'harga_barang'=>$productByCode[0]["harga_barang"], 
                'foto'=>$productByCode[0]["foto"])
        );

		if(!empty($_SESSION["cart_item"])) {
			$ada = 0;
			foreach($_SESSION["cart_item"] as $k => $v) {
				if($productByCode[0]["id_barang"] == $_SESSION["cart_item"][$k]["id_barang"]) {
					$_SESSION["cart_item"][$k]["qty"] += 1;
					$ada = 1;
					break;
				}
			}
			if($ada == 0){
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
    }

    header("location: index.php");