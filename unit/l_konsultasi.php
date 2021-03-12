<!DOCTYPE html>
<?php 
ob_start();
?>
<page>
		<style type="text/css">
		table#barang{
			border: 2px solid darkgrey;
		}
		th{
			border-bottom: 2px solid darkgrey;
		}
		td.table-td{
			border-bottom: 2px solid darkgrey;
			border-right: 0.5px solid darkgrey;
		}
		</style>
		<?php
		
						
						
						 $sql = $_GET['sql'];
						empty($daftar_penyakit);
						empty($daftar_cf);
						if ($sql != '')
						{
							//mencari kode_penyakit di tabel pengetahuan yang gejalanya dipilih
							$perintah = "SELECT kode_penyakit FROM t_diagnosa WHERE kode_gejala IN ($sql) GROUP BY kode_penyakit ORDER BY kode_penyakit";
							//echo "<br/>".$perintah."<br/>";
							$minta =mysqli_query($mysqli,$perintah);
							$kode_penyakit_terbesar = '';
							$nama_penyakit_terbesar = '';
							$c = 0;
							
							while($hs=mysqli_fetch_array($minta))
							{
								//memproses id penyakit satu persatu
								$kode_penyakit = $hs['kode_penyakit'];
								$qryi = "SELECT * FROM t_penyakit WHERE kode_penyakit = '$kode_penyakit'";
								$qry =mysqli_query($mysqli,$qryi);
								$dt = mysqli_fetch_array($qry);
								$nama_penyakit = $dt['nm_penyakit'];
								$daftar_penyakit[$c] = $hs['kode_penyakit'];
								$p = "SELECT kode_penyakit, mb, md, kode_gejala FROM t_diagnosa WHERE kode_gejala IN ($sql) AND kode_penyakit = '$kode_penyakit'";
								//echo $p.'<br/>';
								$m =mysqli_query($mysqli,$p);
								//mencari jumlah gejala yang ditemukan
								$jml = mysqli_num_rows($m);
								//jika gejalanya 1 langsung ketemu CF nya
								
								if ($jml == 1)
								{
									$h=mysqli_fetch_array($m);
									$mb = $h['mb'];
									$md = $h['md'];
									$cf = $mb - $md;
									$daftar_cf[$c] = $cf;
									//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
									if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
									{
										$cf_terbesar = $cf;
										$id_penyakit_terbesar = $kode_penyakit;
										$nama_penyakit_terbesar = $nama_penyakit;
									}
									//jika jumlah gejala cuma dua maka CF ketemu	
								}
								else if ($jml > 1)
								{
									$i = 1;
									//proses gejala satu persatu
									while($h=mysqli_fetch_array($m))
									{
										//pada gejala yang pertama masukkan MB dan MD menjadi MBlama dan MDlama
										if ($i == 1)
										{
											$mblama = $h['mb'];
											$mdlama = $h['md'];
											}
										//pada gejala yang nomor dua masukkan MB dan MD menjadi MBbaru dan MB baru kemudian hitung MBsementara dan MDsementara
										else if ($i == 2)
										{
											$mbbaru = $h['mb'];
											$mdbaru = $h['md'];
											$mbsementara = $mblama + ($mbbaru * (1 - $mblama));
											$mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
											//jika jumlah gejala cuma dua maka CF ketemu
											if ($jml == 2)
											{
												$mb = $mbsementara;
												$md = $mdsementara;
												$cf = $mb - $md;
												$daftar_cf[$c] = $cf;
												//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
												if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
												{
													$cf_terbesar = $cf;
													$id_penyakit_terbesar = $id_penyakit;
													$nama_penyakit_terbesar = $nama_penyakit;
												}
											}
										}
										//pada gejala yang ke 3 dst proses MBsementara dan MDsementara menjadi MBlama dan MDlama
										//MB dan MD menjadi MBbaru dan MDbaru
										//hitung MBsementara dan MD sementara yg sekarang
										else if ($i >= 3)
										{
											$mblama = $mbsementara;
											$mdlama = $mdsementara;
											$mbbaru = $h['mb'];
											$mdbaru = $h['md'];
											$mbsementara = $mblama + ($mbbaru * (1 - $mblama));
											$mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
											//jika ini adalah gejala terakhir berarti CF ketemu
											if ($jml == $i)
											{
												$mb = $mbsementara;
												$md = $mdsementara;
												$cf = $mb - $md;
												$daftar_cf[$c] = $cf;
												//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
												if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
												{
													$cf_terbesar = $cf;
													$id_penyakit_terbesar = $kode_penyakit;
													$nama_penyakit_terbesar = $nama_penyakit;
												}
											}
										}
										$i++;
									}
								}
								$c++;
							}
						}
						//urutkan daftar gejala berdasarkan besar CF
						for ($i = 0; $i < count($daftar_penyakit); $i++)
						{
							for ($j = $i + 1; $j < count($daftar_penyakit); $j++)
							{
								if ($daftar_cf[$j] > $daftar_cf[$i])
								{
									$t = $daftar_cf[$i];
									$daftar_cf[$i] = $daftar_cf[$j];
									$daftar_cf[$j] = $t;

									$t = $daftar_penyakit[$i];
									$daftar_penyakit[$i] = $daftar_penyakit[$j];
									$daftar_penyakit[$j] = $t;
								}
							}
						}
						
		
		 $kd_daftar = $_GET['kd_daftar'];
        $qupdate = "SELECT * FROM t_daftar WHERE kd_daftar = '$kd_daftar'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
		
		?>
		<table border="0" align="center" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr>
				<td style="font-size: 14px; width: 90%;" align="center;"><b>LAPORAN APLIKASI</b></td>
			
				</tr>
		<tr><td style="font-size: 14px; width: 90%;" align="center;"><b>Sistem Pakar Diagnosa Penyakit Hati Menggunkan Metode Certainty </b></td></tr>
			
			<tr><td style="font-size: 10px; width: 92%;" align="center;">NAILIANA 310115022830</td></tr>
		</table>
		<hr>
		
		<h5 align="center">DATA HASIL KONSULTASI</h5>
	<table border="0"  style="font-size: 16px; border-collapse: collapse; width: 100%;">
		<tr><td style="font-size: 10px; width: 92%;" align="right;" > Kode Konsultasi: <?php echo $dupdate['kd_daftar']; ?></td></tr>
		<tr><td style="font-size: 10px; width: 92%; " align="right;" > Tanggal Konsultasi	: <?php echo $dupdate['tanggal']; ?></td></tr>
		<tr><td style="font-size: 10px; width: 92%;" align="left;"> Nama	: <?php echo $dupdate['nm_pasien']; ?></td></tr>
		<tr><td style="font-size: 10px; width: 92%;" align="left;"> JK	: <?php echo $dupdate['jk']; ?></td></tr>
		<tr><td style="font-size: 10px; width: 92%;" align="left;"> Usia	: <?php echo $dupdate['usia']; ?></td></tr>
		
