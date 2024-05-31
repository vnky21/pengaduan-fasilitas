<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:info@unitama.com">info@unitama.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>0411-588371</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
      <a href="https://twitter.com/kampus_unitama" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://web.facebook.com/unitama.ac.id/" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/unitama.ac.id/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCymuU0E34t05agjP_yW4HNg" target="_blank" class="linkedin"><i class="bi bi-youtube"></i></a>

    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img src="assets/admin/img/Facility Care.png"  alt="" style="max-width: 18%;">
        <h1>UNITAMA FacilityCare+<span>.</span></h1>
      </a>
    
    <?php

    function is_active($page_name) {
        $current_page = basename($_SERVER['PHP_SELF']);
        return ($current_page == $page_name) ? 'active' : '';
    };
    ?>
      <nav id="navbar" class="navbar">
        <ul>
          
         <li><a href="index.php" class="<?= is_active('index.php'); ?>">Home</a></li>

         <?php if($_SESSION['is_login'] == TRUE) : ?>
          <li><a href="pengaduan.php" class="<?= is_active('pengaduan.php'); ?>">Pengaduan</a></li>
          <li><a href="daftar-pengaduan.php" class="<?= is_active('daftar-pengaduan.php'); ?>">Daftar Pengaduan</a></li>
         <?php endif; ?>

         <?php if($_SESSION['is_login'] == TRUE) : ?>

          <li><a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-in-left" style="margin-right: 5px;" ></i> Log Out</a></li>

          
          
         <?php else : ?> 

          <li><a href="login.php"><i class="bi bi-box-arrow-in-right" style="margin-right: 5px;"></i> Log in</a></li>

        <?php endif; ?>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->