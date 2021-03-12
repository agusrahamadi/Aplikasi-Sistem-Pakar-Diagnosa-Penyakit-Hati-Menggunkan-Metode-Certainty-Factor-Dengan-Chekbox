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
		<li>Data Informasi</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header pull-left">
                <h1>Data Informasi
                </h1>
				
            </div>
			 <div class="page-header pull-right">
                 <h1>
                    <a href="?unit=tentangpenyakit_unit&act=input">
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
                                        <th style="text-align: center">Nama Penyakit</th>
                                        <th style="text-align: center">Detail</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_tentangpenyakit ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										if (strlen($ddatagrid[det_tentangpenyakit]) > 150)
										{
											$maxLength = 140;
											$ddatagrid[det_tentangpenyakit] = substr($ddatagrid[det_tentangpenyakit], 0, $maxLength);
											}
										
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[nm_tentangpenyakit]</td>
                                             <td style= text-align:left  >$ddatagrid[det_tentangpenyakit]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=tentangpenyakit_unit&act=update&kd_tentangpenyakit=$ddatagrid[kd_tentangpenyakit] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=tentangpenyakit_unit&act=delete&kd_tentangpenyakit=$ddatagrid[kd_tentangpenyakit] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
							<li>Tambah Data Informasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Informasi</h1></div>
						<div class="row">
							<div class="col-xs-12">
 
                                      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=tentangpenyakit_unit&act=inputact" enctype="multipart/form-data" >    
                      
                       
					
                      <div class="form-group">
                          <label  >Nama Penyakit :</label>
                            <div >
                                <input class="col-xs-10 col-sm-5" type="text" name="nm_tentangpenyakit" id="nm_tentangpenyakit" required="required" autofocus="autofocus" />
                            </div>
                       </div>
					   
					    <div class="form-group">
                          <label for="gambar">Gambar :</label>
                            <div >
                                <input type="file" name="gambar" id="gambar" accept="image/*" />	  
							</div>
                       </div>  
					   
					   
					   <div class="form-group">
                   <label for="det_tentangpenyakit">Detail Penyakit :</label>	
                   <div >
                   <textarea class="form-control limited" name="det_tentangpenyakit" id="det_tentangpenyakit"> </textarea>	
                    </div>
                       </div>
					   
					 
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=tentangpenyakit_unit&act=datagrid'">kembali</button>
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
 

  tinymce.init({
        selector: "textarea",

        // ===========================================
        // INCLUDE THE PLUGIN
        // ===========================================

        plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table contextmenu paste jbimages"
        ],

        // ===========================================
        // PUT PLUGIN'S BUTTON on the toolbar
        // ===========================================

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

        // ===========================================
        // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
        // ===========================================

        relative_urls: false,
        remove_script_host : false,
        convert_urls : true,

      });
	  
 var frmvalidator = new Validator("tambah_kat");
 frmvalidator.addValidation("nm_tentangpenyakit","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("nm_tentangpenyakit","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("nm_tentangpenyakit","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("nm_tentangpenyakit","simbol","Hanya Huruf Saja");
   
</script>    
	</body>
</html>
<?php
        break;
    
        case "inputact":
      
			 $nm_tentangpenyakit = $_POST['nm_tentangpenyakit'];
			 $det_tentangpenyakit = $_POST['det_tentangpenyakit'];
			  // menyimpan lokasi path file di variabel
            $lokasigambar = $_FILES['gambar']['tmp_name'];
            // menyimpan nama file di variabel
            $namagambar   = $_FILES['gambar']['name'];
			
             $qinput = "
          INSERT INTO t_tentangpenyakit
          ( nm_tentangpenyakit, det_tentangpenyakit, gambar)
          VALUES
          ('$nm_tentangpenyakit', '$det_tentangpenyakit', '$namagambar')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_tentangpenyakit WHERE nm_tentangpenyakit = '$nm_tentangpenyakit'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama Penyakit Sudah Ada');
              document.location='adminmainapp.php?unit=tentangpenyakit_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=tentangpenyakit_unit&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_tentangpenyakit = $_GET['kd_tentangpenyakit'];
        $qupdate = "SELECT * FROM t_tentangpenyakit WHERE kd_tentangpenyakit = '$kd_tentangpenyakit'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
		if ($dupdate[gambar]) {
            $gambar = '../gambar/' . $dupdate[gambar];
        } else {
            $gambar = '../gambar/noimage.png';
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
              <li>Data Master</li>
							<li>Edit Data Informasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Informasi</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=tentangpenyakit_unit&act=updateact">    
                      
                        <div class="form-group">
                          <label  >Kode Penyakit :</label>
                            <div >
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_tentangpenyakit" id="kd_tentangpenyakit" required="required" value="<?php echo $dupdate['kd_tentangpenyakit'] ?>" readonly="readonly" />
                            </div>
                       </div>   
                      <div class="form-group">
                          <label  >Nama Penyakit :</label>
                            <div >
                                <input class="col-xs-10 col-sm-5" type="text" name="nm_tentangpenyakit" id="nm_tentangpenyakit" required="required" value="<?php echo $dupdate['nm_tentangpenyakit'] ?>"  autofocus="autofocus" />
                            </div>
                       </div>
					   
					   <div class="form-group">
                          <label for="gambar">Gambar :</label>
                            <div >
                                <input type="file" name="gambar" id="gambar" accept="image/*" />	
                             <img id='preview' src='<?php echo $gambar ?>' width=200>
							
							</div>
                       </div>  
					   
					   <div class="form-group">
                   <label>Detail  Tentang Penyakit :</label>	
                   <div >
                   <textarea class="form-control limited" name="det_tentangpenyakit" id="det_tentangpenyakit"><?php echo $dupdate['det_tentangpenyakit'] ?> </textarea>	
                    </div>
                       </div>
					   
					 
					   
					   
					 
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=tentangpenyakit_unit&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("nm_tentangpenyakit","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("nm_tentangpenyakit","maxlen=35","Maksimal Karakter Nama 35 digit");
 
   tinymce.init({
        selector: "textarea",

        // ===========================================
        // INCLUDE THE PLUGIN
        // ===========================================

        plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table contextmenu paste jbimages"
        ],

        // ===========================================
        // PUT PLUGIN'S BUTTON on the toolbar
        // ===========================================

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

        // ===========================================
        // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
        // ===========================================

        relative_urls: false,
        remove_script_host : false,
        convert_urls : true,

      });
</script>
	</body>
</html>
 <?php
        break;
    
            case "updateact":
             $kd_tentangpenyakit = $_POST['kd_tentangpenyakit'];
			 $nm_tentangpenyakit = $_POST['nm_tentangpenyakit'];
			 $det_tentangpenyakit = $_POST['det_tentangpenyakit'];
        $qupdate = "
          UPDATE t_tentangpenyakit SET
            nm_tentangpenyakit = '$nm_tentangpenyakit',
			det_tentangpenyakit = '$det_tentangpenyakit'
			WHERE
            kd_tentangpenyakit = '$kd_tentangpenyakit'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=tentangpenyakit_unit&act=datagrid");
                 break;
    
        case "delete":
              $kd_tentangpenyakit = $_GET['kd_tentangpenyakit'];
        $qdelete = "
          DELETE  FROM t_tentangpenyakit
       
          WHERE
            kd_tentangpenyakit = '$kd_tentangpenyakit'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=tentangpenyakit_unit&act=datagrid");
        break;
}