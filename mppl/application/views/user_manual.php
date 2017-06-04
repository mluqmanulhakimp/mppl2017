<!DOCTYPE html>
<html>
<title>RBTC ITS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://localhost/mppl/style.css">

<style>
  /* Full-width input fields */
  input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
  }

  /* Set a style for all buttons */
  .buttonn {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      margin: 1px 0;
      border: none;
      cursor: pointer;
      width: 100%;
  }

  .buttonn:hover {
      opacity: 0.8;
  }

  /* Extra styles for the cancel button */
  .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
  }

  /* Center the image and position the close button */
  .container {
      padding: 16px;
  }

  span.psw {
      float: right;
      padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 30%; /* Could be more or less, depending on screen size */
  }

  /* The Close Button (x) */
  .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
  }

  .close:hover,
  .close:focus {
      color: red;
      cursor: pointer;
  }

  /* Add Zoom Animation */
  .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
      from {-webkit-transform: scale(0)} 
      to {-webkit-transform: scale(1)}
  }
      
  @keyframes animatezoom {
      from {transform: scale(0)} 
      to {transform: scale(1)}
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
      span.psw {
         display: block;
         float: none;
      }
      .cancelbtn {
         width: 100%;
      }
  }
</style>

<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="http://localhost/mppl/" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <a href="http://localhost/mppl/"><img src="http://localhost/mppl/img/itswarna.png" style="width:75%;margin-left: 27px;margin-top: 10px" class="w3-round"><br><br></a>
    <h3 style="text-align: center; margin-top: -10px"><b>RBTC</b></h3>
    <p style="text-align: center; margin-top: -10px" class="w3-text-grey">Teknik Informatika ITS</p>
    <hr>
  </div>
  <div class="w3-bar-block" style="margin-left: 10px">
    <a href="http://localhost/mppl/"w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Beranda</a> 
    <a href="http://localhost/mppl/index.php/ctr/databukupage" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw w3-margin-right"></i>Data Buku</a>
    <a href="http://localhost/mppl/index.php/ctr/grafikpeminjaman" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart fa-fw w3-margin-right"></i>Data Peminjaman</a>
     <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-user fa-fw w3-margin-right"></i>User Manual</a>
    <hr>
  </div>
  <div class="w3-panel w3-large" style="margin-left: 10px">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:250px">

  <!-- Navigationbar -->
  <div style="background: #6E6E6E;height: 54px;width: 100%">
    <a style="font-size: 33px;padding-left: 20px;color: #f7f7f7;"><font face="Times New Roman">User Manual</font></a>
    <div style="margin-right: 16px;margin-top: 5px;float: right;">
    <!-- <button class="dropbtn">Admin</button>
      <div class="dropdown-content">
        <a href="#">Profil</a>
        <a href="#">Keluar</a>
      </div> -->
      <button class="buttonn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
    </div>

      <div id="id01" class="modal">
        
        <form class="modal-content animate" action="http://localhost/mppl/index.php/login/aksi_login">
          <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
              
            <button class="buttonn" type="submit">Login</button>
            <input type="checkbox" checked="checked"> Remember me
          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
          </div>
        </form>
      </div>

  </div>
  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <img src="http://localhost/mppl/img/libr.jpg" style="height: 200px; width: 975px;margin-top: 17px;">
   <!--    <div style="padding-top: 20px; padding-bottom: 20px">
        <input type="text" name="search" placeholder="Search.."><!DOCTYPE html> -->

      <!-- isi -->
      <!-- <br><br><strong><center>User Manual<br>
      Sistem Informasi Peminjaman Buku atau Pustaka di RBTC
      </center></strong> -->
      <br><br>

      <strong>Menu utama terdapat pada bagian kiri halaman, terdiri dari :<br></strong>
      1. Beranda<br>
      2. Data Buku<br>
      3. Data Peminjaman<br><br>
<strong>Daftar fungsi dan cara penggunaan :</strong><br><br>
    <strong>1. Lihat daftar buku: </strong><br>
    - Klik link menu "Data Buku" pada menu di bagian kiri<br><br>

    <strong>2. Lihat detail buku</strong> <br>- Pada halaman "Data Buku", klik tombol "detail" pada buku yang diinginkan<br><br>

    <strong>3. Lihat data peminjaman buku</strong><br>- Klik menu "Data Peminjaman" pada menu<br><br>
    <strong>4. Lihat grafik peminjaman buku terbanyak</strong><br>- Klik menu "Beranda" pada menu bagian kiri<br><br>
    <strong>5. Lihat koleksi buku RBTC terbaru</strong><br>- Klik link "Lihat Daftar Koleksi Buku Terbaru RBTC" pada halaman "Beranda"<br><br>
    <strong>Tambah, hapus dan mengubah data peminjaman buku:</strong><br>- Untuk mengakses fungsi ini, perlu login sebagai admin terlebih dahulu dengan cara :<br>- Klik tombol login di sebelah pojok kanan atas<br>- Masukkan Username dan Password<br>- Klik tombol "Login"<br><br>
<strong>- Fungsi - fungsi di bawah ini dapat diakses melalui halaman "Beranda"</strong> <br><br>
<strong> Tambah data peminjaman </strong><br>- Klik tombol "Tambah Data Peminjaman"<br>- Isikan data id buku, id peminjam dan tanggal peminjaman, lalu simpan<br>
<br><strong> Hapus data peminjaman </strong> <br>- Lihat pada tabel tab "Action" dan klik tombol "Hapus" <br><br>
<strong> Ubah / update status peminjaman </strong> <br>- Lihat pada tabel tab "Action" dan klik tombol Dikembalikan <br>
      <!-- end isi -->

      <div  class="w3-section w3-bottombar w3-padding-16" align="center">
      </div>

    </div>
  </header>

  <!-- Footer -->
  <?php include 'footer.php' ?>

<!-- End page content -->
</div>

<script src="http://localhost/mppl/js.js"></script>
<script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
</script>

</body>
</html>