<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>KPPM FKIP UNS</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <meta name="author" content="Themeholy" />
    <meta
      name="description"
      content="Webteck - Technology & IT Solutions HTML Template"
    />
    <meta
      name="keywords"
      content="Webteck - Technology & IT Solutions HTML Template"
    />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicons/apple-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicons/apple-icon-60x60.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicons/apple-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicons/apple-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicons/apple-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicons/apple-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicons/apple-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicons/apple-icon-152x152.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-icon-180x180.png') }}" />
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicons/android-icon-192x192.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/ms-icon-144x144.png') }}" />


    <meta name="theme-color" content="#ffffff" />

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets1/css/bootstrap.min.css') }}" />
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets1/css/fontawesome.min.css') }}" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets1/css/magnific-popup.min.css') }}" />
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('assets1/css/swiper-bundle.min.css') }}" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}" />



  </head>

  <body class="gradient-body">
    <div class="cursor"></div>
    <div class="cursor2"></div>


    <div class="color-scheme-wrap active">
      <button class="switchIcon"><i class="fa-solid fa-palette"></i></button>
      <h4 class="color-scheme-wrap-title">
        <i class="far fa-palette me-2"></i>Style Swicher
      </h4>
      <div class="color-switch-btns">
        <button data-color="#3E66F3">
          <i class="fa-solid fa-droplet"></i>
        </button>
        <button data-color="#684DF4">
          <i class="fa-solid fa-droplet"></i>
        </button>
        <button data-color="#008080">
          <i class="fa-solid fa-droplet"></i>
        </button>
        <button data-color="#323F7C">
          <i class="fa-solid fa-droplet"></i>
        </button>
        <button data-color="#FC3737">
          <i class="fa-solid fa-droplet"></i>
        </button>
        <button data-color="#8a2be2">
          <i class="fa-solid fa-droplet"></i>
        </button>
      </div>
      <a
        href="https://themeforest.net/user/themeholy"
        class="th-btn text-center w-100"
        ><i class="fa fa-shopping-cart me-2"></i> Purchase</a
      >
    </div>



    <!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
      <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
          <a href="index.html"
            ><img src="{{asset('assets1/img/logo.svg')}}" alt="Webteck"
          /></a>
        </div>
        <div class="th-mobile-menu">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li class="menu-item-has-children">
              <a href="#">Services</a>
              <ul class="sub-menu">
                <li><a href="service.html">Services</a></li>
                <li><a href="service-details.html">Services Details</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="#">Blog</a>
              <ul class="sub-menu">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="blog-details.html">Blog Details</a></li>
              </ul>
            </li>
            <li>
              <a href="contact.html">Contact</a>
              <button type="button" class="icon-btn searchBoxToggler"><i class="fal fa-search"></i></button>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout2">
      <div class="header-top">
        <div class="container">
          <div
            class="row justify-content-center justify-content-lg-between align-items-center gy-2"
          >
            <div class="col-auto d-none d-lg-block">
              <div class="header-links">
                <ul>
                  <li>
                    <i class="fas fa-map-location"></i>Jl. Ir Sutami No.36 A,
                    Kentingan, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah
                    57126
                  </li>
                  <li>
                    <i class="fas fa-phone"></i
                    ><a href="tel:+1539873657">(0271) 669124</a>
                  </li>
                  <li>
                    <i class="fas fa-envelope"></i
                    ><a href="mailto:info@webteck.com">fkip@uns.com</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-auto">
              <div class="header-social">
                <a href="https://www.facebook.com/"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a href="https://www.twitter.com/"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a href="https://www.linkedin.com/"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
                <a href="https://www.instagram.com/"
                  ><i class="fab fa-instagram"></i
                ></a>
                <a href="https://www.youtube.com/"
                  ><i class="fab fa-youtube"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-auto">
                <div class="header-logo">
                  <span>
                    <img
                      src="{{ asset('assets/images/logo-fkip-uns-fkip.png') }}"
                      alt="logo-small"
                      style="height: 86px;"
                      class="logo-lg hidden dark:inline-block ms-1 group-data-[sidebar=dark]:inline-block group-data-[sidebar=brand]:inline-block"/>
                  </span>
                </div>
              </div>
              <div class="col-auto">
                <nav class="main-menu d-none d-lg-inline-block">
                  <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>

                    <li>
                      <a href="contact.html">Contact</a>
                    </li>
                  </ul>
                </nav>
              </div>
              <div class="col-auto d-flex gap-3">
                @if (Auth::check())
                <div class="header-button">
                    <a href="{{ route('dashboard') }}" class="th-btn shadow-none"
                      >Dashboard</a>
                  </div>
                @else
                <div class="header-button">
                    <a href="{{ route('login') }}" class="th-btn shadow-none"
                      >Login</a>
                  </div>
                  <div class="header-button">
                      <a href="{{ route('register') }}" class="th-btn shadow-none"
                        >Register<i class="fas fa-arrow-right ms-2"></i
                      ></a>
                    </div>
                @endif

              </div>

            </div>
          </div>
        </div>
      </div>
    </header>
    <!--==============================
