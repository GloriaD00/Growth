<?php

if(!isset($_SESSION))
{
    session_start();
}

$arr=$_SESSION['enc_arr'];

echo json_encode($arr);