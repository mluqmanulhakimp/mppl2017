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
    <a href="http://localhost/mppl/index.php/admin_ctr/" w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Beranda</a> 
    <a href="http://localhost/mppl/index.php/ctr/admindatabukupage" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw w3-margin-right"></i>Data Buku</a>
    <!-- <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>Tentang RBTC</a> -->
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
  <div class="dropdown" style="background: #6E6E6E;height: 54px;width: 100%">
    <a style="font-size: 33px;padding-left: 20px;color: #f7f7f7;"><font face="Times New Roman">Data Buku Yang Belum Dikembalikan</font></a>
    <div style="margin-right: 16px;margin-top: 5px;float: right;">
    <button class="dropbtn">Admin</button>
      <div class="dropdown-content">
        <!-- <a href="#">Profil</a> -->
        <a href="http://localhost/mppl/index.php/login/logout">Keluar</a>
      </div>
      <!-- <button class="buttonn" onclick="'http://localhost/mppl/index.php/login/logout'" style="width:auto;">Logout</button> -->
    </div>

  </div>
  <!-- Header -->
  <header id="portfolio">
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <img src="http://localhost/mppl/img/libr.jpg" style="height: 200px; width: 975px;margin-top: 17px;">
   <!--    <div style="padding-top: 20px; padding-bottom: 20px">
        <input type="text" name="search" placeholder="Search.."><!DOCTYPE html> -->

      <div style="padding-top: 10px;padding-bottom: 10px">
      </div>

      <table border="1" style="border-collapse: collapse;width: 100%;">
        <tr style="background: #C9C9C9;">
          <th width="5%" style="padding-top: 10px;padding-bottom: 10px">No.</th>
          <th width="" style="padding-top: 10px;padding-bottom: 10px">Kode Buku</th>
          <th width="" style="padding-top: 10px;padding-bottom: 10px">Peminjam</th> 
          <!-- <th width="10%">Tanggal Peminjaman</th> -->
          <!-- <th width="">Tenggat Pengembalian</th> -->
          <th width="">Tenggat Peminjaman</th>
          <th width="">Keterlambatan</th>
        </tr>
        <tbody style="background: #FCFCFC;">
          <?php 
            $no=1;
            foreach($data as $row): 
          ?>
          <tr>   
              <td style="text-align: center;"><?php echo $no++; ?></td>
              <td style="height: 50px; text-align: center;"><a href="<?php echo "http://localhost/mppl/index.php/ctr/detailbuku/".$row['id'];?>"><?php echo $row['kode']; ?></a></td>
              <td style="padding-left: 10px"><?php echo $row['peminjam']; ?></td>
 <!--              <td style="text-align: center;"><?php echo $row['peminjaman']; ?></td> -->
              <!-- <td style="text-align: center;"><?php echo $row['tenggat']; ?></td> -->
              <td style="text-align: center;"><?php echo $row['tenggat']; ?></td>
              <?php 
              // $skrg = date("Y-m-d");
              $skrg = new DateTime(date("Y-m-d"));
              $tenggat = new DateTime($row['tenggat']);
              // $telat = date('d', strtotime('-$tenggat', strtotime($skrg)));
              $telat = $skrg->diff($tenggat);
              // $telat = date_diff($tenggat, $skrg);
              ?>
              <td style="text-align: center;"><?php echo $telat->format('%d hari'); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div  class="w3-section w3-bottombar w3-padding-16" align="center">
      </div>

    </div>
  </header>

  <!-- Footer -->
  <?php include 'footer.php' ?>

<!-- End page content -->
</div>

<script src="http://localhost/mppl/js.js"></script>

</body>
</html>