Hero Area
==============================-->
    <div class="th-hero-wrapper hero-1" id="hero">
      <div class="hero-img tilt-active">
        <img src="{{asset('assets1/img/fkip3.png')}}" alt="Hero Image" />
      </div>
      <div class="container">
        <div class="hero-style1">
          <span class="hero-subtitle">Solusi untuk Penelitian anda</span>
          <h1 class="hero-title">Komisi Kode Etik</h1>
          <h1 class="hero-title">
            Yang <span class="text-theme fw-medium">Mudah & Efisien</span>
          </h1>
          <p class="hero-text">
            Komisi Etik Penelitian FKIP UNS hadir untuk memastikan bahwa
            setiap penelitian yang dilakukan di FKIP UNS menjunjung tinggi
            nilai-nilai etika dan menghasilkan temuan yang kredibel dan bermanfaat.
          </p>
        </div>
      </div>
      <div class="hero-shape1">
        <img src="{{asset('assets1/img/hero/hero_shape_1_1.svg')}}" alt="shape" />
      </div>
      <div class="hero-shape2">
        <img src="{{asset('assets1/img/hero/hero_shape_1_2.svg')}}" alt="shape" />
      </div>
      <div class="hero-shape3">
        <img src="{{asset('assets1/img/hero/hero_shape_1_3.svg')}}" alt="shape" />
      </div>
    </div>

    <!--======== / Hero Section ========--><!--==============================
Feature Area
==============================-->
    <section class="about-sec-v4 space-bottom">
      <div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-xl-4 col-md-6">
            <div class="feature-card">
              <div class="shape-icon">
                <img src="{{asset('assets1/img/icon/feature_card_1.png')}}" alt="icon" />
              </div>
              <h3 class="box-title">Layanan Pengelolaan Data</h3>
              <p class="feature-card_text">
                Kami mempermudah pengelolaan data akademis dengan sistem yang
                aman dan terintegrasi, memastikan data jurnal tersimpan dengan
                baik.
              </p>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="feature-card">
              <div class="shape-icon">
                <img src="{{asset('assets1/img/icon/feature_card_2.png')}}" alt="icon" />
              </div>
              <h3 class="box-title">Strategi & Konsultasi Evaluasi</h3>
              <p class="feature-card_text">
                Memberikan bimbingan dan strategi untuk membantu dosen dalam
                proses evaluasi jurnal, memastikan setiap langkah sesuai dengan
                standar akademis.
              </p>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="feature-card">
              <div class="shape-icon">
                <img src="{{asset('assets1/img/icon/feature_card_3.png')}}" alt="icon" />
              </div>
              <h3 class="box-title">Dukungan Kelas Dunia</h3>
              <p class="feature-card_text">
                Kami menyediakan layanan dukungan terbaik untuk memastikan
                setiap tahap evaluasi jurnal berjalan dengan lancar.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="container space-top">
        <div class="row align-items-center">
          <div class="col-lg-5 mb-30 mb-lg-0">
            <div class="img-box6">
              <div class="img1">
                <img src="{{asset('assets1/img/fkip1.jpg')}}" alt="About" />
              </div>
              <div class="shape1">
                <img src="{{asset('assets1/img/fkip2.jpg')}}" alt="About" />
              </div>
              <div class="color-animate"></div>
            </div>
          </div>
          <div class="col-lg-7 text-lg-start text-center">
            <div class="ps-xxl-5">
              <div class="title-area mb-35">
                <span class="sub-title">Tentang Platform</span>
                <h2 class="sec-title">
                  Mendukung Proses Evaluasi Jurnal Selama Bertahun-tahun.
                </h2>
              </div>
              <p class="mt-n2 mb-25">
                Kami menghadirkan solusi digital yang mempermudah dosen dalam
                mengajukan jurnal untuk evaluasi. Dengan integrasi teknologi
                yang efisien, kami membantu meningkatkan transparansi dan
                kecepatan proses persetujuan.
              </p>
              <div class="checklist style4 mb-40 list-center">
                <ul>
                  <li>
                    <img src="{{asset('assets1/img/icon/check_1.png')}}" alt="icon" />
                    Mempermudah pengajuan jurnal melalui sistem digital
                    terintegrasi
                  </li>
                  <li>
                    <img src="{{asset('assets1/img/icon/check_1.png')}}" alt="icon" />
                    Desain dan pengembangan aplikasi web untuk evaluasi yang
                    lebih efisien
                  </li>
                  <li>
                    <img src="{{asset('assets1/img/icon/check_1.png')}}" alt="icon" />
                    Pengalaman pengguna profesional untuk meningkatkan interaksi
                    akademik
                  </li>
                </ul>
              </div>
              <a href="about.html" class="th-btn"
                >TENTANG KAMI<i class="fa-regular fa-arrow-right ms-2"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--==============================
