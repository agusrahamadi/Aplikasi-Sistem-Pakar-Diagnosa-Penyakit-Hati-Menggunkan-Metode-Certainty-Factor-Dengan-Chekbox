<?php
include("leftbar.php");
?>    
      <header class="intro-header" style="background-image: url('depan/img/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Informasi</h1>
                        <hr class="small">
                        <span class="subheading">Penjelasan lebih lanjut tentang berbagai penyakit hati beserta penanganannya</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
		<div class="main-content">
			<div class="main-content-inner">
				

				<div class="page-content">
					

					<div class="row">

  <?php
	$hasill =" SELECT * FROM t_tentangpenyakit ORDER BY kd_tentangpenyakit ";			
  $hasil = mysqli_query($mysqli, $hasill);
  while ($r = mysqli_fetch_array($hasil)) {
      ?>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-aos="fade-right">
        <div class="card text-center">
          <img class="card-img-top img-bordered-sm" src="<?php echo 'gambar/' . $r['gambar']; ?>" alt="" width="100%" height="200">
          <div class="card-block">
            <h4 class="card-title"><h3 class="bg-keterangan"><?php echo $r['nm_tentangpenyakit']; ?></h3>
              <a class="btn btn-default bg-maroon btn-flat margin" href="#" data-toggle="modal" data-target="#modal<?php echo $r['kd_tentangpenyakit']; ?>"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Detail</a>
              
          </div>
        </div>
        <hr>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modal<?php echo $r['kd_tentangpenyakit'];?>" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header detail-ket">
              <button type="button" class="close" data-dismiss="modal" style="opacity: .99;color: #fff;">&times;</button>
              <h4 class="modal-title text text-ket"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Detail Untuk <?php echo $r[nm_tentangpenyakit]; ?></h4>
            </div>
            <div class="modal-body" style="text-align: justify;text-justify: inter-word;">
              <p><?php echo $r[det_tentangpenyakit]; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      
     


  <?php } ?>



</div>
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->
            <?php
            include("footer.php");
            ?>    
	</body>
</html>

