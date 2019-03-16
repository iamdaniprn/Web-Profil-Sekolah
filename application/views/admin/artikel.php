<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | SMA Mekar Arum</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="wid_artikelth=device-wid_artikelth, initial-scale=1">

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

    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/lib/datatable/dataTables.bootstrap.min.css">

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

    <div id_artikel="right-panel" class="right-panel">
        <!-- Header-->
        <header id_artikel="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id_artikel="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
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
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url()?>admin/tambah_artikel"><button class="btn btn-info">Tambah</button></a><br><br>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Artikel</strong>
                        </div>
                        <?php echo $this->session->flashdata('sukses'); ?>
                        <div class="card-body">
                          <table id_artikel="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0; foreach($data_artikel as $row) 
                            { 
                                $no++;
                            ?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['judul']; ?></td>
                                <td>
                                     <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>admin/detail_artikel/<?php echo $row['id_artikel']; ?>" data-toggle="tooltip" data-placement="top" title="DETAIL">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/edit_artikel/<?php echo $row['id_artikel']; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>admin/hapus_artikel/<?php echo $row['id_artikel']; ?>" data-toggle="tooltip" data-placement="top" title="HAPUS">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                              </tr>
                            <?php 
                            } ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <?php $this->load->view('js'); ?>
</body>
</html>
