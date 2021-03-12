<?php

require_once '../lib/koneksi.php';
$act = $_GET['act'];
switch($act){
    
         case "update":
        $qupdate = "SELECT * FROM  t_admin";
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
              <li>Ganti Kata Sandi</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header"><h1>Ganti Kata Sandi</h1></div>
            <div class="row">
              <div class="col-xs-12">
                                                            
<form class="form-horizontal" method="post" action="?unit=gantisandi&act=updateact" enctype="multipart/form-data" >
                   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Pengguna</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="username" id="username" required="required"  value="<?php echo $dupdate['username'] ?>"  />
                            </div>
                       </div>
					   
					    <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kata Sandi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="password" name="password" id="password" required="required"  value="<?php echo $dupdate['password'] ?>"  />
                            </div>
                       </div>
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
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
         $kd_admin = '1';
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $qupdate = "";
        if($password == "") {
            $qupdate = "
              UPDATE t_admin SET
                username = '$username' 
              WHERE
                kd_admin = '$kd_admin'
            ";            
        }
        else {
            $password = md5($password);
            $qupdate = "
              UPDATE t_admin SET
                username = '$username',
                password = '$password'   
              WHERE
                kd_admin = '$kd_admin'
            ";                        
        }
  $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_admin WHERE username = '$username'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama pengguna Sama');
              document.location='adminmainapp.php?unit=m_guru&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qupdate);
          echo "<script> alert('Kata Sandi Telah diganti');
              document.location='adminmainapp.php?unit=gantisandi&act=datagrid&act=update&userid=1';
              </script>";
          exit();
         }
       
    

}