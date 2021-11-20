<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo e(config('app.name')); ?></title>
  <link rel="shortcut icon" href="<?php echo e(asset('adminto/images/favicon.png')); ?>">


  <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <link href="<?php echo e(asset('adminto/plugins/jquery-ui/jquery-ui.css')); ?>" rel="stylesheet">
  <script src="<?php echo e(asset('adminto/plugins/jquery-ui/external/jquery/jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('adminto/plugins/jquery-ui/jquery-ui.js')); ?>"></script>
  <script src="<?php echo e(asset('signature/touch/jquery.ui.touch-punch.min.js')); ?>"></script>


  <!-- third party css -->
  <link href="<?php echo e(asset('adminto/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('adminto/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('adminto/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('adminto/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css')); ?>" rel="stylesheet" type="text/css" />
  <!-- third party css end -->

  <!-- Plugins css -->
  <link href="<?php echo e(asset('adminto/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('adminto/libs/dropify/css/dropify.min.css')); ?>" rel="stylesheet" type="text/css" />

  <!-- Plugins css -->
  <link href="<?php echo e(asset('adminto/libs/spectrum-colorpicker2/spectrum.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo e(asset('adminto/libs/flatpickr/flatpickr.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('adminto/libs/clockpicker/bootstrap-clockpicker.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('adminto/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('adminto/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet" type="text/css" />

  <!-- Notification css (Toastr) -->
  <link href="<?php echo e(asset('adminto/libs/toastr/build/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
  <!-- App css -->
  <link href="<?php echo e(asset('adminto/css/config/default/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
  <link href="<?php echo e(asset('adminto/css/config/default/app.min.css')); ?>" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

  <link href="<?php echo e(asset('adminto/css/config/default/bootstrap-dark.min.css')); ?>" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled" />
  <link href="<?php echo e(asset('adminto/css/config/default/app-dark.min.css')); ?>" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled" />

   <!-- Lightbox css -->
   <link href="<?php echo e(asset('adminto/libs/magnific-popup/magnific-popup.css')); ?>" rel="stylesheet" type="text/css" />
  <!-- icons -->
  <link href="<?php echo e(asset('adminto/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
  <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

  <link href="<?php echo e(asset('signature/css/jquery.signature.css')); ?>" rel="stylesheet">
  <script src="<?php echo e(asset('signature/js/jquery.signature.js')); ?>"></script>
  <style>
    .kbw-signature {
      height: 200px;
      width: 400px;
    }
  </style>


</head>

<body class="loading " data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/layouts/header.blade.php ENDPATH**/ ?>