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
		$kd_hasil = $_GET['kd_hasil'];
        $qupdate = "SELECT 
                           t_hasil.kd_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
						   t_penyakit.kode_penyakit, t_penyakit.nm_penyakit, 
						   t_penyakit.penanganan,
						   t_daftar.kd_daftar, t_daftar.nm_pasien
                            FROM 
                                t_hasil
                                    JOIN t_penyakit ON t_hasil.hasil_id = t_penyakit.kode_penyakit
									JOIN t_daftar ON t_hasil.kd_daftar = t_daftar.kd_daftar
									WHERE t_hasil.kd_hasil = '$kd_hasil'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
		
		$arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
  date_default_timezone_set("Asia/Jakarta");
  $inptanggal = date('Y-m-d H:i:s');

  $arbobot = array('0', '0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1.0');
  $argejala = array();
 
 for ($i = 0; $i < count($_POST['kondisi']); $i++) {
        $arkondisi = explode("_", $_POST['kondisi'][$i]);
        if (strlen($_POST['kondisi'][$i]) > 1) {
          $argejala += array($arkondisi[0] => $arkondisi[1]);
        }
      }

	  $sqlkondisi =(" SELECT * FROM t_kondisi ORDER by id+0");
	$rdatagridk = mysqli_query($mysqli, $sqlkondisi);
	while($rkondisi=mysqli_fetch_array($rdatagridk)) {
        $arkondisitext[$rkondisi['id']] = $rkondisi['kondisi'];
      }
  $sqlpkt =(" SELECT * FROM t_penyakit ORDER by kode_penyakit+0");
	$rdatagridp = mysqli_query($mysqli, $sqlpkt);
	while($rpkt=mysqli_fetch_array($rdatagridp)) {
        $arpkt[$rpkt['kode_penyakit']] = $rpkt['nm_penyakit'];
        $ardpkt[$rpkt['kode_penyakit']] = $rpkt['penyebab'];
        $arspkt[$rpkt['kode_penyakit']] = $rpkt['pencegahan'];
        $argpkt[$rpkt['kode_penyakit']] = $rpkt['penanganan'];
      }

	  $kd_hasil = $_GET['kd_hasil'];
        $sqlhasil = "SELECT 
                           t_hasil.kd_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
						   t_hasil.penyakit, t_hasil.gejala,
						   t_penyakit.kode_penyakit, t_penyakit.nm_penyakit, 
						   t_penyakit.penanganan,
						   t_daftar.kd_daftar, t_daftar.nm_pasien
                            FROM 
                                t_hasil
                                    JOIN t_penyakit ON t_hasil.hasil_id = t_penyakit.kode_penyakit
									JOIN t_daftar ON t_hasil.kd_daftar = t_daftar.kd_daftar
									WHERE t_hasil.kd_hasil = '$kd_hasil'";
	$rdatagridp = mysqli_query($mysqli, $sqlhasil);
  while ($rhasil = mysqli_fetch_array($rdatagridp)) {
    $arpenyakit = unserialize($rhasil['penyakit']);
    $argejala = unserialize($rhasil['gejala']);
  }

  $np1 = 0;
  foreach ($arpenyakit as $key1 => $value1) {
    $np1++;
    $idpkt1[$np1] = $key1;
    $vlpkt1[$np1] = $value1;
  }
		
		?>
		<table border="0" align="center" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr>
				<td style="font-size: 14px; width: 90%;" align="center;"><b>Rumah Sakit</b></td>
			
				</tr>
		<tr><td style="font-size: 14px; width: 90%;" align="center;"><b>KABUPATEN TAPIN</b></td></tr>
			
			<tr><td style="font-size: 10px; width: 92%;" align="center;">Jl.Tembus Blog L, Binuang 081250131040</td></tr>
		</table>
		<hr>
		
		<h5 align="center">DATA HASIL KONSULTASI</h5>
	<table border="0"  style="font-size: 16px; border-collapse: collapse; width: 100%;">
		<tr><td style="font-size: 10px; width: 92%;" > Kode : <?php echo $dupdate['kd_daftar']; ?></td></tr>
		<tr><td style="font-size: 10px; width: 92%;" > Nama	: <?php echo $dupdate['nm_pasien']; ?></td></tr>
