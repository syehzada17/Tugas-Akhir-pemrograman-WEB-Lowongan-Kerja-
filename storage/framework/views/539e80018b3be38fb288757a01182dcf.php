<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Job Portal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    font-family:Segoe UI,sans-serif;
}

.hero{
    min-height:100vh;
    display:flex;
    align-items:center;
    background:linear-gradient(135deg,#0d6efd,#6610f2,#20c997);
    color:white;
}

.feature-card{
    transition:.3s;
    border:none;
    border-radius:20px;
}

.feature-card:hover{
    transform:translateY(-10px);
    box-shadow:0 15px 35px rgba(0,0,0,.2);
}

.stat-card{
    border-radius:18px;
}

.clock-box{
    display:inline-block;
    padding:12px 25px;
    border-radius:15px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(8px);
    margin-top:20px;
}

footer{
    background:#111827;
}

</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

<div class="container">

<a class="navbar-brand fw-bold fs-3" href="/">
💼 JOB PORTAL
</a>

<div class="ms-auto">

<?php if(auth()->guard()->check()): ?>

<a href="<?php echo e(route('dashboard')); ?>" class="btn btn-warning fw-bold">
Dashboard
</a>

<?php else: ?>

<a href="<?php echo e(route('login')); ?>" class="btn btn-outline-light me-2">
Login
</a>

<a href="<?php echo e(route('register')); ?>" class="btn btn-warning">
Register
</a>

<?php endif; ?>

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-7">

<h1 class="display-3 fw-bold">
Temukan Pekerjaan Impian Anda
</h1>

<p class="lead mt-4">
Job Portal merupakan aplikasi berbasis Laravel yang membantu pelamar menemukan pekerjaan serta memudahkan admin mengelola data perusahaan dan lowongan kerja.
</p>

<div class="mt-4">

<?php if(auth()->guard()->check()): ?>

<a href="<?php echo e(route('dashboard')); ?>" class="btn btn-light btn-lg px-4">
Masuk Dashboard
</a>

<?php else: ?>

<a href="<?php echo e(route('login')); ?>" class="btn btn-light btn-lg px-4 me-2">
Login
</a>

<a href="<?php echo e(route('register')); ?>" class="btn btn-warning btn-lg px-4">
Register
</a>

<?php endif; ?>

</div>

<div class="clock-box">

<h5 id="tanggal"></h5>

<h2 id="jam" class="fw-bold"></h2>

</div>

</div>

<div class="col-lg-5 text-center">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
width="330"
class="img-fluid">

</div>

</div>

</div>

</section>

<section class="py-5 bg-light">

<div class="container">

<div class="row text-center">

<div class="col-md-4 mb-4">

<div class="card stat-card shadow">

<div class="card-body">

<h1>🏢</h1>

<h3>Perusahaan</h3>

<p>Kelola data perusahaan secara cepat dan aman.</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card stat-card shadow">

<div class="card-body">

<h1>💼</h1>

<h3>Lowongan</h3>

<p>Lihat informasi lowongan pekerjaan terbaru.</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card stat-card shadow">

<div class="card-body">

<h1>🚀</h1>

<h3>Laravel 12</h3>

<p>Dibangun menggunakan Laravel dan Bootstrap 5.</p>

</div>

</div>

</div>

</div>

</div>

</section>

<section class="py-5">

<div class="container">

<h2 class="text-center fw-bold mb-5">
Mengapa Memilih Job Portal?
</h2>

<div class="row">

<div class="col-md-4 mb-4">

<div class="card feature-card shadow">

<div class="card-body text-center">

<h1>🏢</h1>

<h4>Perusahaan Terpercaya</h4>

<p>
Data perusahaan tersimpan dengan aman dan mudah dikelola.
</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card feature-card shadow">

<div class="card-body text-center">

<h1>💼</h1>

<h4>Lowongan Terbaru</h4>

<p>
Menyediakan informasi lowongan pekerjaan yang lengkap.
</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card feature-card shadow">

<div class="card-body text-center">

<h1>⚡</h1>

<h4>Cepat & Responsif</h4>

<p>
Dirancang menggunakan Bootstrap sehingga nyaman digunakan di semua perangkat.
</p>

</div>

</div>

</div>

</div>

</div>

</section>

<footer class="text-white text-center p-4">

<h5>💼 JOB PORTAL</h5>

<p class="mb-0">
© <?php echo e(date('Y')); ?> Sistem Informasi Lowongan Kerja
</p>

</footer>

<script>

function updateClock(){

const now=new Date();

const tanggal=now.toLocaleDateString('id-ID',{
weekday:'long',
year:'numeric',
month:'long',
day:'numeric'
});

const jam=now.toLocaleTimeString('id-ID');

document.getElementById("tanggal").innerHTML=tanggal;

document.getElementById("jam").innerHTML=jam;

}

setInterval(updateClock,1000);

updateClock();

</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\Project_akhir_pemrograman_web\resources\views/welcome.blade.php ENDPATH**/ ?>