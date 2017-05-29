<!DOCTYPE html>
<html>
<title>RBTC ITS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://localhost/mppl/style.css">

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
    <a href="http://localhost/mppl/" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Beranda</a> 
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Data Buku</a>
    <!-- <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>Keluar</a> -->
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
    <a style="font-size: 33px;padding-left: 20px;color: #f7f7f7;"><font face="Times New Roman">Insert Data Peminjaman</font></a>
   <!--  <div class="dropdown" style="margin-left: 900px;margin-top: 5px">
    <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user fa-fw w3-margin-center"></i>Admin</button>
      <div id="myDropdown" class="dropdown-content">
        <a href="#">Profil</a>
        <a href="#">Keluar</a>
      </div>
    </div>
 -->  </div>
  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <img src="http://localhost/mppl/img/lib.jpg" style="height: 200px; width: 975px;margin-top: 17px;">
    
    <!--ISI-->
    <div class="w3-section w3-topbar w3-padding-16;3-section w3-bottombar w3-padding-16">
      <form method="POST" action="http://localhost/mppl/index.php/admin_ctr/do_insert_peminjaman">
        <table>
          <tr>
            <td>Kode Buku</td>
            <td><input type="text" name="kode"></td>
          </tr>
          <tr>
            <td>ID Peminjam</td>
            <td><input type="text" name="id_peminjam"></td>
          </tr>
          <tr>
            <td>Tanggal Peminjaman</td>
            <td><input type="date" name="tanggal"></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="btnSubmit" value="Simpan">&nbsp;&nbsp;<input type="button" value="Cancel" onclick="history.back(-1)" /></td>
          </tr>
        </table>
      </form>
    </div>
    <!--end ISI-->

    </div>
  </header>

  <!-- Footer -->
  <?php include 'footer.php' ?>

<!-- End page content -->
</div>

<script src="http://localhost/mppl/js.js"></script>

</body>
</html>
