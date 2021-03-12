<?php
session_start();
if (!isset($_SESSION['nm_pengguna']))
{
   header("location:dashboard.php");
}
require_once '../lib/koneksi.php';
        $qupdate = "SELECT * FROM  t_login WHERE nm_pengguna = '".$_SESSION['nm_pengguna']."'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
 		date_default_timezone_set("Asia/Brunei");
        $tanggalsekarang = date("Y-m-d H:i:s");
        $zupdate = 
                "
                UPDATE t_login SET
                jamkeluar ='$tanggalsekarang'
                WHERE
                nm_pengguna = '".$_SESSION['nm_pengguna']."'
                ";  
      $rupdate = mysqli_query($mysqli,$zupdate);
session_destroy();
header("location:login.php");
