 <?php
    echo "<h1> Kelipatan 5 dimulai dari 10 <br>";

    $i = 1;
    
        $bil = 0;
        
            while($i < 50) {
            
                $i++;
            
                if($i % 5 == 0){
            
                    if($i >= 10){
            
                        $bil=$i;
                        echo "<h5>Deretan angka = $bil <br> ";
            
                    }
                }
            }
?> 