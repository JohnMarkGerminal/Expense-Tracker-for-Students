<?php

$conn = mysqli_connect("localhost", "root", "", "expense_tracker");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

session_start();

?> 