Infographic Area
==============================-->
    <section class="" id="se rvice-sec">
      <div class="round-container gr-bg3 space">
        <div class="container">
          <div class="row gy-40 justify-content-between space-bottom">
            <div class="col-6 col-lg-auto">
              <div class="counter-card">
                <div class="icon">
                  <img src="{{asset('assets1/img/icon/counter_2_1.png')}}" alt="Icon" />
                </div>
                <div class="media-body">
                  <h2 class="counter-card_number text-title">
                    <span class="counter-number">986</span>+
                  </h2>
                  <p class="counter-card_text text-body">Jurnal Disetujui</p>
                </div>
              </div>
            </div>

            <div class="col-6 col-lg-auto">
              <div class="counter-card">
                <div class="icon">
                  <img src="{{asset('assets1/img/icon/counter_2_3.png')}}" alt="Icon" />
                </div>
                <div class="media-body">
                  <h2 class="counter-card_number text-title">
                    <span class="counter-number">396</span>+
                  </h2>
                  <p class="counter-card_text text-body">User</p>
                </div>
              </div>
            </div>
            <div class="col-6 col-lg-auto">
              <div class="counter-card">
                <div class="icon">
                  <img src="{{asset('assets1/img/icon/counter_2_4.png')}}" alt="Icon" />
                </div>
                <div class="media-body">
                  <h2 class="counter-card_number text-title">
                    <span class="counter-number">496</span>+
                  </h2>
                  <p class="counter-card_text text-body">Jurnal Rilis</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--==============================
