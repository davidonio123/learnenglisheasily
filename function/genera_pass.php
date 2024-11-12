<?php

/*---------------
GENERATORE CODICE
viene usato nel file page/change_pass.php
---------------*/

function generaPass($lunghezza){
    $characters = 'QWERTYUIOPASDFGHJKLZXCVBNM1234567890';
    $messaggio='';
    $i=0;
    while($i<$lunghezza){
        $messaggio .= $characters[mt_rand(0,strlen($characters)-1)];
        $i++;
    }
    return $messaggio;
}
?>