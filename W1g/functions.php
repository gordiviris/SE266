<?php

//declaring fizzbuzz function, accepts one parameter
function fizzBuzz($num){
    //returns fizz buzz if its a multiple of 2 and 3
    if($num % 2 == 0 && $num % 3 == 0){
        return 'Fizz Buzz';
    }
    //returns fizz if multple of 2
    elseif ($num % 2 == 0){
        return 'Fizz';
    }
    //returns buzz if multiple of 3
    elseif ($num % 3 == 0){
        return 'Buzz';
    }
    //if it is not a multiple of 2 or 3 then it returns the number passed
    else{
        return $num;
    }
}