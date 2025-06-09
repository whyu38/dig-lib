<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistem Perpustakaan</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

    * {
      box-sizing: border-box;
    }
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(135deg, #4b79a1, #283e51);
      color: #fff;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    nav {
      background-color: rgba(0,0,0,0.3);
      padding: 15px 40px;
      display: flex;
      justify-content: flex-end;
      gap: 25px;
      backdrop-filter: blur(10px);
    }
    nav a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      padding: 10px 18px;
      border-radius: 25px;
      transition: background-color 0.3s, color 0.3s;
      font-size: 1.1rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    }
    nav a:hover,
    nav a:focus {
      background-color: #fff;
      color: #283e51;
      outline: none;
      box-shadow: 0 4px 12px rgba(255,255,255,0.7);
    }
    .container {
      flex-grow: 1;
      max-width: 800px;
      margin: auto;
      text-align: center;
      padding: 0 20px;
    }
    h1 {
      font-size: 3.2rem;
      margin-bottom: 20px;
      letter-spacing: 1.5px;
      text-shadow: 0 2px 8px rgba(0,0,0,0.4);
      animation: fadeInDown 1s ease forwards;
      opacity: 0;
    }
    p {
      font-size: 1.3rem;
      margin-bottom: 15px;
      line-height: 1.5;
      color: #d1d9e6;
      animation: fadeInUp 1s ease forwards;
      opacity: 0;
    }
    p:nth-child(2) {
      animation-delay: 0.3s;
    }
    p:nth-child(3) {
      animation-delay: 0.6s;
    }
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
    .btn-group {
      margin-top: 40px;
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }
    .btn {
      background-color: #ff6f61;
      color: white;
      padding: 14px 32px;
      font-size: 1.1rem;
      font-weight: 700;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      text-decoration: none;
      box-shadow: 0 6px 12px rgba(255,111,97,0.5);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      user-select: none;
      display: inline-block;
    }
    .btn:hover,
    .btn:focus {
      background-color: #ff3b2e;
      box-shadow: 0 8px 20px rgba(255,59,46,0.7);
      outline: none;
    }
    @media (max-width: 600px) {
      h1 {
        font-size: 2.4rem;
      }
      p {
        font-size: 1rem;
      }
      .btn {
        padding: 12px 24px;
        font-size: 1rem;
      }
      nav {
        justify-content: center;
        gap: 15px;
      }
    }
  </style>
</head>
<body>

<nav>
  <a href="{{ route('books.index') }}">Buku</a>
  <a href="{{ route('customers.index') }}">Customer</a>
  <a href="{{ route('borrowings.index') }}">Peminjaman</a>
</nav>

<div class="container" role="main" aria-label="Welcome Section">
  <h1>Selamat Datang di Sistem Perpustakaan</h1>
  <p>Kelola data Buku, Customer, dan Peminjaman dengan mudah dan efisien.</p>
  <p>Gunakan navigasi di atas untuk mengakses fitur yang tersedia.</p>

  <div class="btn-group" role="navigation" aria-label="Main navigation buttons">
    <a href="{{ route('books.index') }}" class="btn" role="button">Lihat Buku</a>
    <a href="{{ route('customers.index') }}" class="btn" role="button">Lihat Customer</a>
    <a href="{{ route('borrowings.index') }}" class="btn" role="button">Lihat Peminjaman</a>
  </div>
</div>

</body>
</html>
