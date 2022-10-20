<?php
//linking to functions file
require 'functions.php';
//for loop that increments all the way to 100
for($x = 1; $x <= 100; $x++){
    //echo results from fizzbuzz function and creating new line
    echo fizzBuzz($x) . "<br/>";
}

//linking to othe file where html is
require 'index.view.php';