Process Area
==============================-->
<section class="space" id="process-sec">
    <div class="container">
      <div class="title-area text-center">
        <span class="sub-title">ALUR PENGAJUAN</span>
        <h2 class="sec-title">
          Proses Pengajuan Ethical Clearance di <span class="text-theme">KPPM FKIP UNS</span>
        </h2>
      </div>
      <div class="process-card-area">
        <div class="process-line position-top">
          <img src="{{ asset('assets1/img/bg/process_line_2.svg') }}" alt="line" />
        </div>
        <div class="row gy-40 justify-content-between">

          <!-- Step 1: Pendaftaran dan Pengajuan Protokol Ethical Clearance -->
          <div class="col-sm-6 col-xl-auto process-card-wrap">
            <div class="process-card">
              <div class="pulse"></div>
              <div class="process-card_icon">
                <img src="{{ asset('assets1/img/icon/process_box_1.png') }}" alt="icon" />
              </div>
              <h2 class="box-title">Pendaftaran dan Pengajuan Protokol Ethical Clearance</h2>
              <p class="process-card_text">
                Melakukan pendaftaran dan melengkapi informasi serta dokumen di aplikasi <strong>KPPM FKIP UNS</strong>.
              </p>
            </div>
          </div>

          <!-- Step 2: Reviu Data dan Kelengkapan Berkas -->
          <div class="col-sm-6 col-xl-auto process-card-wrap">
            <div class="process-card">
              <div class="pulse"></div>
              <div class="process-card_icon">
                <img src="{{ asset('assets1/img/icon/process_box_2.png') }}" alt="icon" />
              </div>
              <h2 class="box-title">Reviu Data dan Kelengkapan Berkas</h2>
              <p class="process-card_text">
                Pemohon dapat mengakses perkembangan proses reviu pada sistem.
              </p>
            </div>
          </div>

          <!-- Step 3: Pengumuman Hasil Reviu -->
          <div class="col-sm-6 col-xl-auto process-card-wrap">
            <div class="process-card">
              <div class="pulse"></div>
              <div class="process-card_icon">
                <img src="{{ asset('assets1/img/icon/process_box_3.png') }}" alt="icon" />
              </div>
              <h2 class="box-title">Pengumuman Hasil Reviu</h2>
              <p class="process-card_text">
                Hasil reviu diumumkan melalui sistem <strong>KPPM FKIP UNS</strong>.
              </p>
            </div>
          </div>

          <!-- Step 4: Dokumen Ethical Clearance dikirim -->
          <div class="col-sm-6 col-xl-auto process-card-wrap">
            <div class="process-card">
              <div class="pulse"></div>
              <div class="process-card_icon">
                <img src="{{ asset('assets1/img/icon/process_box_4.png') }}" alt="icon" />
              </div>
              <h2 class="box-title">Dokumen Ethical Clearance Dikirim</h2>
              <p class="process-card_text">
                Dokumen Ethical Clearance akan dikirim kepada pemohon setelah semua tahapan selesai.
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>


    <!--==============================
Price Area
==============================-->
<section class="pricing-section">
    <div class="container">
      <h2 class="text-center fw-bold">Biaya Pengajuan</h2>
      <p class="text-center">
        Biaya Administrasi dapat dilakukan melalui setoran tunai teller atau transfer internet banking / ATM ke No rekening Universitas Negeri Sebelas Maret (KEP Universitas Negeri Sebelas Maret) 9888855513810001.
      </p>
      <div class="row gy-4 justify-content-center">
        <!-- Universitas Negeri Sebelas Maret (UNS) - Mahasiswa -->
        <div class="col-xl-3 col-md-6">
          <div class="price-box style2 th-ani">
            <div class="price-title-wrap">
              <div class="media-body">
                <p class="subtitle">Universitas Negeri Sebelas Maret (UNS)</p>
                <h3 class="box-title">Mahasiswa</h3>
              </div>
            </div>
            <h4 class="price-box_price">IDR 100.000</h4>
            <p class="price-box_text">Biaya pengajuan untuk mahasiswa internal UNS.</p>
          </div>
        </div>

        <!-- Universitas Negeri Sebelas Maret (UNS) - Dosen -->
        <div class="col-xl-3 col-md-6">
          <div class="price-box style2 th-ani">
            <div class="price-title-wrap">
              <div class="media-body">
                <p class="subtitle">Universitas Negeri Sebelas Maret (UNS)</p>
                <h3 class="box-title">Dosen</h3>
              </div>
            </div>
            <h4 class="price-box_price">IDR 200.000</h4>
            <p class="price-box_text">Biaya pengajuan untuk dosen internal UNS.</p>
          </div>
        </div>

        <!-- External (Luar UNS) - Mahasiswa -->
        <div class="col-xl-3 col-md-6">
          <div class="price-box style2 th-ani">
            <div class="price-title-wrap">
              <div class="media-body">
                <p class="subtitle">External (Luar UNS)</p>
                <h3 class="box-title">Mahasiswa</h3>
              </div>
            </div>
            <h4 class="price-box_price">IDR 150.000</h4>
            <p class="price-box_text">Biaya pengajuan untuk mahasiswa eksternal.</p>
          </div>
        </div>

        <!-- External (Luar UNS) - Dosen/Peneliti -->
        <div class="col-xl-3 col-md-6">
          <div class="price-box style2 th-ani">
            <div class="price-title-wrap">
              <div class="media-body">
                <p class="subtitle">External (Luar UNS)</p>
                <h3 class="box-title">Dosen/Peneliti</h3>
              </div>
            </div>
            <h4 class="price-box_price">IDR 300.000</h4>
            <p class="price-box_text">Biaya pengajuan untuk dosen/peneliti eksternal.</p>
          </div>
        </div>
      </div>
    </div>
  </section>



    <!--==============================
	Footer Area
