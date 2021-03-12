<?php
$server ='localhost';
$user   ='u8110790_db_hati';
$password ='metalbest149';
$database ='u8110790_db_hati';

$mysqli = mysqli_connect($server, $user, $password, $database) or (mysqli_error($mysqli));
if (mysqli_connect_errno($mysqli)){
    echo 'koneksi ke databese belum berhasil'. mysqli_errno($mysqli);
    
}
 else {
   // echo 'Koneksi Berhasil';
}
