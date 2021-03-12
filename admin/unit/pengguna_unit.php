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
              <li>Pengguna</li>
							<li>Data Pengguna</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"> 
              <h1>Data Pengguna
              </h1>
            </div>
                <h1>
                <a href="?unit=pengguna_unit&act=input">
                  <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                </a>
              </h1>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
                  <div class="box box-primary">
                    <div class="box-body table-responsive padding">
                      
                      <table id="datatable" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">nama</th>
                            <th style="text-align: center">nama pengguna</th>
                            <th style="text-align: center">katasandi</th>
                            <th style="text-align: center">Jenis Kelamin</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; 
                          $qdatagrid =" SELECT * FROM t_login WHERE status ='pengguna' ";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                              $st="";
                            if($ddatagrid['blokir']=='N')
                            {
                                    $st= '<span class="label label-info">Aktif</span>';
                            }
                            else if ($ddatagrid['blokir']=='Y')
                            {
                                    $st= '<span class="label label-danger">Blokir</span>';
                            }
                            else if($ddatagrid['blokir']=='A')
                            {
                                    $st='<span class="label label-warning">Menunggu</span>';
                            }
                                echo "
                                <tr>
                                     <td style= text-align:center >$no</td>
                                     <td style= text-align:left  >$ddatagrid[nama]</td>
									 
                                        <td style= text-align:center>$ddatagrid[nm_pengguna]</td>
                                        <td style= text-align:center>$ddatagrid[katasandi]</td>
                                        <td style= text-align:center>$ddatagrid[jk]</td>
                                        <td style= text-align:center>$ddatagrid[email]</td>
										
                                      <td style= text-align:center>$ddatagrid[status]</td>
                                      
                                     <td style=text-align:center>
                                         <a href=?unit=pengguna_unit&act=update&kd_login=$ddatagrid[kd_login] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                         <a href=?unit=pengguna_unit&act=delete&kd_login=$ddatagrid[kd_login] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
              <li>Pengguna</li>
							<li>Tambah Data Pengguna</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Pengguna</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
<form class="form-horizontal" method="post" action="?unit=pengguna_unit&act=inputact" enctype="multipart/form-data" >
                  
                                                                             
                        <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="nama">Nama</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="nama" id="nama" required    />
                       </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="nm_pengguna">Nama Pengguna</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="nm_pengguna" id="nm_pengguna" required    />
                       </div>
                       </div>
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="katasandi">Kata Sandi</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="katasandi" id="katasandi" required    />
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
                      <label class="col-sm-3 control-label no-padding-right"for="email">Email</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="email" name="email" id="email" required    />
                       </div>
                       </div>
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="status">Status</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="status" id="status" value="Pengguna" readonly="readonly" required    />
                       </div>
                       </div>
					   
                  <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                  <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=pengguna_unit&act=datagrid'">kembali</button>
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
            <script src="../css/backend/js/jquery.validate.min.js"></script>
	</body>
</html>
<?php
        break;
    
        case "inputact":
          $nm_pengguna = $_POST['nm_pengguna'];
          $nama = $_POST['nama'];
        $katasandi = md5($_POST['katasandi']);
        $jk = $_POST['jk'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $qinput = "
          INSERT INTO t_login
          (
            nm_pengguna,
            nama,
            katasandi,
            jk,
            email,
            status
          )
          VALUES
          (
            '$nm_pengguna',
            '$nama',
            '$katasandi',
            '$jk',
            '$email',
            '$status'
          )
        ";
        
         $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_login WHERE nm_pengguna = '$nm_pengguna'"));
        
        if (!preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU',$_POST['email'])) {
          echo "<script> alert('Perbaiki Email Anda');
              document.location='adminmainapp.php?unit=pengguna_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=pengguna_unit&act=datagrid';
              </script>";
          exit();
         }
        break;    
    
        case "update":
            $kd_login = $_GET['kd_login'];
        $qupdate = "SELECT * FROM  t_login WHERE kd_login = '$kd_login'";
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
              <li>Pengguna</li>
							<li>Edit Data Pengguna</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Pengguna</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
<form class="form-horizontal" method="post" action="?unit=pengguna_unit&act=updateact" enctype="multipart/form-data" >
                   <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="Kd_login">Kode Pengguna</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="Kd_login" id="Kd_login" readonly="readonly" value="<?php echo $dupdate['kd_login'] ?>"  required    />
                       </div>
                       </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="nama">Nama</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="nama" id="nama" value="<?php echo $dupdate['nama'] ?>"  required    />
                       </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="nm_pengguna">Nama Pengguna</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="nm_pengguna" id="nm_pengguna" value="<?php echo $dupdate['nm_pengguna'] ?>" required    />
                       </div>
                       </div>
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="katasandi">Kata Sandi</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="katasandi" id="katasandi" value="<?php echo $dupdate['katasandi'] ?>"  required    />
                       </div>
                       </div>
					   <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="jk">Jenis Kelamin</label>
                     <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="jk" id="jk" required>
                                         <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_login
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kd_login'] == $dupdate['kd_login']) {
                                echo "
                                <option value=$dcombo[kd_login] selected=selected>$dcombo[jk]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kd_login]>$dcombo[jk]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>
					   <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="email">Email</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="email" id="email" value="<?php echo $dupdate['email'] ?>" required    />
                       </div>
                       </div>
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="status">Status</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="status" id="status" value="Pengguna" readonly="readonly" required    />
                       </div>
                       </div>
                    
                 <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                  <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=pengguna_unit&act=datagrid'">kembali</button>
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
        $kd_login = $_GET['kd_login'];
        $nm_pengguna = $_POST['nm_pengguna'];
        $nama = $_POST['nama'];
        $katasandi = md5($_POST['katasandi']);
        $jk = $_POST['jk'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        
        $qupdate = "";
        if($katasandi == "") {
            $qupdate = "
              UPDATE t_login SET
                nm_pengguna = '$nm_pengguna',
                nama = '$nama', 
                jk = '$jk',
                email = '$email',    
                status = '$status'        
              WHERE
                kd_login = '$kd_login'
            ";            
        }
        else {
            $katasandi = md5($katasandi);
            $qupdate = "
              UPDATE t_login SET
                nm_pengguna = '$nm_pengguna',
                 nama = '$nama',
                katasandi = '$katasandi',    
                 jk = '$jk',
                email = '$email',    
                status = '$status'        
              WHERE
                kd_login = '$kd_login'
            ";                        
        }

        $rupdate = mysqli_query($mysqli,$qupdate);
        //echo $qupdate . '<br />';
        header("location:?unit=pengguna_unit&act=datagrid");      
        break;  
    
        case "delete":
        $kd_login = $_GET['kd_login'];
        $qdelete = "
          DELETE  FROM t_login 
       
          WHERE
            kd_login = '$kd_login'
        ";
        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=pengguna_unit&act=datagrid");
            break;

case "aktif":
      $kd_login = $_GET['kd_login'];
                $blokir = $_POST['blokir'];
        $qupdate = "
          UPDATE t_login SET
            blokir = 'N',
            bataslogin = '0' 
     
          WHERE
            kd_login = '$kd_login' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=pengguna_unit&act=datagrid");


        break;
    case "blokir":
      $kd_login = $_GET['kd_login'];
                $blokir = $_POST['blokir'];
        $qupdate = "
          UPDATE t_login SET
            blokir = 'Y' 
     
          WHERE
            kd_login = '$kd_login' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=pengguna_unit&act=datagrid");


        break;
}