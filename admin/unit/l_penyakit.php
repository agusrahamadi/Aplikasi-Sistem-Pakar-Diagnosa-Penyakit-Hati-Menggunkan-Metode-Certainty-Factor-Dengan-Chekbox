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
		
		<table border="0" align="center" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr>
				<td style="font-size: 14px; width: 90%;" align="center;"><b>LAPORAN APLIKASI</b></td>
			
				</tr>
		<tr><td style="font-size: 14px; width: 90%;" align="center;"><b>Sistem Pakar Diagnosa Penyakit Hati Menggunkan Metode Certainty </b></td></tr>
			
			<tr><td style="font-size: 10px; width: 92%;" align="center;">NAILIANA 310115022830</td></tr>
		</table>
		<hr>
		<h5 align="center">DATA PENYAKIT</h5>
		<table  border="1" style="font-size: 8px; border-collapse: collapse; width: 100%;">
			<thead>
			<tr>
			<td align="center">&nbsp;No&nbsp;</td>
			<td align="center">&nbsp; Kode Penyakit &nbsp;</td>
			<td align="center"> &nbsp; Nama Penyakit &nbsp;</td>
			<td align="center"> &nbsp; Penanganan &nbsp;</td>
			</tr>
			</thead>
		 <?php
		 $no=1;
         $mysqli= mysqli_connect("localhost","root","","db_hati");
   
        $qupdate = "SELECT * FROM t_penyakit ";
        $rupdate = mysqli_query($mysqli, $qupdate);
        while($dupdate = mysqli_fetch_assoc($rupdate)){
       		?>
			<tbody>
<tr>
<td style="width:35px;" align="center">&nbsp;<?php echo $no ?>&nbsp;</td>
<td style="width:35px;" align="center">&nbsp;<?php echo $dupdate['kd_penyakit']; ?>&nbsp;</td>
<td style="width:100px;" > &nbsp; <?php echo $dupdate['nm_penyakit']; ?>&nbsp;</td>
<td style="width:155px;"><?php echo $dupdate['penanganan']; ?>&nbsp;</td>
</tr>
</tbody>

<?php $no++; } ?>
		</table>
       
		
<p></p>
	


		
		
		<br />
        <p></p>
		<?php
		
        ?>
		
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