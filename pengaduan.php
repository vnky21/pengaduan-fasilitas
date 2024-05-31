<?php 
require 'function/home/function.php';

include 'template/home/header.php';
include 'template/home/navbar.php';

cekLogin();


?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

        <?php if(!isset($_SESSION['alert'])) {
          $_SESSION['alert'] = FALSE;
        } ?>

        <?php if($_SESSION['alert'] == TRUE) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Pengaduan Gagal!</strong> <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
            unset($_SESSION['alert']);; 
            endif; ?> 
  
          <div class="section-header">
            <h2>Buat Pengaduan</h2>
            <p>Silahkan isi pengaduan anda melalui form di bawah ini, lengkapi dengan foto pengaduan anda. <br>Anda hanya dapat melaporkan 2 pengaduan per hari</p>
          </div>
  
          <div class="row ">
  
            <div class="col-lg-5 order-2 order-lg-1 mt-5">
  
             <img class="img-fluid" src="assets/home/img/pengaduan-img.svg" alt="">
  
            </div>
  
            <div class="col-lg-7 order-2 order-lg-1">
              
              <form action="function/home/add-pengaduan.php" method="post" role="form" enctype="multipart/form-data">
                <div class="row"> 

                <div class="mb-3 form-group">
                    <label class="form-label"  for="">Preview Image</label>
                    <br>
                    <img id="preview" class="img-fluid border" src="img-laporan/no-image.jfif" alt="Preview Gambar" style="max-width: 300px; max-height: 300px;">
                  </div>
                  <div class="mb-3 form-group">
                  
                    <label class="form-label" for="">Gambar Pengaduan</label>
                    
                    <input type="file" name="gambar" class="form-control" accept="image/*" id="gambar" placeholder="Your Name" required>
                    <p class="text-danger">*wajib JPG, JPEG, atau PNG dengan maksimal ukuran gambar 2 MB</p>
                  </div>

                  
                  <div class="mb-3 form-group">
                    <label class="form-label"  for="">Isi Pengaduan</label>
                    <textarea class="form-control" name="isi" rows="7" placeholder="Message" required></textarea>
                  </div>

                <button class="btn btn-success" type="submit">Kirim Pengaduan <i class="bi bi-chevron-double-right"></i></button>
              </form>

            </div><!-- End Contact Form -->

            <script>
        // Fungsi untuk menampilkan tampilan foto sementara
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('preview').style.display = 'block';
                    document.getElementById('preview').setAttribute('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Memanggil fungsi previewImage saat input file diubah
        document.getElementById('gambar').addEventListener('change', function() {
            previewImage(this);
        });
    </script>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php 

include 'template/home/footer.php';

?>

 