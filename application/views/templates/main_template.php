<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ar">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="El3mad Real Estate">
    <meta name="author" content="Unique Business">
    
    <!--Browser icon-->
    <link rel="apple-touch-icon" href="[INSERT apple-tuch-icon.png]">
    
    <!--bootstrap core css-->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap-rtl.css');?>">
    
    <!--font-icons css-->
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css');?>">    
    <link rel="stylesheet" href="<?= base_url('assets/ionicons-master/css/ionicons.min.css');?>">    
    
    <!--customized css-->
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css');?>">    
    
    
    <!--modernizer-->
    <!-- DOWNLOAD LAST VERSION IN http://modernizr.com/ -->
    <!-- script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> -->
    <script src="<?= base_url('assets/js/modernizer.js')?>"></script>
</head>

<body>

    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Start coding here -->
        <?= $body; ?>
    <!-- Coding End -->

    <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/js/modernizer.js');?>"></script>
    
</body>



</html>
