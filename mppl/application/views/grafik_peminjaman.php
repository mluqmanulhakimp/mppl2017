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
    <a href="http://localhost/mppl/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Beranda</a> 
    <a href="http://localhost/mppl/index.php/ctr/databukupage" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Data Buku</a>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-envelope fa-fw w3-margin-right"></i>Grafik Peminjaman</a>
    <a href="http://localhost/mppl/index.php/ctr/usermanual" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>User Manual</a>
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
    <a style="font-size: 33px;padding-left: 20px;color: #f7f7f7;"><font face="Times New Roman">Grafik Peminjaman</font></a>
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
    <img src="http://localhost/mppl/img/lib.jpg" style="height: 200px; width: 975px;margin-top: 17px;">

    <!-- <div class="w3-section w3-topbar w3-padding-16;3-section w3-padding-16"> -->
        <table border="1" style="border-collapse: collapse;width: 100%;" class='table table-stripped table-bordered'>
          <h3 style="">Data Peminjaman Buku</h3>
            <tr style="background: #C9C9C9;">
              <th width="4%" style="padding-top: 10px;padding-bottom: 10px">No.</th>
              <th width="" style="padding-top: 10px;padding-bottom: 10px">Judul Buku</th> 
              <th width="" style="padding-top: 10px;padding-bottom: 10px">Kode Buku</th>
              <th width="">Total Peminjaman</th>
              <!-- <th width="25%">Pengarang</th>
              <th width="25%">Kategori</th> -->
            </tr>
            <tbody style="background: #FCFCFC;">
              <?php 
                $no=1;
                foreach($data as $row): 
              ?>
              <tr>
                  <td style="text-align: center;"><?php echo $no++; ?></td>
                  <td style="text-align: center;"><?php echo $row['judul']; ?></td>
                  <td style="padding-left: 10px"><?php echo $row['kode']; ?></td>
                  <td style="text-align: center;"><?php echo $row['total']; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
    <!-- </div> -->

    <div  class="w3-section w3-bottombar w3-padding-16" align="center">
      <!-- <input type="button" value="Kembali" onclick="history.back(-1)" /> -->
    </div>
    <!--end ISI-->

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
