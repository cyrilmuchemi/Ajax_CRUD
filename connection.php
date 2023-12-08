<?php

$con = mysqli_connect('localhost', 'root', '', 'ajax_crud');

if(!$con)
{
    die('Please check your connection'.mysqli_error());
}