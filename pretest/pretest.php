<?php
$i = 1;
while ( $i <= 100 ) {
    if ( $i % 3 == 0 && $i % 5 == 0 ) {
        echo "TigaLima <br>";
    }
    elseif ( $i % 3 == 0 ) {
        echo "Tiga <br>";
    }
    elseif ( $i % 5 == 0 ) {
        echo "Lima <br>";
    }
    else {
        echo $i . "<br>";
    };
    $i++;
}
?>