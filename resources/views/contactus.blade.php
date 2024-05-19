<!-- resources/views/team.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/stylesAuthor.css') }}" rel="stylesheet" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Kelompok 8</title>
</head>
<body>
  <div class="person" style="--color: #ff4162">
    <div class="container">
      <div class="container-inner">
        <div class="circle"></div>
        <img src="{{ asset('images/author/image-1.png') }}" alt="Angel Viona">
      </div>
    </div>
    <div class="divider"></div>
    <h1>Angel Viona</h1>
    <p>
      <a href="https://www.instagram.com/angelvtbg" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/+6285261079546" target="_blank"><i class="fab fa-whatsapp"></i></a>
      <a href="mailto:angelvtbg@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a>
    </p>
  </div>

  <div class="person" style="--color:#A6855C">
    <div class="container">
      <div class="container-inner">
        <div class="circle"></div>
        <img src="{{ asset('images/author/image-2.png') }}" alt="Gabriel Arthur">
      </div>
    </div>
    <div class="divider"></div>
    <h1>Gabriel</h1>
    <p>
      <a href="https://www.instagram.com/_ngabby" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/+6282142446325" target="_blank"><i class="fab fa-whatsapp"></i></a>
      <a href="mailto:idogabriel2@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a>
    </p>
  </div>

  <div class="person" style="--color: #784b84">
    <div class="container">
      <div class="container-inner">
        <div class="circle"></div>
        <img src="{{ asset('images/author/image-5.png') }}" alt="Rizna Inda">
      </div>
    </div>
    <div class="divider"></div>
    <h1>Rizna Inda</h1>
    <p>
      <a href="https://www.instagram.com/riznav_" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/+6282363789131" target="_blank"><i class="fab fa-whatsapp"></i></a>
      <a href="mailto:rizna275@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a>
    </p>
  </div>

  <div class="person" style="--color: #37375e">
    <div class="container">
      <div class="container-inner">
        <div class="circle"></div>
        <img src="{{ asset('images/author/image-6.png') }}" alt="Fatima Zahra">
      </div>
    </div>
    <div class="divider"></div>
    <h1>Fatimah Zahra</h1>
    <p>
      <a href="https://www.instagram.com/aazzaahhrraaa" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/+6295400652541" target="_blank"><i class="fab fa-whatsapp"></i></a>
      <a href="mailto:fatimahazzahra0655@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a>
    </p>
  </div>

    <!-- Tombol untuk kembali ke halaman utama -->
    <x-nav-link :href="url('/')" :active="request()->is('/')">
      {{ __('Home') }}
  </x-nav-link>

</body>
</html>
