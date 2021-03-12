<?php
$act = $_GET['act'];
switch($act){
    case "datagrid":
        ?>
<?php
include("../admin/leftbar.php");
?> 
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="adminmainapp.php?unit=dashboard">Beranda</a>
							</li>
              <li>Data Transaksi</li>
							<li>Data Konsultasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>Data Konsultasi</h1>
						</div>
                                                
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
                  <div class="box box-primary">
                    <div class="box-body table-responsive padding">
                  
                      <table id="datatable" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Tanggal</th>
                            <th style="text-align: center">Nama</th>
                            <th style="text-align: center">Penyakit</th>
                            <th style="text-align: center">Nilai CF</th>
                            <th style="text-align: center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $no=1; 
                          $qdatagrid ="  SELECT 
                           t_hasil.kd_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
						   t_penyakit.kode_penyakit, t_penyakit.nm_penyakit,
						   t_daftar.kd_daftar, t_daftar.nm_pasien
                            FROM 
                                t_hasil
                                    JOIN t_penyakit ON t_hasil.hasil_id = t_penyakit.kode_penyakit
									JOIN t_daftar ON t_hasil.kd_daftar = t_daftar.kd_daftar";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                echo "
                                <tr>
                                     <td style= text-align:center>$no</td>
                                     <td style= text-align:center>$ddatagrid[tanggal]</td>
                                     <td style= text-align:center>$ddatagrid[nm_pasien]</td>
                                     <td style= text-align:center>$ddatagrid[nm_penyakit]</td>
                                     <td style= text-align:center>$ddatagrid[nilai_cf]</td>
                                     <td style=text-align:center>
                                         <a href=?unit=konsultasi_unit&act=update&kd_hasil=$ddatagrid[kd_hasil] class='btn btn-sm btn-info glyphicon glyphicon-eye-open' > Detail</a> 
                                         <a href=?unit=konsultasi_unit&act=delete&kd_hasil=$ddatagrid[kd_hasil] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'> Hapus</a>    
                                     </td>                
                                </tr>
                                ";
                                $no++;
                             }
                             ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

		<?php
            include("../admin/footer.php");
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
    
        case "input":
            ?>