==============================-->
    <footer class="footer-wrapper footer-layout2 bg-transparent">
      <div class="widget-area">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-md-6 col-xxl-3 col-xl-4">
              <div class="widget footer-widget">
                <div class="th-widget-about">
                  <div class="about-logo">
                    <a href="index.html"
                      ><img src="{{asset('assets/images/logo-fkip-uns-fkip.png')}}" alt="Webteck"
                    /></a>
                  </div>
                  <p class="about-text">
                    Professionally redefine transparent ROI through low-risk
                    high-yield imperatives. Progressively create empowered. cost
                    effective users via team driven.
                  </p>
                  <div class="th-social">
                    <a href="https://www.facebook.com/"
                      ><i class="fab fa-facebook-f"></i
                    ></a>
                    <a href="https://www.twitter.com/"
                      ><i class="fab fa-twitter"></i
                    ></a>
                    <a href="https://www.linkedin.com/"
                      ><i class="fab fa-linkedin-in"></i
                    ></a>
                    <a href="https://www.whatsapp.com/"
                      ><i class="fab fa-whatsapp"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-auto">
              <div class="widget widget_nav_menu footer-widget">
                <h3 class="widget_title">Quick Links</h3>
                <div class="menu-all-pages-container">
                  <ul class="menu">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="team.html">Meet Our Team</a></li>
                    <li><a href="project.html">Our Projects</a></li>
                    <li><a href="faq.html">Help & FAQs</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-auto">
              <div class="widget footer-widget">
                <h3 class="widget_title">Contact Us</h3>
                <div class="th-widget-contact">
                  <div class="contact-feature">
                    <div class="icon-btn">
                      <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="media-body">
                      <p class="contact-feature_label">Phone Number</p>
                      <a href="tel:+19088000393" class="contact-feature_link"
                        >+190-8800-0393</a
                      >
                    </div>
                  </div>
                  <div class="contact-feature">
                    <div class="icon-btn">
                      <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="media-body">
                      <p class="contact-feature_label">Email address</p>
                      <a
                        href="mailto:info@webteck.com"
                        class="contact-feature_link"
                        >info@webteck.com</a
                      >
                    </div>
                  </div>
                  <div class="contact-feature">
                    <div class="icon-btn">
                      <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="media-body">
                      <p class="contact-feature_label">office location</p>
                      <a
                        href="https://www.google.com/maps"
                        class="contact-feature_link"
                        >54 Flemington, USA</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="copyright-wrap bg-theme">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
              <p class="copyright-text">
                Copyright <i class="fal fa-copyright"></i> 2024
                FKIP.
                All Rights Reserved.
              </p>
            </div>
            <div class="col-lg-6 text-end d-none d-lg-block">
              <div class="footer-links">
                <ul>
                  <li><a href="about.html">Terms & Condition</a></li>
                  <li><a href="about.html">Careers</a></li>
                  <li><a href="about.html">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shape-mockup" data-top="0%" data-left="0%">
        <img src="{{asset('assets1/img/shape/footer_shape_3.png')}}" alt="shape" />
      </div>
      <div class="shape-mockup" data-top="0%" data-right="0%">
        <img src="{{asset('assets1/img/shape/footer_shape_4.png')}}" alt="shape" />
      </div>
      <div class="shape-mockup" data-bottom="0%" data-left="0%">
        <img src="{{asset('assets1/img/shape/footer_shape_5.png')}}" alt="shape" />
      </div>
      <div class="shape-mockup" data-bottom="0%" data-right="0%">
        <img src="{{asset('assets1/img/shape/footer_shape_6.png')}}" alt="shape" />
      </div>
    </footer>

    <div class="body-particle" id="body-particle"></div>



    <!-- Scroll To Top -->
    <div class="scroll-top">
      <svg
        class="progress-circle svg-content"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102"
      >
        <path
          d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
          style="
            transition: stroke-dashoffset 10ms linear 0s;
            stroke-dasharray: 307.919, 307.919;
            stroke-dashoffset: 307.919;
          "
        ></path>
      </svg>
    </div>

    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <div class="swiper-slide swiper-slide-active" role="group" aria-label="3 / 5" style="width: 500px; margin-right: 24px;" data-swiper-slide-index="2">
                <div class="service-grid">
                    <div class="service-grid_icon">
                        <img src="{{asset('assets1/img/icon/service_card_3.svg')}}" alt="Maintenance Icon">
                    </div>
                    <div class="service-grid_content">
                        <h3 class="box-title">
                            <a href="">🚧 Scheduled Maintenance Alert 🚧</a>
                        </h3>
                        <p class="service-grid_text">
                            Our website is scheduled for maintenance to improve your experience.
                            Maintenance will begin soon, and we apologize for any inconvenience this may cause.
                            Thank you for your understanding and patience.
                            <br>
                            <span id="maintenance-start">Start: --</span>
                            <br>
                            <span id="maintenance-finish">Finish: --</span>
                            <br>
                            <span id="countdown">
                                Countdown: --
                            </span>
                        </p>

                        <div class="bg-shape">
                            <img src="{{asset('assets1/img/bg/service_grid_bg.png')}}" alt="Maintenance Background">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


