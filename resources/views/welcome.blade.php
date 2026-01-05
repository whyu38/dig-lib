<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistem Perpustakaan Digital</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap');

    :root {
      --primary: #2c3e50;
      --secondary: #3498db;
      --accent: #e74c3c;
      --light: #ecf0f1;
      --dark: #1a252f;
      --success: #27ae60;
      --gold: #f1c40f;
      --gradient: linear-gradient(135deg, #4b79a1 0%, #283e51 100%);
      --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s ease;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body, html {
      height: 100%;
      font-family: 'Montserrat', sans-serif;
      color: var(--dark);
      background-color: #f9f9f9;
      scroll-behavior: smooth;
      line-height: 1.6;
    }

    h1, h2, h3, h4 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      line-height: 1.2;
    }

    /* Navigation */
    nav {
      background-color: rgba(26, 37, 47, 0.95);
      padding: 18px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .logo {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      font-weight: 700;
      color: white;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo i {
      color: var(--gold);
    }

    .nav-links {
      display: flex;
      gap: 25px;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      padding: 10px 18px;
      border-radius: 25px;
      transition: var(--transition);
      font-size: 1rem;
      position: relative;
    }

    nav a:hover,
    nav a:focus {
      background-color: var(--secondary);
      color: white;
      outline: none;
    }

    nav a.active {
      background-color: var(--accent);
      color: white;
    }

    .mobile-toggle {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
    }

    /* Hero Section */
    .hero {
      min-height: 100vh;
      display: flex;
      align-items: center;
      background: var(--gradient);
      color: white;
      padding: 100px 40px 60px;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
    }

    .hero-content {
      max-width: 800px;
      margin: 0 auto;
      text-align: center;
      z-index: 1;
      position: relative;
    }

    .hero h1 {
      font-size: 3.5rem;
      margin-bottom: 20px;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      animation: fadeInDown 1s ease forwards;
    }

    .hero p {
      font-size: 1.3rem;
      margin-bottom: 30px;
      opacity: 0.9;
      animation: fadeInUp 1s ease forwards;
      animation-delay: 0.3s;
    }

    .hero-btns {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 40px;
      flex-wrap: wrap;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 16px 34px;
      font-size: 1.1rem;
      font-weight: 700;
      border-radius: 50px;
      cursor: pointer;
      text-decoration: none;
      transition: var(--transition);
      border: none;
      box-shadow: var(--shadow);
    }

    .btn-primary {
      background-color: var(--accent);
      color: white;
    }

    .btn-primary:hover {
      background-color: #c0392b;
      transform: translateY(-3px);
      box-shadow: 0 15px 25px rgba(231, 76, 60, 0.3);
    }

    .btn-secondary {
      background-color: transparent;
      color: white;
      border: 2px solid white;
    }

    .btn-secondary:hover {
      background-color: white;
      color: var(--primary);
      transform: translateY(-3px);
    }

    /* Why Choose Us */
    .section {
      padding: 100px 40px;
    }

    .section-title {
      text-align: center;
      margin-bottom: 60px;
    }

    .section-title h2 {
      font-size: 2.8rem;
      color: var(--primary);
      margin-bottom: 15px;
      position: relative;
      display: inline-block;
    }

    .section-title h2::after {
      content: "";
      position: absolute;
      width: 80px;
      height: 4px;
      background: var(--accent);
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 2px;
    }

    .section-title p {
      font-size: 1.2rem;
      color: #666;
      max-width: 700px;
      margin: 0 auto;
    }

    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      margin-top: 50px;
    }

    .feature-card {
      background: white;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: var(--shadow);
      text-align: center;
      transition: var(--transition);
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
      width: 80px;
      height: 80px;
      background: var(--gradient);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 25px;
      color: white;
      font-size: 2rem;
    }

    .feature-card h3 {
      font-size: 1.5rem;
      margin-bottom: 15px;
      color: var(--primary);
    }

    .feature-card p {
      color: #666;
    }

    /* Search Section */
    .search-section {
      background-color: var(--light);
    }

    .search-container {
      max-width: 800px;
      margin: 0 auto;
      background: white;
      padding: 50px;
      border-radius: 20px;
      box-shadow: var(--shadow);
    }

    .search-box {
      display: flex;
      gap: 10px;
      margin-top: 30px;
    }

    .search-input {
      flex: 1;
      padding: 18px 25px;
      border: 2px solid #ddd;
      border-radius: 50px;
      font-size: 1.1rem;
      transition: var(--transition);
    }

    .search-input:focus {
      border-color: var(--secondary);
      outline: none;
    }

    .search-btn {
      padding: 18px 35px;
      background: var(--secondary);
      color: white;
      border: none;
      border-radius: 50px;
      font-weight: 700;
      cursor: pointer;
      transition: var(--transition);
    }

    .search-btn:hover {
      background-color: #2980b9;
      transform: scale(1.05);
    }

    .search-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 20px;
      justify-content: center;
    }

    .tag {
      background-color: #e8f4fc;
      color: var(--secondary);
      padding: 8px 16px;
      border-radius: 50px;
      font-size: 0.9rem;
      transition: var(--transition);
      cursor: pointer;
    }

    .tag:hover {
      background-color: var(--secondary);
      color: white;
    }

    /* Facilities */
    .facilities {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }

    .facility-card {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: var(--transition);
    }

    .facility-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .facility-img {
      height: 200px;
      background-color: var(--secondary);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 3rem;
    }

    .facility-content {
      padding: 25px;
    }

    .facility-content h3 {
      font-size: 1.4rem;
      margin-bottom: 10px;
      color: var(--primary);
    }

    /* CTA */
    .cta-section {
      background: var(--gradient);
      color: white;
      text-align: center;
    }

    .cta-section .section-title h2,
    .cta-section .section-title p {
      color: white;
    }

    .cta-section .section-title h2::after {
      background: var(--gold);
    }

    .cta-btns {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 40px;
      flex-wrap: wrap;
    }

    /* Footer */
    footer {
      background-color: var(--dark);
      color: white;
      padding: 70px 40px 30px;
    }

    .footer-content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
      margin-bottom: 40px;
    }

    .footer-column h3 {
      font-size: 1.4rem;
      margin-bottom: 25px;
      position: relative;
      padding-bottom: 10px;
    }

    .footer-column h3::after {
      content: "";
      position: absolute;
      width: 50px;
      height: 3px;
      background: var(--accent);
      bottom: 0;
      left: 0;
    }

    .footer-links {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 12px;
    }

    .footer-links a {
      color: #bbb;
      text-decoration: none;
      transition: var(--transition);
    }

    .footer-links a:hover {
      color: white;
      padding-left: 5px;
    }

    .social-icons {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-icons a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      color: white;
      transition: var(--transition);
    }

    .social-icons a:hover {
      background: var(--accent);
      transform: translateY(-3px);
    }

    .copyright {
      text-align: center;
      padding-top: 30px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      color: #aaa;
      font-size: 0.9rem;
    }

    /* Animations */
    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive */
    @media (max-width: 992px) {
      .hero h1 {
        font-size: 2.8rem;
      }
      
      .section-title h2 {
        font-size: 2.4rem;
      }
    }

    @media (max-width: 768px) {
      nav {
        padding: 15px 20px;
      }
      
      .nav-links {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: var(--dark);
        flex-direction: column;
        padding: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      }
      
      .nav-links.active {
        display: flex;
      }
      
      .mobile-toggle {
        display: block;
      }
      
      .hero-btns, .cta-btns {
        flex-direction: column;
        align-items: center;
      }
      
      .btn {
        width: 100%;
        max-width: 300px;
      }
      
      .search-box {
        flex-direction: column;
      }
      
      .search-input, .search-btn {
        width: 100%;
        border-radius: 50px;
      }
    }

    @media (max-width: 576px) {
      .hero, .section {
        padding: 80px 20px;
      }
      
      .hero h1 {
        font-size: 2.2rem;
      }
      
      .section-title h2 {
        font-size: 2rem;
      }
      
      .search-container {
        padding: 30px 20px;
      }
    }

    /* Additional styling for visual appeal */
    .stats {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin-top: 60px;
      flex-wrap: wrap;
    }

    .stat-item {
      text-align: center;
    }

    .stat-number {
      font-size: 3rem;
      font-weight: 800;
      color: var(--accent);
      display: block;
    }

    .stat-label {
      font-size: 1.1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .floating {
      animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav>
    <div class="logo">
      <i class="fas fa-book-open"></i>
      <span>PerpustakaanDigital</span>
    </div>
    <button class="mobile-toggle" id="mobileToggle">
      <i class="fas fa-bars"></i>
    </button>
    <div class="nav-links" id="navLinks">
      <a href="#hero" class="active">Beranda</a>
      <a href="#why">Fitur</a>
      <a href="#search">Pencarian</a>
      <a href="#facilities">Fasilitas</a>
      <a href="{{ route('books.index') }}">Buku</a>
      <a href="{{ route('customers.index') }}">Customer</a>
      <a href="{{ route('borrowings.index') }}">Peminjaman</a>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero" id="hero">
    <div class="hero-content">
      <h1>Selamat Datang di Sistem Perpustakaan Digital</h1>
      <p>Kelola koleksi buku, anggota, dan peminjaman dengan sistem yang modern, efisien, dan mudah digunakan. Akses ribuan buku digital dan fisik dengan satu klik.</p>
      <div class="stats">
        <div class="stat-item">
          <span class="stat-number" data-count="12500">0</span>
          <span class="stat-label">Judul Buku</span>
        </div>
        <div class="stat-item">
          <span class="stat-number" data-count="3500">0</span>
          <span class="stat-label">Anggota Aktif</span>
        </div>
        <div class="stat-item">
          <span class="stat-number" data-count="98">0</span>
          <span class="stat-label">% Kepuasan</span>
        </div>
      </div>
      <div class="hero-btns">
        <a href="{{ route('books.index') }}" class="btn btn-primary">
          <i class="fas fa-book"></i> Jelajahi Koleksi
        </a>
        <a href="#why" class="btn btn-secondary">
          <i class="fas fa-info-circle"></i> Pelajari Lebih Lanjut
        </a>
      </div>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="section" id="why">
    <div class="section-title">
      <h2>Mengapa Memilih Sistem Kami?</h2>
      <p>Kami menawarkan solusi perpustakaan digital terintegrasi dengan fitur-fitur canggih untuk pengalaman yang lebih baik</p>
    </div>
    <div class="features">
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-bolt"></i>
        </div>
        <h3>Proses Cepat</h3>
        <p>Peminjaman dan pengembalian buku dapat dilakukan dalam hitungan detik dengan sistem otomatis kami.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-search"></i>
        </div>
        <h3>Pencarian Cerdas</h3>
        <p>Temukan buku yang Anda butuhkan dengan cepat menggunakan sistem pencarian canggih dengan filter yang lengkap.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-user-friends"></i>
        </div>
        <h3>Manajemen Anggota</h3>
        <p>Kelola data anggota dengan mudah, termasuk riwayat peminjaman, preferensi, dan status keanggotaan.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <h3>Analitik Lengkap</h3>
        <p>Dapatkan laporan dan statistik detail tentang penggunaan perpustakaan untuk pengambilan keputusan yang lebih baik.</p>
      </div>
    </div>
  </section>

  <!-- Search Section -->
  <section class="section search-section" id="search">
    <div class="section-title">
      <h2>Cari Buku Favorit Anda</h2>
      <p>Temukan buku yang tepat dari koleksi kami yang luas dengan sistem pencarian yang intuitif</p>
    </div>
    <div class="search-container">
      <div class="search-box">
        <input type="text" class="search-input" placeholder="Masukkan judul, penulis, atau kata kunci...">
        <button class="search-btn">
          <i class="fas fa-search"></i> Cari Buku
        </button>
      </div>
      <div class="search-tags">
        <span class="tag">Fiksi</span>
        <span class="tag">Non-Fiksi</span>
        <span class="tag">Sains</span>
        <span class="tag">Teknologi</span>
        <span class="tag">Sejarah</span>
        <span class="tag">Seni</span>
      </div>
    </div>
  </section>

  <!-- Facilities -->
  <section class="section" id="facilities">
    <div class="section-title">
      <h2>Fasilitas Perpustakaan</h2>
      <p>Nikmati berbagai fasilitas yang kami sediakan untuk kenyamanan dan kemudahan Anda</p>
    </div>
    <div class="facilities">
      <div class="facility-card">
        <div class="facility-img">
          <i class="fas fa-book-reader floating"></i>
        </div>
        <div class="facility-content">
          <h3>Ruang Baca Nyaman</h3>
          <p>Ruang baca dengan pencahayaan optimal, kursi ergonomis, dan suasana tenang untuk membaca yang nyaman.</p>
        </div>
      </div>
      <div class="facility-card">
        <div class="facility-img">
          <i class="fas fa-laptop-house floating"></i>
        </div>
        <div class="facility-content">
          <h3>Akses Digital 24/7</h3>
          <p>Akses koleksi buku digital kapan saja dan di mana saja melalui platform online kami.</p>
        </div>
      </div>
      <div class="facility-card">
        <div class="facility-img">
          <i class="fas fa-users floating"></i>
        </div>
        <div class="facility-content">
          <h3>Ruang Diskusi</h3>
          <p>Fasilitas ruang diskusi untuk klub buku, presentasi, dan kegiatan kelompok lainnya.</p>
        </div>
      </div>
      <div class="facility-card">
        <div class="facility-img">
          <i class="fas fa-print floating"></i>
        </div>
        <div class="facility-content">
          <h3>Layanan Cetak & Scan</h3>
          <p>Layanan cetak, fotokopi, dan scan dokumen dengan kualitas terbaik.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section cta-section" id="cta">
    <div class="section-title">
      <h2>Siap Bergabung dengan Kami?</h2>
      <p>Daftarkan diri Anda sekarang dan nikmati semua fasilitas yang tersedia di perpustakaan digital kami</p>
    </div>
    <div class="cta-btns">
      <a href="{{ route('customers.index') }}" class="btn btn-primary">
        <i class="fas fa-user-plus"></i> Daftar Menjadi Anggota
      </a>
      <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">
        <i class="fas fa-book"></i> Lihat Peminjaman
      </a>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div class="footer-column">
        <h3>PerpustakaanDigital</h3>
        <p>Sistem manajemen perpustakaan terintegrasi yang modern dan efisien untuk pengelolaan koleksi buku, anggota, dan peminjaman.</p>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="footer-column">
        <h3>Tautan Cepat</h3>
        <ul class="footer-links">
          <li><a href="#hero">Beranda</a></li>
          <li><a href="#why">Fitur</a></li>
          <li><a href="#search">Pencarian</a></li>
          <li><a href="#facilities">Fasilitas</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Layanan</h3>
        <ul class="footer-links">
          <li><a href="{{ route('books.index') }}">Katalog Buku</a></li>
          <li><a href="{{ route('customers.index') }}">Manajemen Anggota</a></li>
          <li><a href="{{ route('borrowings.index') }}">Peminjaman</a></li>
          <li><a href="#cta">Daftar Anggota</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Kontak Kami</h3>
        <ul class="footer-links">
          <li><i class="fas fa-map-marker-alt"></i> Jl. Perpustakaan No. 123, Jakarta</li>
          <li><i class="fas fa-phone"></i> (021) 555-7890</li>
          <li><i class="fas fa-envelope"></i> info@perpustakaandigital.id</li>
          <li><i class="fas fa-clock"></i> Buka Setiap Hari: 08.00 - 20.00</li>
        </ul>
      </div>
    </div>
    <div class="copyright">
      &copy; 2023 Sistem Perpustakaan Digital. Hak Cipta Dilindungi.
    </div>
  </footer>

  <script>
    // Mobile Navigation Toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const navLinks = document.getElementById('navLinks');
    
    mobileToggle.addEventListener('click', () => {
      navLinks.classList.toggle('active');
      mobileToggle.innerHTML = navLinks.classList.contains('active') 
        ? '<i class="fas fa-times"></i>' 
        : '<i class="fas fa-bars"></i>';
    });
    
    // Close mobile menu when clicking a link
    document.querySelectorAll('.nav-links a').forEach(link => {
      link.addEventListener('click', () => {
        navLinks.classList.remove('active');
        mobileToggle.innerHTML = '<i class="fas fa-bars"></i>';
      });
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        if(targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if(targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 80,
            behavior: 'smooth'
          });
        }
      });
    });
    
    // Animate stats counter
    const animateStats = () => {
      const statNumbers = document.querySelectorAll('.stat-number');
      
      statNumbers.forEach(stat => {
        const target = parseInt(stat.getAttribute('data-count'));
        const duration = 2000; // 2 seconds
        const step = target / (duration / 16); // 60fps
        let current = 0;
        
        const timer = setInterval(() => {
          current += step;
          if(current >= target) {
            current = target;
            clearInterval(timer);
          }
          stat.textContent = Math.floor(current).toLocaleString();
        }, 16);
      });
    };
    
    // Trigger stats animation when in viewport
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if(entry.isIntersecting) {
          animateStats();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    
    observer.observe(document.querySelector('.stats'));
    
    // Active nav link on scroll
    const sections = document.querySelectorAll('section');
    const navLinksAll = document.querySelectorAll('.nav-links a');
    
    window.addEventListener('scroll', () => {
      let current = '';
      
      sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        if(pageYOffset >= sectionTop - 100) {
          current = section.getAttribute('id');
        }
      });
      
      navLinksAll.forEach(link => {
        link.classList.remove('active');
        if(link.getAttribute('href') === `#${current}`) {
          link.classList.add('active');
        }
      });
    });
    
    // Search functionality
    const searchInput = document.querySelector('.search-input');
    const searchBtn = document.querySelector('.search-btn');
    const searchTags = document.querySelectorAll('.tag');
    
    searchBtn.addEventListener('click', () => {
      const query = searchInput.value.trim();
      if(query) {
        alert(`Mencari: "${query}"\n\nFitur pencarian ini akan diintegrasikan dengan backend untuk mencari buku di database.`);
      } else {
        alert('Silakan masukkan kata kunci pencarian.');
      }
    });
    
    searchInput.addEventListener('keypress', (e) => {
      if(e.key === 'Enter') {
        searchBtn.click();
      }
    });
    
    searchTags.forEach(tag => {
      tag.addEventListener('click', () => {
        searchInput.value = tag.textContent;
      });
    });
  </script>
</body>
</html>