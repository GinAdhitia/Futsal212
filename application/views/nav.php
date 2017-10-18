</head>
  <?php
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri_path);
  ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url()?>" class="logo">
      <span class="logo-mini"><b>F</b>212</span>
      <span class="logo-lg"><b>Futsal</b> 212</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu" style="float: left;">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a>
              <?php echo $uri[2]; ?>
            </a>
          </li>
        </ul>
      </div>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a>
              <span class="hidden-xs"><?php echo $nama; ?></span>
            </a>
          </li>
          <li>
            <a href="" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
          <li>
            <a href=""><i class="fa fa-expand"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MENU UTAMA</li>
        <li <?php if ($uri[2] == "home") { echo "class='active'"; } ?> >
          <a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
        </li>
        <li <?php if ($uri[2] == "schedule") { echo "class='active'"; } ?> >
          <a href="<?php echo base_url()?>schedule"><i class="fa fa-dashboard"></i> <span>Jadwal</span></a>
        </li>

        <li class="treeview <?php if ($uri[2] == "report") { echo "active menu-open"; } ?> ">
          <a><i class="fa fa-share"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>report/booking"><i class="fa fa-circle-o"></i> Laporan Penyewaan</a></li>
            <li><a href="<?php echo base_url()?>report/finance"><i class="fa fa-circle-o"></i> Laporan Keuangan</a></li>
          </ul>
        </li>
        <li <?php if ($uri[2] == "member") { echo "class='active'"; } ?> >
          <a href="<?php echo base_url()?>member"><i class="fa fa-dashboard"></i> <span>Member</span></a></li>

        <?php if ($lvl==0) { ?>
        <li class="header">MENU SUPER ADMIN</li>
        <li <?php if ($uri[2] == "admin") { echo "class='active'"; } ?> >
          <a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> <span>Admin</span></a></li>
        <li <?php if ($uri[2] == "pricelist") { echo "class='active'"; } ?> >
          <a href="<?php echo base_url()?>pricelist"><i class="fa fa-dashboard"></i> <span>Harga + Waktu</span></a></li>
        <li <?php if ($uri[2] == "invoice") { echo "class='active'"; } ?> >
          <a href="<?php echo base_url()?>invoice"><i class="fa fa-dashboard"></i> <span>Invoice</span></a></li>
        <li <?php if ($uri[2] == "event") { echo "class='active'"; } ?> >
          <a href="<?php echo base_url()?>event"><i class="fa fa-dashboard"></i> <span>Jadwal Khusus</span></a></li>
        <?php } ?>

        <li class="header">LOG</li>
        <li>
          <a href="<?php echo base_url()?>lock"><i class="fa fa-dashboard"></i> <span>Kunci</span></a></li>
        <li>
          <a href="<?php echo base_url()?>log/logout"><i class="fa fa-dashboard"></i> <span>Keluar</span></a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">