<!-- jQuery -->
<script src="{{ asset('assets1/js/vendor/jquery-3.7.1.min.js') }}"></script>
<!-- Swiper Slider -->
<script src="{{ asset('assets1/js/swiper-bundle.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets1/js/bootstrap.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('assets1/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Counter Up -->
<script src="{{ asset('assets1/js/jquery.counterup.min.js') }}"></script>
<!-- Circle Progress -->
<script src="{{ asset('assets1/js/circle-progress.js') }}"></script>
<!-- Range Slider -->
<script src="{{ asset('assets1/js/jquery-ui.min.js') }}"></script>
<!-- Isotope Filter -->
<script src="{{ asset('assets1/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets1/js/isotope.pkgd.min.js') }}"></script>
<!-- Tilt JS -->
<script src="{{ asset('assets1/js/tilt.jquery.min.js') }}"></script>

<!-- GSAP -->
<script src="{{ asset('assets1/js/gsap.min.js') }}"></script>
<!-- ScrollTrigger -->
<script src="{{ asset('assets1/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('assets1/js/smooth-scroll.js') }}"></script>

<script src="{{ asset('assets1/js/particles-config.js') }}"></script>
<!-- Main JS File -->
<script src="{{ asset('assets1/js/main.js') }}"></script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
    fetch('{{ route('maintenance.check') }}', {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Debugging respons di konsol
        if (data.show_modal) {
            const maintenanceModal = document.querySelector('.popup-search-box');
            maintenanceModal.querySelector('#maintenance-start').innerText = `Start: ${data.maintenance_start}`;
            maintenanceModal.querySelector('#maintenance-finish').innerText = `Finish: ${data.maintenance_finish}`;
            maintenanceModal.classList.remove('d-none');
            maintenanceModal.classList.add('show');

            //Countdown
            const countdownElement = maintenanceModal.querySelector('#countdown');
            const maintenanceStart = new Date(data.maintenance_start).getTime();

            const timer = setInterval(() => {
                const now = new Date().getTime();
                const distance = maintenanceStart - now;

                if (distance <= 0) {
                    clearInterval(timer);
                    countdownElement.innerText = "Maintenance has started!";
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdownElement.innerText = `Countdown: ${days}d ${hours}h ${minutes}m ${seconds}s`;
            }, 1000);
        }
    })
    .catch(error => {
        console.error('Error fetching maintenance status:', error);
    });

    // Event untuk menutup modal
    document.querySelector('.searchClose').addEventListener('click', function () {
        const maintenanceModal = document.querySelector('.popup-search-box');
        maintenanceModal.classList.remove('show');
    });
});
</script>


  </body>



</html>

