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
							<li>Data Basis Pengetahuan</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header pull-left">
							<h1>Data Basis Pengetahuan</h1>
						</div>
						<div class="page-header pull-right">
							<h1>
								<a href="?unit=dbp_unit&act=input">
              		<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
            		</a>
							</h1>
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
                            <th style="text-align: center">Penyakit</th>
                            <th style="text-align: center">Gejala</th>
                            <th style="text-align: center">MB</th>
                            <th style="text-align: center">MD</th>
                            <th style="text-align: center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $no=1; 
                          $qdatagrid ="  SELECT 
                           t_diagnosa.kd_diagnosa, t_diagnosa.mb, t_diagnosa.md, 
						   t_penyakit.kode_penyakit, t_penyakit.nm_penyakit,
						   t_gejala.kode_gejala, t_gejala.nm_gejala
                            FROM 
                                t_diagnosa
                                    JOIN t_penyakit ON t_diagnosa.kode_penyakit = t_penyakit.kode_penyakit
									JOIN t_gejala ON t_diagnosa.kode_gejala = t_gejala.kode_gejala";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                echo "
                                <tr>
                                     <td style= text-align:center>$no</td>
                                     <td style= text-align:left>$ddatagrid[nm_penyakit]</td>
                                     <td style= text-align:left>$ddatagrid[nm_gejala]</td>
                                     <td style= text-align:center>$ddatagrid[mb]</td>
                                     <td style= text-align:center>$ddatagrid[md]</td>
                                     <td style=text-align:center>
                                         <a href=?unit=dbp_unit&act=update&kd_diagnosa=$ddatagrid[kd_diagnosa] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                         <a href=?unit=dbp_unit&act=delete&kd_diagnosa=$ddatagrid[kd_diagnosa] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
							<li>Tambah Data Basis Pengetahuan</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Basis Pengetahuan</h1></div>
						<div class="row">
							<div class="col-xs-12">
                              
                          
             <form class="form-horizontal" name="tambah_subkat" id="tambah_subkat" method="post" action="?unit=dbp_unit&act=inputact" enctype="multipart/form-data">
                 
				

				  <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kode_penyakit">Penyakit</label>
                     <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kode_penyakit" id="kode_penyakit" required>
                        <option selected="selected">-Pilih Penyakit-</option>
                      <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_penyakit
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$dcombo[kode_penyakit]>$dcombo[nm_penyakit]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>
                
              
				  <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kode_gejala">Gejala</label>
                     <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kode_gejala" id="kode_gejala" required>
                        <option selected="selected">-Pilih Gejala-</option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_gejala
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$dcombo[kode_gejala]>$dcombo[nm_gejala]</option> 
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
                      <label class="col-sm-3 control-label no-padding-right"for="md">MD</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="md" id="md" required    />
                       </div>
                       </div>
					   
                  <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                         <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=dbp_unit&act=datagrid'">kembali</button>
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
 
 frmvalidator.addValidation("kode_penyakit","req","Silakan Pilih kategori");
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
			
             $kode_penyakit = $_POST['kode_penyakit'];
             $kode_gejala = $_POST['kode_gejala'];
             $mb = $_POST['mb'];
             $md = $_POST['md'];
             $qinput = "
          INSERT INTO t_diagnosa
          ( kode_penyakit, kode_gejala, mb, md)
          VALUES
          ('$kode_penyakit', '$kode_gejala', '$mb', '$md')
        ";
       
         $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_diagnosa WHERE kode_penyakit = '$kode_penyakit' and kode_gejala = '$kode_gejala'"));
        
        if ($cek > 0) {
          echo "<script> alert('Penyakit dengan gejala tersebut sudah ada');
              document.location='adminmainapp.php?unit=dbp_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=dbp_unit&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_diagnosa = $_GET['kd_diagnosa'];
        $qupdate = "SELECT * FROM t_diagnosa WHERE kd_diagnosa = '$kd_diagnosa'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
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
							<li>Edit Data Basis Pengetahuan</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Basis Pengetahuan</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                            
             <form class="form-horizontal" name="tambah_subkat" id="tambah_subkat" method="post" action="?unit=dbp_unit&act=updateact" enctype="multipart/form-data">
                 

<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Data Basis Pengetahuan</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_diagnosa" id="kd_diagnosa" required="required" value="<?php echo $dupdate['kd_diagnosa'] ?>"  readonly="" />
                            </div>
                       </div>
				  <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kode_penyakit">Penyakit</label>
                     <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kode_penyakit" id="kode_penyakit" required>
                         <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_penyakit
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kode_penyakit'] == $dupdate['kode_penyakit']) {
                                echo "
                                <option value=$dcombo[kode_penyakit] selected=selected>$dcombo[nm_penyakit]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kode_penyakit]>$dcombo[nm_penyakit]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>
                
              
				  <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kode_gejala">Gejala</label>
                     <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kode_gejala" id="kode_gejala" required>
                                         <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_gejala
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kode_gejala'] == $dupdate['kode_gejala']) {
                                echo "
                                <option value=$dcombo[kode_gejala] selected=selected>$dcombo[nm_gejala]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kode_gejala]>$dcombo[nm_gejala]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>
                                                           
                        <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="mb">MB</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="mb" id="mb" value="<?php echo $dupdate['mb'] ?>" required    />
                       </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="md">MD</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="md" id="md" value="<?php echo $dupdate['md'] ?>" required    />
                       </div>
                       </div>
					   
                  <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                         <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=dbp_unit&act=datagrid'">kembali</button>
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
	</body>
</html>

  <?php
        break;
    
            case "updateact":
			$kd_diagnosa = $_POST['kd_diagnosa'];
                 $kode_penyakit = $_POST['kode_penyakit'];
             $kode_gejala = $_POST['kode_gejala'];
             $mb = $_POST['mb'];
             $md = $_POST['md'];
             $qinput = 
        
       "
                UPDATE t_diagnosa SET
                kode_penyakit= '$kode_penyakit',			
                kode_gejala = '$kode_gejala',
				mb = '$mb',
				md = '$md'
                WHERE
                kd_diagnosa = '$kd_diagnosa'";			
         $rinput = mysqli_query($mysqli,$qinput);
         	
        header("location:?unit=dbp_unit&act=datagrid");     
                 break;
    
        case "delete":
               $kd_diagnosa = $_GET['kd_diagnosa'];
        $qdelete = "
          DELETE  FROM t_diagnosa
       
          WHERE
            kd_diagnosa = '$kd_diagnosa'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=dbp_unit&act=datagrid");
             break;
}
            
            