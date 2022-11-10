<?php
  include("lib/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Presensi oii</title>
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="style.css">

</head>

<body>
   <nav class="navbar navbar-light bg-success">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">SMKN 1 PONOROGO</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
               <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SMKN 1 PONOROGO</h5>
               <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                  aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
               <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="?hal=home">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="?hal=siswa">Siswa</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="?hal=kelas">Kelas</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="?hal=presensi">Presensi</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="?hal=surat">Izin/Sakit</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="?hal=rekap">Rekap Presensi</a>
                  </li>

               </ul>
               <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
               </form>
            </div>
         </div>
      </div>
   </nav>

   <div class="container">
      <div class="row">
         <div class="col">
            <div class="card">
               <?php
          $hal = isset($_GET['hal'])?$_GET['hal']:"";

          if($hal){
            include "page/".$hal.".php";
          }else{
            include "page/home.php";
          }
          ?>

            </div>
         </div>
      </div>
   </div>



</body>

</html>

<script src="bootstrap/js/bootstrap.min.js"></script>