</table> 
		<h5>Gejala Yang Dipilih :</h5>
		<table  border="1" style="font-size: 11px; border-collapse: collapse; width: 100%;">
			<thead>
			<tr>
			<td align="center">&nbsp;No&nbsp;</td>
			<td style="width:380px;" align="center"> &nbsp; Nama Gejala &nbsp;</td>
			</tr>
			</thead>
		  <?php
		 $no=1;
         $mysqli= mysqli_connect("localhost","u8110790_db_hati","metalbest149","u8110790_db_hati");
   
        $qupdate = "SELECT * FROM t_gejala WHERE kode_gejala IN ($sql)";
        $rupdate = mysqli_query($mysqli, $qupdate);
        while($dupdate = mysqli_fetch_assoc($rupdate)){
       		?>
			<tbody>
<tr>
<td align="center">&nbsp;<?php echo $no ?>&nbsp;</td>
<td style="width:340px;" > &nbsp; <?php echo $dupdate['nm_gejala']; ?>&nbsp;</td>
</tr>
</tbody>

<?php $no++; } ?>
</table>



			
			
	<?php
										$kd_daftar = $_GET['kd_daftar'];	
									$perintah = "SELECT * from t_penyakit where nm_penyakit = '$nama_penyakit_terbesar'";
									$minta =mysqli_query($mysqli, $perintah);
									$ddatagrid=mysqli_fetch_array($minta);
									//$id_kerusakan_terbesar
									?>
<br><br>
<h5>Hasil Konsultasi:</h5>

<table   style="font-size: 20px; border-collapse: collapse; width: 100%;">
		<tr><td style="font-size: 14px; width: 90%;" ><b>Jenis Penyakit yang diderita adalah : <?php echo $ddatagrid['nm_penyakit']; ?>/ <?php echo "".round($daftar_cf[0], 2)."% "?>(<?php echo $daftar_cf[0]; ?>)</b></td></tr>
</table>
<br>
<table border="1"  style="font-size: 16px; border-collapse: collapse; width: 100%;">
		<tr><td style="font-size: 10px; width: 92%;" > Penanganan	: <?php echo $ddatagrid['penanganan']; ?></td></tr>
</table>
<br>
<table border="1"  style="font-size: 16px; border-collapse: collapse; width: 100%;">
		<tr><td style="font-size: 10px; width: 92%;" > Untuk penanganan lebih lanjut disarankan untuk kerumah sakit atau mengunjungi dokter spesialis penyakit terdekat.</td></tr>
</table>



		
</page>
<?php
    $content = ob_get_clean();

// conversion HTML => PDF
 require_once(dirname(__FILE__).'../../html2pdf/html2pdf.class.php');
 try
 {
 $html2pdf = new HTML2PDF('L','A4', 'fr', false, 'ISO-8859-15');
 $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
 ob_end_clean();
 $html2pdf->Output();
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>
</html>