</table> 
		<h6>Gejala Yang Dipilih :</h6>
		<table  border="1" style="font-size: 11px; border-collapse: collapse; width: 100%;">
			<thead>
			<tr>
			<td align="center">&nbsp;No&nbsp;</td>
			<td align="center">&nbsp; Kode Gejala &nbsp;</td>
			<td align="center"> &nbsp; Nama Gejala &nbsp;</td>
			</tr>
			</thead>
		 <?php
		 
		 $ig = 0;
						foreach ($argejala as $key => $value) {
						$kondisi = $value;
						$ig++;
						$gejala = $key;
         $mysqli= mysqli_connect("localhost","root","","db_hati");
         $mysqli= mysqli_connect("localhost","root","","db_hati");
    $qdatagrid =" SELECT * FROM t_gejala where kode_gejala = '$key'";
                        $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                        $ddatagrid=mysqli_fetch_array($rdatagrid);
       
       		?>
			<tbody>
<tr>
<td align="center">&nbsp;<?php echo $ig ?>&nbsp;</td>
<td style="width:120px;" align="center">&nbsp;<?php echo $ddatagrid['kd_gejala'] ?>&nbsp;</td>
<td style="width:380px;"> &nbsp; <?php echo $ddatagrid['nm_gejala']; ?>&nbsp;</td>
</tr>
</tbody>
<?php } ?></table>


<h6>Hasil konsultasi Penyakit :</h6>
<table  border="1" style="font-size: 11px; border-collapse: collapse; width: 100%;">
			<thead>
			<tr>
			<td align="center">&nbsp;No&nbsp;</td>
			<td align="center">&nbsp; Kode Pennyakit &nbsp;</td>
			<td align="center"> &nbsp; Nama Penyakit &nbsp;</td>
			<td align="center"> &nbsp; Nilai cf &nbsp;</td>
			</tr>
			</thead>
		 <?php
		 
		 $np = 0;
						foreach ($arpenyakit as $key => $value) {
						$np++;
						$idpkt[$np] = $key;
						$nmpkt[$np] = $arpkt[$key];
						$vlpkt[$np] = $value;
						
                        $qdatagrid =" SELECT * FROM t_penyakit where kode_penyakit = '$key'";
                        $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                        $ddatagrid=mysqli_fetch_array($rdatagrid);
						for ($ipl = 1; $ipl < count($idpkt); $ipl++) ;
       
       		?>
			<tbody>
<tr>
<td align="center">&nbsp;<?php echo $np ?>&nbsp;</td>
<td style="width:120px;" align="center">&nbsp;<?php echo $ddatagrid['kd_penyakit']; ?>&nbsp;</td>
<td  style="width:250px;" > &nbsp; <?php echo $ddatagrid['nm_penyakit']; ?>&nbsp;</td>
<td  style="width:120px;"  align="center"> &nbsp; <?php echo $vlpkt[$ipl]; ?>&nbsp;</td>
</tr>
</tbody>
<?php } ?></table>

<h6>Hasil Diagnosa :</h6>

<table border="1"  style="font-size: 16px; border-collapse: collapse; width: 100%;">
		<tr><td style="font-size: 10px; width: 90%;" ><b>Hasil Dari Diagnosa Penyakit Yang Paling Mungkin adalah : <?php echo $dupdate['nm_penyakit']; ?></b></td></tr>
		
		<tr><td style="font-size: 10px; width: 92%;" > Penanganan	: <?php echo $dupdate['penanganan']; ?></td></tr>
</table>
		
</page>
<?php
    $content = ob_get_clean();

// conversion HTML => PDF
 require_once(dirname(__FILE__).'../../../html2pdf/html2pdf.class.php');
 try
 {
 $html2pdf = new HTML2PDF('L','A5', 'fr', false, 'ISO-8859-15');
 $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
 ob_end_clean();
 $html2pdf->Output();
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>
</html>