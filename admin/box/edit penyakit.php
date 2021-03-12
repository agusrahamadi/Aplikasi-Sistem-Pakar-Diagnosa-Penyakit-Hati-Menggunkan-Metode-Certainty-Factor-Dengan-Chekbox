<?php
case "updateact":
$kd_penyakit = $_POST['kd_penyakit'];
$nm_penyakit = $_POST['nm_penyakit'];
$penanganan = $_POST['penanganan'];
$qupdate = "
		UPDATE t_penyakit SET
        nm_penyakit = '$nm_penyakit',
		penanganan = '$penanganan'
		WHERE
        kd_penyakit = '$kd_penyakit'
        ";
$rupdate = mysqli_query($mysqli,$qupdate);
header("location:?unit=penyakit_unit&act=datagrid");
break;
}