<?php 

function isPrime($num){
    if($num==1){
        return false;
    }
    for($x=2; $x <= $num/2; $x++){
        if($num % $x == 0)
        return false;
    }
    return true;
}
$number = isPrime(20);
var_dump($number);
?>