<?php 
include 'admin/data-index.php';

$totalPengaduan = intval($rowTotalPengaduan['total']);
$pengaduanHariIni = intval($rowPengaduanHariIni['total']);
$dataMahasiswa = intval($rowDataMahasiswa['total']);

include 'template/home/header.php';
include 'template/home/navbar.php';

?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
        
        <?php if($_SESSION['is_login'] == TRUE) : ?>
        <p>Berhasil Login dengan akun <?= (isset($_SESSION['email'])) ? $_SESSION["email"] : '' ?></p>  
        <?php endif; ?>
        <h2>Welcome to <br> <span>UNITAMA FacilityCare+</span></h2>
          <p>UNITAMA FacilityCare+ adalah aplikasi yang menjadi wadah mahasiswa yang ingin melaporkan terkait kerusakan fasilitas kampus UNITAMA.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            
            <a href="#call-to-action" class="btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            <a href="<?= ($_SESSION['is_login'] == TRUE) ? 'pengaduan.php' : 'login.php'?>" class="btn-get-started"> <b> + Buat Pengaduan </b></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/home/img/home-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>
          
    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-door-open"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Buat Akun</a></h4>
              <p>Sebelum menulis laporan, anda wajib terlebih dahulu membuat akun</p>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-pencil-square"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Tulis Laporan</a></h4>
              <p>Laporkan keluhan anda terkait kerusakan fasilitas, lampirkan dengan gambarnya</p>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-chat-left-text"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Proses Tindak Lanjut</a></h4>
              <p>Pihak Kampus akan menindaklanjuti dan membalas laporan Anda</p>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-check2-square"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Selesai</a></h4>
              <p>Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</p>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

        <!-- ======= Stats Counter Section ======= -->
        <section id="stats-counter" class="stats-counter">
          <div class="container" data-aos="fade-up">

            <div class="section-header">
              <h2>Data dalam Angka</h2>
              <p>Berikut Data Angka Informasi Terkait Laporan Fasilitas Kampus</p>
            </div>
    
            <div class="row gy-4 align-items-center">
    
              <div class="col-lg-6">
                <img src="assets/home/img/stats-img.svg" alt="" class="img-fluid">
              </div>
    
              <div class="col-lg-6">
    
                <div class="stats-item d-flex align-items-center">
                  <span data-purecounter-start="0" data-purecounter-end="<?=  $totalPengaduan ?>" data-purecounter-duration="1" class="purecounter"></span>
                  <h5><strong>Jumlah Data</strong> Laporan Masuk</h5>
                </div><!-- End Stats Item -->
    
                <div class="stats-item d-flex align-items-center">
                  <span data-purecounter-start="0" data-purecounter-end="<?= $pengaduanHariIni ?>" data-purecounter-duration="1" class="purecounter"></span>
                  <h5><strong>Jumlah Data</strong> Laporan Hari Ini</h5>
                </div><!-- End Stats Item -->
    
                <div class="stats-item d-flex align-items-center">
                  <span data-purecounter-start="0" data-purecounter-end="<?= $dataMahasiswa ?>" data-purecounter-duration="1" class="purecounter"></span>
                  <h5><strong>Jumlah Akun</strong> Telah Terdaftar</h5>
                </div><!-- End Stats Item -->
    
              </div>
    
            </div>
    
          </div>
        </section><!-- End Stats Counter Section -->
   
        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="call-to-action sections-bg">
          <div class="container text-center" data-aos="zoom-out">
            <a href="https://www.youtube.com/watch?v=N6UQ-wefP1U" class="glightbox play-btn"></a>
            <h3>Profil Singkat UNITAMA</h3>
            <p> Berikut video profile singkat perkenalan UNITAMA, agar bisa lebih dekat mengenal kampus UNITAMA</p>
           
          </div>
        </section><!-- End Call To Action Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials ">
          <div class="container" data-aos="fade-up">
    
            <div class="section-header">
              <h2>Pengaduan Terbaru</h2>
              <p>Data pengaduan terbaru yang telah dilaporkan oleh pengguna</p>
            </div>
    
            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

              <?php foreach($dataPengaduanTerbaru as $dp) : ?>
                <div class="swiper-slide">
                  <div class="testimonial-wrap">
                    <div class="testimonial-item">
                      <div class="d-flex align-items-center">
                        <img src="assets/admin/img/user.png" class="testimonial-img flex-shrink-0" alt="">
                        <div>
                          <h3>Data Pengaduan</h3>
                          <h4><?= date('d F Y', strtotime($dp['tgl_pengaduan'])); ?></h4>
                          
                        </div>
                      </div>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <?= $dp['isi'] ?>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
              <?php endforeach; ?>  

    
              </div>
              <div class="swiper-pagination"></div>
            </div>
    
          </div>
        </section><!-- End Testimonials Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3><strong>Pertanyaan </strong> Yang Sering Diajukan</h3>
              <p>
                Berikan merupakan daftar pertanyaan yang sering diajukan oleh pengguna terkait website UNITAMA FacilityCare+
              </p>
            </div>
          </div>

          <div class="col-lg-8">

            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <span class="num">1.</span>
                    Apakah Aplikasi Ini Memberikan Fitur Pelacakan Pengaduan dalam Proses Penyelesaian?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  Aplikasi kami menyediakan fitur pelacakan pengaduan yang memungkinkan Anda untuk melihat tahapan penyelesaian pengaduan Anda. Setelah Anda mengajukan pengaduan, Anda dapat memantau perjalanan pengaduan mulai dari penerimaan hingga penyelesaian akhir. 
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <span class="num">2.</span>
                    Apakah Ada Batasan dalam Jumlah Pengaduan yang Dapat Diajukan oleh Satu Pengguna?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  Untuk memastikan bahwa layanan kami dapat melayani sebanyak mungkin pengguna, kami telah menerapkan kebijakan batasan jumlah pengaduan yang dapat diajukan oleh satu user adalah 2 pengaduan per hari.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <span class="num">3.</span>
                   Apakah Kita Harus Mendaftarkan Akun Untuk Membuat Laporan?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  Ya, kami mewajibkan setiap pengguna untuk memiliki akun terdaftar sebelum dapat mengajukan laporan melalui aplikasi fasilitas kampus kami. Mendaftarkan akun memungkinkan kami untuk mengidentifikasi Anda sebagai pengguna yang sah, memberikan pembaruan tentang status laporan, dan memudahkan Anda dalam memantau riwayat pengaduan Anda.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <span class="num">4.</span>
                    Bagaimana Keamanan Data Pengguna Dijamin dalam Aplikasi Ini?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  Keamanan data pengguna adalah prioritas utama kami. Kami menggunakan teknologi enkripsi sehingga data pelapor tidak diketahui oleh admin.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <span class="num">5.</span>
                    Apakah Saya Bisa Melihat Status Pengaduan yang Saya Ajukan?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  Ya, Anda dapat memantau status pengaduan yang Anda ajukan.
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

<?php 

include 'template/home/footer.php';

?>

 