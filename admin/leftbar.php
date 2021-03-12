<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
  <ul class="nav nav-list">

    <li class="hover col-sm-2 center" <?php if ($page=='dashboard') {echo $active;}?>>
        <a href="adminmainapp.php?unit=dashboard">
        <span class="menu-text"> Beranda </span>
      </a>

      <b class="arrow"></b>
    </li>
        
    

    <!-- kategori -->
    <li class="hover col-sm-2 "  <?php if ($page=='penyakit_unit' or $page=='gejala_unit' or $page=='tentangpenyakit_unit') {echo $open;}?>>
      <a href="#" class="dropdown-toggle center">
        <span class="menu-text"> Data Master </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        <li <?php if ($page=='penyakit_unit' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=penyakit_unit&act=datagrid"><i class="menu-icon"></i>Data Penyakit</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='gejala_unit' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=gejala_unit&act=datagrid"><i class="menu-icon "></i>Data Gejala</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='tentangpenyakit_unit' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=tentangpenyakit_unit&act=datagrid"><i class="menu-icon "></i>Data Informasi</a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>

    <!-- subkategori -->
    <li class="hover col-sm-2 " <?php if ($page=='dbp_unit' or $page=='p_gejala_unit') {echo $open;}?>>
      <a href="#" class="dropdown-toggle center">
        <span class="menu-text"> Data Transaksi </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
         <li <?php if ($page=='dbp_unit' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=dbp_unit&act=datagrid"><i class="menu-icon "></i>Data Basis Pengetahuan</a>
          <b class="arrow"></b>
        </li>
        <!--<li <?php if ($page=='konsultasi_unit' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=konsultasi_unit&act=datagrid"><i class="menu-icon "></i>Data Konsultasi</a>
          <b class="arrow"></b>
		 
		 </li>-->
		 <li <?php if ($page=='p_gejala_unit' && $act1=='input') {echo $active;}?>>
          <a href="adminmainapp.php?unit=p_gejala_unit&act=input"><i class="menu-icon "></i>Konsultasi</a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>

    <!-- Brand -->
    <li  class="hover col-sm-2 "<?php if ($page=='l_penyakit' or $page=='l_gejala' or $page=='l_dbp') {echo $open;}?>>
      <a href="#" class="dropdown-toggle center">
        <span class="menu-text"> Laporan </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        
         <li <?php if ($page=='l_penyakit' && $act1=='input') {echo $active;}?>>
          <a href="adminmainapp.php?unit=l_penyakit&act=datagrid"><i class="menu-icon "></i>Laporan Data Penyakit</a>
          <b class="arrow"></b>
        </li>
		 <li <?php if ($page=='l_gejala' && $act1=='input') {echo $active;}?>>
          <a href="adminmainapp.php?unit=l_gejala&act=datagrid"><i class="menu-icon "></i>Laporan Data Gejala</a>
          <b class="arrow"></b>
        </li>
		 <li <?php if ($page=='l_dbp' && $act1=='input') {echo $active;}?>>
          <a href="adminmainapp.php?unit=l_dbp&act=datagrid"><i class="menu-icon "></i>Lapoaran Data Basis Pengetahuan</a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>

    
    <!-- Use -->

	<li class="hover col-sm-2 center" <?php if ($page=='dashboard') {echo $active;}?>>
        <a href="adminmainapp.php?unit=gantisandi&act=datagrid&act=update&userid=1">
        <span class="menu-text"> Ganti Sandi </span>
      </a>

      <b class="arrow"></b>
    </li>

        <!-- logout -->
    <li class="hover col-sm-2 center ">
        <a href="logout.php">
        <span class="menu-text"> Keluar </span>
      </a>

      <b class="arrow"></b>
    </li>
  </ul><!-- /.nav-list -->

  
</div>