<?php
include("../admin/leftbar.php");
?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Beranda</a>
							</li>
              <li>Data Transaksi</li>
							<li>Tambah Data Konsultasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Konsultasi</h1></div>
						<div class="row">
							<div class="col-xs-12">
                              
                                           
             <form class="form-horizontal" name="tambah_subkat" id="tambah_subkat" method="post" action="?unit=konsultasi_unit&act=inputact" enctype="multipart/form-data">
                 


				  <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_penyakit">Penyakit</label>
                     <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_penyakit" id="kd_penyakit" required>
                        <option selected="selected">-Pilih Penyakit-</option>
                      <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_penyakit
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$dcombo[kd_penyakit]>$dcombo[nm_penyakit]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>
                
              
				  <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_gejala">Gejala</label>
                     <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_gejala" id="kd_gejala" required>
                        <option selected="selected">-Pilih Gejala-</option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_gejala
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$dcombo[kd_gejala]>$dcombo[nm_gejala]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>
                                                           
                        <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="mb">MB</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="mb" id="mb" required    />
                       </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="md">DM</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="md" id="md" required    />
                       </div>
                       </div>
					   
                  <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                         <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=konsultasi_unit&act=datagrid'">kembali</button>
                         </div>
			</div> 
       
                 </form>
             

                   
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
                
			</div><!-- /.main-content -->
		<?php
            include("../admin/footer.php");
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
       $qupdate = "SELECT max(kd_hasil) as maxKode FROM t_diagnosa";
                $rupdate = mysqli_query($mysqli, $qupdate);
                $dupdate = mysqli_fetch_assoc($rupdate);
                $subkode_kategori = $dupdate['maxKode'];
                $no_urut = (int) substr($subkode_kategori, 3, 3);
                $no_urut++;
                $newID = $char.sprintf("%03s",$no_urut);  
                $new = $_POST['kd_penyakit'].sprintf($newID);
            $namasubkategori = $_POST['namasubkategori'];
            $kd_penyakit = $_POST['kd_penyakit'];
             $qinput = 
        "
        INSERT INTO t_diagnosa
        (kd_hasil,kd_penyakit,namasubkategori)
        VALUES ('$new','$kd_penyakit','$namasubkategori')";
         	
         $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_diagnosa WHERE namasubkategori = '$namasubkategori'"));
        
        if ($cek > 0) {
          echo "<script> alert('Data SubKategori Sudah Ada');
              document.location='adminmainapp.php?unit=konsultasi_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=konsultasi_unit&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
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
<?php
include("../admin/leftbar.php");
?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Beranda</a>
							</li>
              <li>Data Transaksi</li>
							<li>Data Hasil Konsultasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Data Hasil Konsultasi<small> <?php echo $dupdate['nm_pasien']; ?> Pada Tanggal <?php echo $dupdate['tanggal']; ?></h1>
						</div>
						
						<div class="row">
							<div class="col-xs-12">
                                                            
                   <div class="widget-box widget-color-red" id="widget-box-2">
				   												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class=""></i>
														Gejala Yang Dipilih
													</h5>

											</div>
												<div class="widget-body">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover">
															<thead class="thin-border-bottom">
																
                          <tr>
                            <th style="width:100px;  text-align: center">No.</th>
                            <th style="width:100px; text-align: center">Kode Gejala</th>
                            <th style="text-align: center">Nama Gejala</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php  
						 
						$ig = 0;
						foreach ($argejala as $key => $value) {
						$kondisi = $value;
						$ig++;
						$gejala = $key;
                        $qdatagrid =" SELECT * FROM t_gejala where kode_gejala = '$key'";
                        $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                        $ddatagrid=mysqli_fetch_array($rdatagrid);
							echo '<tr><td class=center>' . $ig . '</td>';
							echo "<td class=center> $ddatagrid[kd_gejala]</td>";
							echo "<td> $ddatagrid[nm_gejala]</td>";
  
						}
                             ?>
							             
                                </tr>
								
                        </tbody>
														</table>
													</div>
												</div>
											</div>
											
											<div class="page-header"></div>
											 <div class="widget-box widget-color-red" id="widget-box-2">
				   												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class=""></i>
														Hasil Konsultasi Penyakit
													</h5>

											</div>
												<div class="widget-body">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover">
															<thead class="thin-border-bottom">
																<tr>
                            <th style="width:100px; text-align: center">No.</th>
                            <th style="width:100px; text-align: center">Kode</th>
                            <th style="text-align: center">Penyakit</th>
                            <th style="text-align: center">Nilai CF</th>
                          </tr>
                        </thead>
                        <tbody>
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
							echo '<tr><td class=center>' . $np . '</td>';
                            echo "<td class=center > $ddatagrid[kd_penyakit]</td>";
                            echo "<td class=opsi > $ddatagrid[nm_penyakit]</td>";
							echo '<td class=center >' . $vlpkt[$ipl] . '</td>';
							
						 }
						
                             ?>
							             
                                
								
                        </tbody>
														</table>
													</div>
												</div>
											</div>
											
											
											<div class="page-header"></div>
											<h5>Hasil Diagnosa</h5>
											<h6>Hasil Dari Diagnosa Penyakit Yang Paling Mungkin adalah : <?php echo $dupdate['nm_penyakit']; ?></h6>
													
												<div class="widget-body">
													<div class="widget-main">
														
														
														<p class="alert alert-info">
															Penanganan	: <?php echo $dupdate['penanganan']; ; ?>
														</p>
														
													</div>
												</div>
											<div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                         <a href="adminmainapp.php?unit=l_konsultasi_d&kd_hasil=<?php echo $kd_hasil; ?>" class='btn btn-sm btn-danger glyphicon glyphicon-print' > Print</a> 
						 <a href="adminmainapp.php?unit=konsultasi_unit&act=datagrid" class='btn btn-sm btn-info glyphicon' >Kembali</a> <br><br><br>
                         </div>
			</div> 

       
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
                
			</div><!-- /.main-content -->
		<?php
            include("../admin/footer.php");
            ?>
	</body>
</html>

  <?php
        break;
    
            case "updateact":
                $kd_hasil = $_POST['kd_hasil'];
                 $kd_penyakit = $_POST['kd_penyakit'];
            $namasubkategori = $_POST['namasubkategori'];
             $qinput = 
        
       "
                UPDATE t_diagnosa SET
                namasubkategori= '$namasubkategori',			
                kd_penyakit = '$kd_penyakit'
               
                WHERE
                kd_hasil = '$kd_hasil'";			
         $rinput = mysqli_query($mysqli,$qinput);
         	
        header("location:?unit=konsultasi_unit&act=datagrid");     
                 break;
    
        case "delete":
               $kd_hasil = $_GET['kd_hasil'];
        $qdelete = "
          DELETE  FROM t_diagnosa
       
          WHERE
            kd_hasil = '$kd_hasil'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=konsultasi_unit&act=datagrid");
             break;
}
            
            