<?php


$servername="localhost";
$username="root";
$password="";
$db="tutor_finder";



$conn = mysqli_connect($servername,$username, $password, $db);


if($conn==false){

    echo 'error';
}

?>