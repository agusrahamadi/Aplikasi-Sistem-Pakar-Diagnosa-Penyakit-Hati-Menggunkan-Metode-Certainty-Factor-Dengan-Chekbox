<?php
$act = $_GET['act'];
switch($act){
    case "datagrid":
	$kd_daftar = $_GET['kd_daftar'];
        $qupdate = "SELECT * FROM t_daftar WHERE kd_daftar = '$kd_daftar'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
        ?>
<?php
include("leftbar.php");
?> 


			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="adminmainapp.php?unit=dashboard">Beranda</a>
							</li>
              
							<li>Konsultasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header pull-left">
							<h1>Data Hasil Konsultasi</h1>
						</div>
						<div class="page-header pull-right">
							<h1>
								 <?php echo $dupdate['nm_pasien']; ?><small> <?php echo $dupdate['tanggal']; ?></small>
						
							</h1>
						</div>
						
                                              
						<div class="row">
						
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
								
             <form name="p_gejala" id="p_gejala" method="post" action="?unit=p_gejala_unit&act=inputact&kd_daftar=<?php echo $dupdate['kd_daftar']; ?>" enctype="multipart/form-data">
				 
				 <div class="widget-box widget-color-red" id="widget-box-2">
				   												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class=""></i>
														Silahkan pilih Gejala yang anda alami
													</h5>

											</div>
												<div class="widget-body">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover">
															<thead class="thin-border-bottom">
																
                          <tr>
                            <th style="width:100px; text-align:center">No.</th>
                            <th style="width:100px; text-align:center">Pilih Gejala</th>
                            <th style="text-align: center">Nama Gejala</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                          $qdatagrid ="  SELECT * FROM t_gejala ORDER by kode_gejala ";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
							$i = 0;
                            while($ddatagrid=mysqli_fetch_array($rdatagrid)) {
								$i++;
								 echo "
                                <tr>
                                     <td style= text-align:center>$i</td>
									   <td style= text-align:center><input id=gejala$ddatagrid[kode_gejala] name=gejala$ddatagrid[kode_gejala] type='checkbox' value='true'>
					         </td>
									
                                     <td style= text-align:left>$ddatagrid[nm_gejala]</td>
                                                
                                </tr>
                                ";
                             }
                             ?>
								
                        </tbody>
														</table>
													</div>
												</div>
											</div>
											<div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-info">Proses Gejala</button>
                         </div>
			</div> 
</form>
       

								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

		<?php
            include("footer.php");
            ?>
      <!-- DATA TABLES SCRIPT -->
      <script src="../css/backend/js/jquery.dataTables.min.js" type="text/javascript"></script>
      <script src="../css/backend/js/jquery.dataTables.bootstrap.min.js" type="text/javascript"></script>
      <script type="text/javascript">
      function confirmDialog() {
       return confirm('Apakah anda yakin?')
      }
        $('#datatable').dataTable({
          "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
        });
		
      </script>
	</body>
</html>
 <?php
        
        break;
		
    case "proses":
 $kd_daftar = $_POST['kd_daftar'];
			 $nm_pasien = $_POST['nm_pasien'];
			 $jk = $_POST['jk'];
			 $usia = $_POST['usia'];
			 date_default_timezone_set("Asia/Jakarta");
  $inptanggal = date('Y-m-d H:i:s');
			
             $qinput = "
          INSERT INTO t_daftar
          (kd_daftar, nm_pasien, jk, usia, tanggal)
          VALUES
          ('$kd_daftar', '$nm_pasien', '$jk', '$usia', '$inptanggal ')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_daftar WHERE kd_daftar = '$kd_daftar'"));
        
        if ($cek > 0) {
          echo "<script> alert('Kode Sudah Ada');
              document.location='adminmainapp.php?unit=p_gejala_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=p_gejala_unit&act=datagrid&kd_daftar=$kd_daftar';
              </script>";
          exit();
         }

		 
        break;
	  
		
        case "input":
            ?>
 
<?php
include("leftbar.php");
?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Beranda</a>
							</li>
              
							<li>Konsultasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Konsultasi<br><small> Untuk Memulai Konsultasi Silahkan Masukan Identitas Terlebih Dahulu</h1>
            

            </div>

						<div class="row">

							<div class="col-xs-12">
                              
               <?php
				$mysqli= mysqli_connect("localhost","root","","db_hati");
                $qupdate = "SELECT max(kode_daftar) as maxKode FROM t_daftar";
                $rupdate = mysqli_query($mysqli, $qupdate);
                $dupdate = mysqli_fetch_assoc($rupdate);
                $kd_daftar = $dupdate['maxKode'];
                $no_urut = $kd_daftar + 1;
                $char = "K";
                $newID = $char.sprintf("%01s",$no_urut);

                    ?>                             
             <form class="form-horizontal" name="tambah_subkat" id="tambah_subkat" method="post" action="?unit=p_gejala_unit&act=proses" enctype="multipart/form-data">
                 


				  <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_daftar" id="kd_daftar" required="required" value="<?php echo "$newID"; ?>" readonly="" />
                            </div>
                       </div>
                                                           
                        <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="nm_pasien">Nama</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="nm_pasien" id="nm_pasien" required    />
                       </div>
                       </div>
                                   <div class="form-group">
            <label  class="col-sm-3 control-label no-padding-right"for="jk">Jenis Kelamin</label>
            <div class="col-sm-9">
                    <select class="col-xs-10 col-sm-5" name="jk" id="jk" required>
                        <option value=""></option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                       </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="usia">Usia</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="usia" id="usia" required    />
                       </div>
                       </div>
					   
                  <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Lanjutkan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                         </div>
			</div> 
       
                 </form>
             

                   
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
                
			</div><!-- /.main-content -->
		<?php
            include("footer.php");
            ?>
 <script  type="text/javascript">
 var frmvalidator = new Validator("tambah_subkat");
 
 frmvalidator.addValidation("kd_penyakit","req","Silakan Pilih kategori");
 frmvalidator.addValidation("namasubkategori","req","Silakan Masukkan Nama Subkategori");
 frmvalidator.addValidation("namasubkategori","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("namasubkategori","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("namasubkategori","simbol","Hanya Huruf Saja");
</script>
	</body>
</html>


 <?php
        break;
    
             case "inputact":
      
          
      $perintah = "SELECT * from t_gejala";
						$minta =mysqli_query($mysqli,$perintah);
						$sql = '';
						$i = 0;
						//mengecek semua chekbox gejala
						while($hs=mysqli_fetch_array($minta))
						{
							//jika gejala dipilih
							//menyusun daftar gejala misal '1','2','3' dst utk dipakai di query
							if ($_POST['gejala'.$hs['kode_gejala']] == 'true')
							{
								if ($sql == '')
								{
									$sql = "'$hs[kode_gejala]'";
								}
								else
								{
									$sql = $sql.",'$hs[kode_gejala]'";
								}
							}
							$i++;
						}
						
						
						
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
<?php
include("leftbar.php");
?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Beranda</a>
							</li>
              
							<li>Data Hasil Konsultasi</li>
						</ul><!-- /.breadcrumb -->
					</div>
					 
			
					<div class="page-content">
						<div class="page-header pull-left">
							<h1>Data Hasil Konsultasi</h1>
						</div>
						<div class="page-header pull-right">
							<h1>
								 <?php echo $dupdate['nm_pasien']; ?><small> <?php echo $dupdate['tanggal']; ?></small>
						
							</h1>
						</div>
						
						
						<div class="row">
							<div class="col-xs-12">
                                                            
                   <div class="widget-box widget-color-red" id="widget-box-2">
				   												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class=""></i>
														Gejala  Yang Dipilih
													</h5>

											</div>
												<div class="widget-body">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover">
															<thead class="thin-border-bottom">
																
                          <tr>
                            <th style="width:100px; text-align: center">No.</th>
                            <th style="text-align: center">Nama Gejala</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
						$no =1;
						
						
						 $perintah = "SELECT * from t_gejala";
									$minta =mysqli_query($mysqli,$perintah);
									while($ddatagrid=mysqli_fetch_array($minta)){
										
										if ($_POST['gejala'.$ddatagrid['kode_gejala']] == 'true')
										{
											echo '<tr><td class=center>' . $no . '</td>';
											echo "<td> $ddatagrid[nm_gejala]</td><tr>";	
											$no++;
										}
										
						}
						
                             ?>
							        
								
                        </tbody>
														</table>
													</div>
												</div>
											</div>
											
											<?php
										$kd_daftar = $_GET['kd_daftar'];	
									$perintah = "SELECT * from t_penyakit where nm_penyakit = '$nama_penyakit_terbesar'";
									$minta =mysqli_query($mysqli, $perintah);
									$ddatagrid=mysqli_fetch_array($minta);
									//$id_kerusakan_terbesar
									?>
											
											<div class="page-header"></div>
											<h4>Hasil Konsultasi</h4>
											<h4><small> Jenis Penyakit diderita adalah :</small>
											<?php echo $ddatagrid['nm_penyakit']; ?> / <?php echo  "".round($daftar_cf[0], 2)."% "?>(<?php echo $daftar_cf[0]; ?>)</h4>
													
												<div class="widget-body">
													<div class="widget-main">
														
													
														<p class="alert alert-info">
															Penanganan Sementara : <?php echo $ddatagrid['penanganan']; ?>
														</p>
														<p class="alert alert-danger">
															Untuk penanganan lebih lanjut disarankan untuk kerumah sakit atau mengunjungi dokter spesialis penyakit terdekat.
														</p>
													</div>
												</div>
												
										
											 <div class="widget-box widget-color-red collapsed" id="widget-box-2">
				   												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class=""></i>
														Kemungkinan Lain
													</h5>
													<div class="widget-toolbar">
												

												
												<a href="#" data-action="collapse"> Lihat
													<i class="ace-icon fa fa-angle-down"></i>
												</a>

												
											</div>
											</div>
												<div class="widget-body">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover">
															<thead class="thin-border-bottom">
																<tr>
                            <th style="width:100px;  text-align: center">No.</th>
                            <th style="text-align: center">Penyakit</th>
                            <th style="text-align: center">Nilai CF</th>
                            <th style="text-align: center">Persen</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $no =1;
								for ($i = 0; $i < count($daftar_penyakit); $i++)
								{
									$perintah = "SELECT * from t_penyakit where kode_penyakit = '".$daftar_penyakit[$i]."'";
									$minta =mysqli_query($mysqli, $perintah);
									$ddatagrid=mysqli_fetch_array($minta);
									//$id_kerusakan_terbesar
									echo '<tr><td class=center>' . $no . '</td>';
									echo "<td class=opsi > $ddatagrid[nm_penyakit]</td>";
									echo "<td class=center> $daftar_cf[$i] </td>";
									echo "<td class=center > " . round($daftar_cf[$i], 2) . " %</td></tr>";
									$no++;
										}
										
                             ?>
                        </tbody>
														</table>
													</div>
												</div>
											</div>
											
												
											
											<div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                         <a href="adminmainapp.php?unit=l_konsultasi&sql=<?php echo $sql; ?>&kd_daftar=<?php echo $kd_daftar; ?>" class='btn btn-sm btn-danger glyphicon glyphicon-print' > Print</a> 
						 <a href="adminmainapp.php?unit=p_gejala_unit&act=datagrid&kd_daftar=<?php echo $kd_daftar; ?>" class='btn btn-sm btn-info glyphicon' >Kembali</a> <br><br><br>
                         </div>
			</div> 

       
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
                
			</div><!-- /.main-content -->
		<?php
            include("footer.php");
            ?>
	</body>
</html>

  <?php
        break;
    
           
}
            
            