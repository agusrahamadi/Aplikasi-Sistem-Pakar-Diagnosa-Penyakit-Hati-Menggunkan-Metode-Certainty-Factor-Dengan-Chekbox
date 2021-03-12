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
                <li>Data Master</li>
		<li>Data Gejala</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
             <div class="page-header pull-left">
                <h1>Data Gejala
                </h1>
				
            </div>
			 <div class="page-header pull-right">
                 <h1>
                    <a href="?unit=gejala_unit&act=input">
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

                                        <th style="text-align: center">Kode Gejala</th>
                                        <th style="text-align: center">Nama Gejala</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_gejala ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:center  >$ddatagrid[kd_gejala]</td>
                                             <td style= text-align:left  >$ddatagrid[nm_gejala]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=gejala_unit&act=update&kd_gejala=$ddatagrid[kd_gejala] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=gejala_unit&act=delete&kd_gejala=$ddatagrid[kd_gejala] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
							<li>Tambah Data Gejala</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Gejala</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 <?php
				$mysqli= mysqli_connect("localhost","root","","db_hati");
                $qupdate = "SELECT max(kode_gejala) as maxKode FROM t_gejala";
                $rupdate = mysqli_query($mysqli, $qupdate);
                $dupdate = mysqli_fetch_assoc($rupdate);
                $kd_gejala = $dupdate['maxKode'];
                $no_urut = $kd_gejala + 1;
                $char = "G";
                $newID = $char.sprintf("%01s",$no_urut);

                    ?>
                                  
                  <form class="form-horizontal" id="tambah_brand" name="tambah_brand" method="post" action="?unit=gejala_unit&act=inputact" enctype="multipart/form-data"  >    
                      
                       
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Gejala</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_gejala" id="kd_gejala" required="required" value="<?php echo "$newID"; ?>" readonly="" />
                            </div>
                       </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Gejala</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nm_gejala" id="nm_gejala" required="required" autofocus="autofocus" />
                            </div>
                       </div>
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=gejala_unit&act=datagrid'">kembali</button>
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
    
        case "inputact":
			$kd_gejala = $_POST['kd_gejala'];
             $nm_gejala = $_POST['nm_gejala'];
             $qinput = "
          INSERT INTO t_gejala
          (kd_gejala, nm_gejala)
          VALUES
          ('$kd_gejala', '$nm_gejala')
        ";
       
         $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_gejala WHERE nm_gejala = '$nm_gejala'"));
        
        if ($cek > 0) {
          echo "<script> alert('Data Gejala Sudah Ada');
              document.location='adminmainapp.php?unit=gejala_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=gejala_unit&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_gejala = $_GET['kd_gejala'];
        $qupdate = "SELECT * FROM t_gejala WHERE kd_gejala = '$kd_gejala'";
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
							<li>Edit Data Gejala</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Gejala</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 <form class="form-horizontal" id="tambah_brand" nama="tambah_brand"  method="post" action="adminmainapp.php?unit=gejala_unit&act=updateact" enctype="multipart/form-data"  >    
                      
                       
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Gejala</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_gejala" id="kd_gejala" required="required" value="<?php echo $dupdate['kd_gejala'] ?>"  readonly="" />
                            </div>
                       </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Gejala</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nm_gejala" id="nm_gejala" required="required" value="<?php echo $dupdate['nm_gejala'] ?>" autofocus="autofocus" />
                            </div>
                       </div>
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=gejala_unit&act=datagrid'">kembali</button>
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
 var frmvalidator = new Validator("tambah_brand");
 frmvalidator.addValidation("nm_gejala","req","Silakan Masukkan Nama Kategori");
 frmvalidator.addValidation("nm_gejala","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("nm_gejala","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("nm_gejala","simbol","Hanya Huruf Saja");
</script>
	</body>
</html>
 <?php
        break;
    
            case "updateact":
                $kd_gejala = $_POST['kd_gejala'];
        $nm_gejala = $_POST['nm_gejala'];
        $qupdate = "
          UPDATE t_gejala SET
            nm_gejala = '$nm_gejala'
          WHERE
            kd_gejala = '$kd_gejala'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=gejala_unit&act=datagrid");
                 break;
    
        case "delete":
              $kd_gejala = $_GET['kd_gejala'];
        $qdelete = "
          DELETE  FROM t_gejala
       
          WHERE
            kd_gejala = '$kd_gejala'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=gejala_unit&act=datagrid");
        break;
}