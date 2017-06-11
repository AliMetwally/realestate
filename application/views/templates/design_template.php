<!DOCTYPE html>
<html>
    <head>
        <title><?= $title?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <!-- lightGallery -->
        <link rel="stylesheet" href="<?= base_url('assets/lightGallery/css/lightgallery.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
        <!-- Ionicons 2.0.1 -->
        <link rel="stylesheet" href="<?= base_url('assets/ionicons-master/css/ionicons.min.css'); ?>">
        <!-- datatables -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url('assets/skins/skin-blue-light.min.css'); ?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/flat/blue.css'); ?>">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/morris/morris.css'); ?>">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
        <!-- bootstap rtl-->        
        <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap-rtl.css'); ?>">
        
        <!-- custome style -->
        <link rel="stylesheet" href="<?= base_url('assets/css/admin-style.css'); ?>">
        
        <!--date picker
        <link rel="stylesheet" href="<?= base_url('assets/datepicker/css/bootstrap-datepicker.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/datepicker/css/bootstrap-datepicker.standalone.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/datepicker/css/bootstrap-datepicker3.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/datepicker/css/bootstrap-datepicker3.standalone.min.css'); ?>">
        -->
        <!-- script's -->
        <!-- jQuery 2.1.4 -->
        <script src="<?= base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.4 -->
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <!-- lightGallery -->
        <script src="<?= base_url('assets/lightGallery/js/lightgallery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/lightGallery/js/lg-fullscreen.min.js'); ?>"></script>
        <script src="<?= base_url('assets/lightGallery/js/lg-thumbnail.min.js'); ?>"></script>
        <script src="<?= base_url('assets/lightGallery/js/lg-video.min.js'); ?>"></script>
        <script src="<?= base_url('assets/lightGallery/js/lg-autoplay.min.js'); ?>"></script>
        <script src="<?= base_url('assets/lightGallery/js/lg-zoom.min.js'); ?>"></script>
        <script src="<?= base_url('assets/lightGallery/js/lg-hash.min.js'); ?>"></script>
        <script src="<?= base_url('assets/lightGallery/js/lg-pager.min.js'); ?>"></script>
        <script src="<?= base_url('assets/lightGallery/js/lg-pager.min.js'); ?>"></script>
        <!-- DataTables -->
        <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
        <script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
        
        <!-- SlimScroll -->
        <script src="<?= base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('assets/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/adminlte/js/app.min.js'); ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url('assets/adminlte/js/demo.js'); ?>"></script>
        
        <!--date picker scripts--> 
        <script src="<?= base_url('assets/datepicker/js/bootstrap-datepicker.min.js'); ?>" charset="UTF-8"></script>

        <!-- angularJS -->
        <script src="<?= base_url('assets/js/lib/angular.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/lib/uploader.js') ?>"></script>
        
        <!-- jquery ui -->
        <link rel="stylesheet" href="<?= base_url('assets/css/jquery-ui.min.css');?>">
        <script src="<?= base_url('assets/js/lib/jquery-ui.min.js');?>"></script>
        
        <!-- bootstrap validators -->
        <link rel="stylesheet" href="<?= base_url('assets/validator/bootstrapValidator.css'); ?>">
        <script src="<?= base_url('assets/validator/bootstrapValidator.js'); ?>"></script>

        <!-- custome script -->
        <script src="<?= base_url('assets/js/custome_modules.js');?>"></script>                

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body class="skin-blue-light sidebar-mini">

        <div class="wrapper">
            <!-- main header -->
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>العماد</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>العماد </b>للتسويق العقاري</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <!-- the left side top header deleted-->
                </nav>
            </header>

            <!-- side bar menu -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel 
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= base_url('assets/users_images/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-right info">
                            <p>Alexander Pierce</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>-->
                    <!-- search form -->
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <!-- username -->
                        <li class="header">
                            <h4><i class="glyphicon glyphicon-user"></i>
                                <span class="text-red"><?= $this->session->username;?></span>
                            </h4>                                                       
                        </li>
                        <li>
                            <a href="<?php echo base_url('designer/')?>">
                                <i class="fa fa-dashboard"></i> <span>إدخال الأعمال</span>                               
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('designer/dataReport')?>">
                                <i class="fa fa-dashboard"></i> <span>طباعة التقرير</span>                               
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('main/doLogout')?>">
                                <i class="fa fa-power-off"></i> <span>خروج</span>                               
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <?php if (isset($page_header)) { ?>
                    <section class="content-header">
                        <h1>
                            <?= $page_header?>                            
                        </h1>                    
                    </section>
                <?php } ?>
                

                <!-- Main content -->
                <section class="content">
                    <?= $body?>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            
            <!-- footer -->
            <footer class="main-footer">
                
<!--        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.-->
      </footer>

        </div>
    </body>
</html>