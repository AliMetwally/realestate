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
        <link rel="stylesheet" href="<?= base_url('assets/css/datatable/buttons.bootstrap.min.css');?>">
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
        <script src="<?= base_url('assets/js/datatable/dataTables.buttons.min.js')?>"></script>
        <script src="<?= base_url('assets/js/datatable/buttons.bootstrap.min.js')?>"></script>
        <script src="<?= base_url('assets/js/datatable/buttons.html5.min.js')?>"></script>
        <script src="<?= base_url('assets/js/datatable/buttons.print.min.js')?>"></script>
        <script src="<?= base_url('assets/js/datatable/jszip.min.js')?>"></script>
        <script src="<?= base_url('assets/js/datatable/buttons.flash.min.js')?>"></script>
        <script src="<?= base_url('assets/js/datatable/pdfmake.min.js')?>"></script>
        <script src="<?= base_url('assets/js/datatable/vfs_fonts.js')?>"></script>
        
        
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
                            <p class="lead"><i class="glyphicon glyphicon-user"></i>
                                <span class="text-red">عماد حمدي</span>
                            </p>                                                       
                        </li>
                        <!-- dashboard -->
                        <li>
                            <a href="<?php echo base_url('manager/manager_dashboard')?>">
                                <i class="fa fa-dashboard"></i> <span>اللوحة الرئيسية</span>                               
                            </a>
                        </li>
                        <!-- properties -->
                        <li>
                            <a href="<?php echo base_url('manager/search_properties')?>">
                                <i class="fa fa-building"></i> <span>المعروض</span>                               
                            </a>
                        </li>
                        <!-- add areas -->         
                        <li>
                            <a href="<?php echo base_url('manager/areas')?>">
                                <i class="fa fa-check-square-o"></i> <span>إدخال المناطق</span>                               
                            </a>
                        </li>
                        <!-- create users -->
<!--                        <li>
                            <a href="<?php echo base_url('manager/NewUsers')?>">
                                <i class="fa fa-users"></i> <span>إنشاء حساب جديد</span>                               
                            </a>
                        </li>-->
                        <!-- update & delete users -->
                        <li>
                            <a href="<?php echo base_url('examples/employees_management')?>">
                                <i class="fa fa-users"></i> <span>حسابات الموظفين</span>                                   
                            </a>
                        </li>
                        <!-- deals -->
<!--                        <li>
                            <a href="<?php echo base_url('manager/manager_deals')?>">
                                <i class="fa fa-cogs"></i> <span>عمليات التسويق</span>                               
                            </a>
                        </li>-->
                        <li>
                            <a href="<?php echo base_url('notifications')?>">
                                <i class="fa fa-bell"></i> <span>التنبيهات</span>                               
                            </a>
                        </li>
                        <!-- clients -->
                        <li>
                            <a href="<?php echo base_url('client_info/user_clients')?>">
                                <i class="fa fa-users"></i> <span>العملاء</span>                               
                            </a>
                        </li>
                        
                        <!-- confirm property -->
                        <li>
                            <a href="<?php echo base_url('manager/unconfirmed_property')?>">
                                <i class="fa fa-flag-checkered"></i> <span>اعتماد الوحدات</span>
                                <small class="label pull-left bg-red-active"><?= $this->session->unconfirmed_num?></small>
                            </a>
                        </li>
                        
                        <!-- success deals -->
                        <li>
                            <a href="<?php echo base_url('manager/success_deals')?>">
                                <i class="fa fa-check-square-o"></i> <span>الصفقات الناجحة</span>                               
                            </a>
                        </li>
                        
                        <!-- logout -->
                        <li>
                            <a href="<?php echo base_url('main/doLogout')?>">
                                <i class="fa fa-power-off"></i> <span>خروج</span>                               
                            </a>
                        </li>
<!--                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-left"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <span class="label label-primary pull-left">4</span>
                                <i class="fa fa-files-o"></i>
                                <span>Layout Options</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                                <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                                <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../widgets.html">
                                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">Hot</small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Charts</span>
                                <i class="fa fa-angle-left pull-left"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                                <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                                <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                                <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>UI Elements</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                                <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                                <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                                <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                                <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                                <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Forms</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                                <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                                <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Tables</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                                <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../calendar.html">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                                <small class="label pull-right bg-red">3</small>
                            </a>
                        </li>
                        <li>
                            <a href="../mailbox/mailbox.html">
                                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                                <small class="label pull-right bg-yellow">12</small>
                            </a>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Examples</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                                <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                                <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                                <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                                <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                                <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                                <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-share"></i> <span>Multilevel</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                        <li>
                                            <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                                            <ul class="treeview-menu">
                                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                            </ul>
                        </li>
                        <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                        <li class="header">LABELS</li>
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
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