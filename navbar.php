<body class="no-skin">
        <?php
        require_once 'lib/koneksi.php';
        ?>
       
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Diagnosa Penyakit Hati</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="adminmainapp.php?unit=p_dashboard">Beranda</a>
                    </li>
                    <li>
                        <a href="adminmainapp.php?unit=p_penyakit_unit&act=datagrid">Informasi</a>
                    </li>
                    <li>
                        <a href="adminmainapp.php?unit=p_gejala_unit&act=input">Konsultasi</a>
                    </li>
                    <li>
                        <a href="adminmainapp.php?unit=p_cf_unit&act=datagrid">Tentang</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	