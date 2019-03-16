<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | SMA Mekar Arum</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url() ?>images/logo mekar.png">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/scss/style.css">
    <link href="<?php echo base_url() ?>assets_admin/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="<?php echo base_url() ?>https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <aside id="left-panel" class="left-panel">
        <?php
        	$this->load->view('menu');
        ?>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="<?php echo base_url('login/logout'); ?>">Logout
                        </a>
                    </div>

                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-12">
        	<div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Administrator</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url()?>images/logo mekar.png" alt="Card image cap" width="150" height="150">
                            <h5 class="text-sm-center mt-2 mb-1">Selamat Datang</h5>
                            <div class="location text-sm-center"> Administartor SMA Mekar Arum</div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="<?php echo base_url() ?>assets_admin/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url() ?>https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets_admin/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>assets_admin/js/main.js"></script>


    <script src="<?php echo base_url() ?>assets_admin/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo base_url() ?>assets_admin/js/dashboard.js"></script>
    <script src="<?php echo base_url() ?>assets_admin/js/widgets.js"></script>
    <script src="<?php echo base_url() ?>assets_admin/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="<?php echo base_url() ?>assets_admin/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url() ?>assets_admin/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url() ?>assets_admin/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
