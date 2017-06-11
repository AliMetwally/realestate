<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title><?= $title?></title>

        

        <!--bootstrap core css-->
        <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap-reset.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap-rtl.css'); ?>">

        <!--Animation css-->
        <link href="<?= base_url('assets/css/animate.css" rel="stylesheet'); ?>">

        <!--Icon-fonts css-->
        <link href="<?= base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />


        <!-- Custom styles for this template -->
        <link href="<?= base_url('assets/css/style.css" rel="stylesheet'); ?>">
        <link href="<?= base_url('assets/css/helper.css" rel="stylesheet'); ?>">
        <link href="<?= base_url('assets/css/main.css" rel="stylesheet'); ?>">

    </head>


    <body>

        <div class="wrapper-page animated fadeInDown">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"> 
                    <h3 class="text-center m-t-10">تسجيل الدخول</h3>
                </div>
                <div id="notification-login"></div>
                
                <form method="post" action="#" class="form-horizontal m-t-40 user-login-form">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="username" type="text" placeholder="اسم المستخدم">
                        </div>
                    </div>
                    <div class="form-group ">

                        <div class="col-xs-12">
                            <input class="form-control" name="password" type="password" placeholder="كلمة المرور">
                        </div>
                    </div>


                    <div class="form-group text-right">
                        <div class="col-xs-12">
                            <!--btn-login is used in ajax script-->
                            <button class="btn btn-purple w-md btn-login" type="submit">تسجيل الدخول</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>




        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?= base_url('assets/js/lib/jquery.min.js');?>"></script>
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
                
        <script src="<?= base_url('assets/js/custome_modules.js');?>"></script>
        <script src="<?= base_url('assets/js/login.js');?>"></script>

        <!--common script for all pages-->
        <script src="assets/js/lib/jquery.app.js"></script>
        

    </body>
</html>
