<?php
    session_start();        
    unset($_SESSION['cart_item']);
    echo '<script type ="text/JavaScript">';  
    echo 'alert("PEMBAYARAN BERHASIL")';  
    echo '</script>'; 
    echo '<meta http-equiv="refresh" content="0.1;url=ecommerce.php">';
?>