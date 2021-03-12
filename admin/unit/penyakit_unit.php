<?php
session_start();
require_once '../lib/koneksi.php';

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
                    <a href="adminmainapp.php?unit=dashboard">Dashboard</a>
                </li>
                <li>Data Master</li>
		<li>Data Penyakit</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content ">
            <div class="page-header pull-left">
                <h1>Data Penyakit
                </h1>
            </div>
			 <div class="page-header pull-right">
                 <h1>
                    <a href="?unit=penyakit_unit&act=input">
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
                                        <th style="text-align: center">Kode Penyakit</th>
                                        <th style="text-align: center">Nama Penyakit</th>
                                        <th style="text-align: center">Penanganan</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_penyakit ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
									if (strlen($ddatagrid[penanganan]) > 150)
										{
											$maxLength = 140;
											$ddatagrid[penanganan] = substr($ddatagrid[penanganan], 0, $maxLength);
											}
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:center>$ddatagrid[kd_penyakit]</td>
                                             <td style= text-align:left  >$ddatagrid[nm_penyakit]</td>
                                             <td style= text-align:left  >$ddatagrid[penanganan]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=penyakit_unit&act=update&kd_penyakit=$ddatagrid[kd_penyakit] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=penyakit_unit&act=delete&kd_penyakit=$ddatagrid[kd_penyakit] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
              <li>Data Master</li>
							<li>Tambah Data Penyakit</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Penyakit</h1></div>
						<div class="row">
							<div class="col-xs-12">
 
                 <?php
				$mysqli= mysqli_connect("localhost","root","","db_hati");
                $qupdate = "SELECT max(kode_penyakit) as maxKode FROM t_penyakit";
                $rupdate = mysqli_query($mysqli, $qupdate);
                $dupdate = mysqli_fetch_assoc($rupdate);
                $kd_penyakit = $dupdate['maxKode'];
                $no_urut = $kd_penyakit + 2;
                $char = "P";
                $newID = $char.sprintf("%01s",$no_urut);

                    ?>
                                      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=penyakit_unit&act=inputact" enctype="multipart/form-data" >    
                      
                       
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Penyakit</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_penyakit" id="kd_penyakit" required="required" value="<?php echo "$newID"; ?>" readonly="" />
                            </div>
                       </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Penyakit</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nm_penyakit" id="nm_penyakit" required="required" autofocus="autofocus" />
                            </div>
                       </div>
					   
					   <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="penanganan">Penanganan</label>	
                   <div class="col-sm-9">
                   <textarea class="form-control limited" name="penanganan" id="penanganan"> </textarea>	
                    </div>
                       </div>
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=penyakit_unit&act=datagrid'">kembali</button>
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
 
 var frmvalidator = new Validator("tambah_kat");
 frmvalidator.addValidation("nm_penyakit","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("nm_penyakit","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("nm_penyakit","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("nm_penyakit","simbol","Hanya Huruf Saja");
   frmvalidator.addValidation("penanganan","req","Silakan Masukkan penanganan");
</script>    
	</body>
</html>
<?php
        break;
    
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
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=penyakit_unit&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_penyakit = $_GET['kd_penyakit'];
        $qupdate = "SELECT * FROM t_penyakit WHERE kd_penyakit = '$kd_penyakit'";
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
              <li>Data Master</li>
							<li>Edit Data Penyakit</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Penyakit</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=penyakit_unit&act=updateact">    
                      
                        <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Penyakit</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_penyakit" id="kd_penyakit" required="required" value="<?php echo $dupdate['kd_penyakit'] ?>" readonly="readonly" />
                            </div>
                       </div>   
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Penyakit</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nm_penyakit" id="nm_penyakit" required="required" value="<?php echo $dupdate['nm_penyakit'] ?>"  autofocus="autofocus" />
                            </div>
                       </div>
					   
					   					   
					   
					   <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="penanganan">Penanganan</label>
                   <div class="col-sm-9">
                   <textarea class="form-control limited" name="penanganan" id="penanganan"><?php echo $dupdate['penanganan'] ?> </textarea>	
                    </div>
                       </div>
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=penyakit_unit&act=datagrid'">kembali</button>
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
 var frmvalidator = new Validator("tambah_kat");
 frmvalidator.addValidation("nm_penyakit","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("nm_penyakit","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("nm_penyakit","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("nm_penyakit","simbol","Hanya Huruf Saja");
 frmvalidator.addValidation("penanganan","req","Silakan Masukkan penanganan");
</script>
	</body>
</html>
 <?php
        break;
    
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