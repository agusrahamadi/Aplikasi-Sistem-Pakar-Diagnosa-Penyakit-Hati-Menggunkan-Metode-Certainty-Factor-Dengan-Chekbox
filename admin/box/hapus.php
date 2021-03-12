<?php
case "delete":
$kd_penyakit = $_GET['kd_penyakit'];
$qdelete = "
          DELETE  FROM t_penyakit
          WHERE
            kd_penyakit = '$kd_penyakit'
        ";
$rdelete = mysqli_query($mysqli,$qdelete);
header("location:?unit=penyakit_unit&act=datagrid");
break;
}