<?php 
// PROTEKSI HALAMAN WEB
session_start();
include_once('control/koneksi.php');
if(isset($_POST['masuk'])){
  $username = $_POST['username'];
  // SHA1 = untuk MENG ENCRYPT PASSWORD
  $password = $_POST['password'];
  $cek = mysqli_query($conn, "SELECT * FROM login WHERE username='$username' AND password='$password'");
  // mysqli_num_rows adalah mencari jumlah dari perintah query diatas
  $result = mysqli_num_rows($cek);

  if($result > 0){
    $row = mysqli_fetch_array($cek);
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
    $_SESSION['nama']=$row['nama'];
    echo "<script>
        document.location.href='dashboard.php'
    ";
    echo "</script>";
  }else{ 
    $err = "<div class='row' style='margin-top: 15px; text-align: center;'>
           <div class='col-md-4'>
            <div class='box box-solid bg-red'>
              <div class='box-header'>
                <h3 class='box-title'>Login Gagal!</h3>
              </div>
              <div class='box-body'>
                <p>Username atau password yang anda masukan salah.</p>
              </div>
          </div>
       </div>
     </div>";
 }
} 

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CitraKreasi Makmur
- Login</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 lg-3 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-6  content-center">
                <div>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..." name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="masuk" value="Login">
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>
