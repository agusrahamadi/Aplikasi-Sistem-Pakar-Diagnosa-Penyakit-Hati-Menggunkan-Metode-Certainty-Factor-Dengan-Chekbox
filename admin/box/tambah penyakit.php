<?php
case "inputact":
$kd_penyakit = $_POST['kd_penyakit'];
$nm_penyakit = $_POST['nm_penyakit'];
$penanganan = $_POST['penanganan'];
$qinput = "
          INSERT INTO t_penyakit
          (kd_penyakit, nm_penyakit, penanganan)
          VALUES
          ('$kd_penyakit', '$nm_penyakit',  '$penanganan')
        ";
$cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_penyakit WHERE nm_penyakit = '$nm_penyakit'"));       
  if ($cek > 0) {
		echo "<script> alert('Nama Penyakit Sudah Ada');
              document.location='adminmainapp.php?unit=penyakit_unit&act=input';
              </script>";
	} 
  else {
			mysqli_query($mysqli,$qinput);
			echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=penyakit_unit&act=datagrid';
              </script>";
	exit();
	}
break;
?>