<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?php echo e(config('app.name')); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="<?php echo e(asset('adminto/landing/images/favicon.png')); ?>">



  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('adminto/landing/css/bootstrap.min.css')); ?>" type="text/css">

  <!--Material Icon -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('adminto/landing/css/materialdesignicons.min.css')); ?>" />

  <!--pe-7 Icon -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('adminto/landing/css/pe-icon-7-stroke.css')); ?>" />

  <!-- Custom  sCss -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('adminto/landing/css/style.css')); ?>" />

  <style>
    .max-lines {
      display: block;
      /* or inline-block */
      text-overflow: ellipsis;
      word-wrap: break-word;
      overflow: hidden;
      max-height: 3.6em;
      line-height: 1.8em;
    }
    .indent {
      text-indent: 40px;
    }
  </style>



</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="58" class="scrollspy-example">

  <!--Navbar Start-->
  <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark" id="nav-sticky">
    <div class="container-fluid">
      <!-- LOGO -->
      <a class="logo text-uppercase" href="<?php echo e(('/')); ?>">
        <img src="<?php echo e(asset('adminto/landing/images/logo-light.png')); ?>" alt="" class="logo-light" height="18" />
        <img src="<?php echo e(asset('adminto/landing/images/logo-dark.png')); ?>" alt="" class="logo-dark" height="18" />
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="mdi mdi-menu"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto" id="mySidenav">
          <li class="nav-item">
            <a href="#home" class="nav-link active">Home</a>
          </li>
          <li class="nav-item">
            <a href="#profil" class="nav-link">Profil</a>
          </li>
          <li class="nav-item">
            <a href="#berita" class="nav-link">Berita</a>
          </li>
          <li class="nav-item">
            <a href="#lembaga" class="nav-link">Lembaga</a>
          </li>
          <li class="nav-item">
            <a href="#layanan" class="nav-link">Layanan</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/landing/header.blade.php ENDPATH**/ ?>