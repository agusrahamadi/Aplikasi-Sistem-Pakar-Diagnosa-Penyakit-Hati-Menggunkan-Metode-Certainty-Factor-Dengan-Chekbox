<?php
session_start();
 
if (!empty($_SESSION['username'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Form Login User</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
		
        <link href="../css/prettyPhoto.css" rel="stylesheet">
        <link href="../css/price-range.css" rel="stylesheet">
        <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
		
	    <script language="javascript">
              function validasi(form) {
                if (form.username.value == "" && form.password.value == "") {
                alert("Silakan Masukan username Dan Password Anda");
                form.user.focus();
                return(false);
              }
                if (form.username.value == "") {
                alert("Silakan Masukan username Anda");
                form.user.focus();
                return(false);
              }
                if (form.password.value == "") {
                alert("Silakan Masukan Password Anda");
                form.pass.focus();
                return(false);
              }       
                return(true);
              }
        </script> 	
		
    </head>
	
    <body>
	
       <section id="form"><!--form-->
	   
    <div class="container">
	
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
			
                <div class="login-form"><!--login form-->
                    <h2 class="text-center">APLIKASI <br><small><h2 >Sistem Pakar Diagnosa Penyakit Hati Menggunkan Metode Certainty </h2></small></h2>
                    <form method="post" action="loginnaction.php" onsubmit="return validasi(this)">
                        <input type="text" name="username" id="username" placeholder="Nama Pengguna" autofocus="autofocus" />
                        <input type="password" name="password" id="password" placeholder="Kata Sandi" />
                        <button type="submit" class="btn btn-default">Masuk</button>
                        <button type="button"  class="btn btn-default" onclick="window.location='../index.php'"> Keluar</button> 
                    </form>
                </div><!--/login form-->
            </div>
			
        </div>
    </div>
</section><!--/form-->
    </body>


</html>
