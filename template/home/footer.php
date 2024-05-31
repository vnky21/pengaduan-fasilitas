 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-info">
      <a href="index.php" class="logo d-flex align-items-center">
        <span>UNITAMA FacilityCare+</span>
      </a>
      <p>UNITAMA FacilityCare+ adalah aplikasi yang menjadi wadah mahasiswa yang ingin melaporkan terkait kerusakan fasilitas kampus UNITAMA.</p>
      <div class="social-links d-flex mt-4">
        <a href="https://twitter.com/kampus_unitama" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://web.facebook.com/unitama.ac.id/" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/unitama.ac.id/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCymuU0E34t05agjP_yW4HNg" target="_blank" class="linkedin"><i class="bi bi-youtube"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-md-12 footer-info">
    <h4>Lokasi UNITAMA</h4>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3973.76154446888!2d119.4849788!3d-5.1420465!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee335adf2d2b3%3A0x5a92f8b04f063c19!2sUniversitas%20Teknologi%20Akba%20Makassar!5e0!3m2!1sid!2sid!4v1691168992029!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>



    <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
      <h4>Contact Us</h4>
      <p>
        Jl. Perintis Kemerdekaan No.7 90245<br> Kel. Tamalanrea Jaya Kec. Tamalanrea <br>Kota Makassar Sulawesi Selatan <br>
        <br>
        <strong>Phone:</strong> 0411-588371<br>
        <strong>Email:</strong> info@unitama.com
      </p>

    </div>

  </div>
</div>

<div class="container mt-4">
  <div class="copyright">
    &copy; Copyright <strong><span>UNITAMA</span></strong> <?= date('Y') ?>. All Rights Reserved
  </div>

</div>

</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/home/vendor/aos/aos.js"></script>
<script src="assets/home/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/home/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/home/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/home/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/home/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/home/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>



<script>
  new DataTable('#example');
</script>



<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <!-- Tombol logout -->
        <a href="user/logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>




</body>
</html>