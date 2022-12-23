<?php

    session_start();

    if($_GET['id_barang']){
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                if($_SESSION["cart_item"][$k]["id_barang"] == $_GET["id_barang"]){
                    unset($_SESSION["cart_item"][$k]);                    
                }
            }
        }
        header("location:cart.php");
    }