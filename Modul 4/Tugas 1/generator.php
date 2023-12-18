<?php
function generator($n){
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "HelloWorld";
        } else if ($i % 3 == 0) {
            echo "Hello";
        } else if ($i % 5 == 0) {
            echo "World";
        } else {
            echo $i;
        }
        echo "\n";
    }
}

generator(15);