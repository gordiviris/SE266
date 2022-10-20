<?php

function dd($val){
    echo '<pre>';
    die(var_dump($val));
    echo '</pre>';
}