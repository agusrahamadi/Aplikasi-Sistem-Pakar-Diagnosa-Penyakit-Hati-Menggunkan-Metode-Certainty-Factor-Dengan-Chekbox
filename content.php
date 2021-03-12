<?php
error_reporting(E_ALL^(E_NOTICE | E_WARNING));
$unit = $_GET['unit'];
if($unit == "produk_unit") {
    require_once 'unit/produk_unit.php';
}
else if($unit == "dashboard") {
    require_once 'unit/dashboard.php';
}
else if($unit == "tentangpenyakit_unit") {
    require_once 'unit/tentangpenyakit_unit.php';
}
else if($unit == "p_dashboard") {
    require_once 'unit/p_dashboard.php';
}
else if($unit == "p_penyakit_unit") {
    require_once 'unit/p_penyakit_unit.php';
}
else if($unit == "p_cf_unit") {
    require_once 'unit/p_cf_unit.php';
}
else if($unit == "l_penyakit") {
    require_once 'unit/l_penyakit.php';
}
else if($unit == "penyakit_unit") {
    require_once 'unit/penyakit_unit.php';
}
else if($unit == "gejala_unit") {
    require_once 'unit/gejala_unit.php';
}
else if($unit == "dbp_unit") {
    require_once 'unit/dbp_unit.php';
}
else if($unit == "admin_unit") {
    require_once 'unit/admin_unit.php';
}
else if($unit == "pengguna_unit") {
    require_once 'unit/pengguna_unit.php';
}
else if($unit == "l_gejala") {
    require_once 'unit/l_gejala.php';
}
else if($unit == "l_dbp") {
    require_once 'unit/l_dbp.php';
}
else if($unit == "l_konsultasi_d") {
    require_once 'unit/l_konsultasi_d.php';
}
else if($unit == "konsultasi_unit") {
    require_once 'unit/konsultasi_unit.php';
}
else if($unit == "p_gejala_unit") {
    require_once 'unit/p_gejala_unit.php';
}
else if($unit == "l_konsultasi") {
    require_once 'unit/l_konsultasi.php';
}
