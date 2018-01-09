<?php

function conection() {
    $HOST = 'localhost';
    $USER = 'root';
    $PASS = '';
    $BASE = 'school_system_DB';

    $db = mysqli_connect($HOST, $USER, $PASS, $BASE);
    
    return $db;
}

$mysqli = conection(); 