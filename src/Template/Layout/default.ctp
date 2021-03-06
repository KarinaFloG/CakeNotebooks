<?php use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo Configure::read('Theme.title'); ?> | <?php echo $this->fetch('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <?php echo $this->Html->css('Chart.min'); ?>
    <?php echo $this->Html->css('icheck-bootstrap.min'); ?>
    <?php echo $this->Html->css('jqvmap.min'); ?>
    <?php echo $this->Html->css('OverlayScrollbars.min'); ?>
    <?php echo $this->Html->css('daterangepicker'); ?>
    <?php echo $this->Html->css('summernote-bs4'); ?>
    <?php echo $this->Html->css('select2.min.css'); ?>
    <?php echo $this->Html->css('select2-bootstrap4.min'); ?>
    <?php echo $this->Html->css('adminlte.min.css'); ?>
    <?php echo $this->Html->script('jquery-3-6-0.js'); ?>
    <?php echo $this->Html->script('pnotify.js'); ?>
    <?php echo $this->Html->script('pnotify.js'); ?>
    <?php echo $this->Html->css('pnotify.css'); ?>
    <?php echo $this->Html->css('pnotify.brighttheme.css'); ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

    <?php echo $this->fetch('css'); ?>

</head>
<body class="sidebar-mini layout-fixed  <?= $this->fetch('custom_css_name'); ?>">
    <div class="wrapper">
        <?php echo $this->element('nav-top'); ?>

        <?php echo $this->element('aside-main-sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php echo $this->Flash->render(); ?>
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->fetch('content'); ?>

        </div>
        <!-- /.content-wrapper -->

        <?php echo $this->element('footer'); ?>

        <!-- Control Sidebar -->
        <?php echo $this->element('aside-control-sidebar'); ?>
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <?php echo $this->Html->script('jquery.min'); ?>
    <!-- Bootstrap 4 -->
    <?php echo $this->Html->script('bootstrap-bundle.min'); ?>
    <!-- overlayScrollbars -->
    <?php echo $this->Html->script('jquery.overlayScrollbars.min'); ?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script('adminlte.min'); ?>

    <!-- jQuery UI 1.11.4 -->
    <?php echo $this->Html->script('jquery-ui.min'); ?>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Sparkline -->
    <?php echo $this->Html->script('sparkline'); ?>
    <!-- jQuery Knob Chart -->
    <?php echo $this->Html->script('jquery.knob.min'); ?>
    <!-- daterangepicker -->
    <?php echo $this->Html->script('moment.min'); ?>
    <?php echo $this->Html->script('daterangepicker'); ?>
    <!-- Tempusdominus Bootstrap 4 -->
    <?php echo $this->Html->script('tempusdominus-bootstrap-4.min'); ?>
    <!-- Summernote -->
    <?php echo $this->Html->script('summernote-bs4.min'); ?>
    <!-- FastClick -->
    <?php echo $this->Html->script('fastclick'); ?>
    <!-- Select2 -->
    <?php echo $this->Html->script('select2.full.min'); ?>

    <?php
    $pageJs = $this->fetch('page_js');
    if(!empty($pageJs)) {
        if(is_string($pageJs)) {
            echo $this->Html->script($pageJs);
        } else {
            foreach($pageJs as $js) {
                echo $this->Html->script($js);
            }
        }
    }
    ?>

    <?php echo $this->fetch('script'); ?>
    <?php echo $this->fetch('scriptBottom'); ?>
</body>
</html>
