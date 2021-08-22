<?php 
 session_start();

 if (empty($_SESSION['username'])) {
  echo "<script>document.location.href='index.php'</script>";
 }

include 'layout/header.html';
include 'control/koneksi.php';

  $data = mysqli_query($conn, "SELECT barangkeluar.*, jenis.kode, warna.kodeWarna, area.namaArea, driver.namaDriver FROM barangkeluar JOIN jenis ON barangkeluar.idJenis = jenis.id JOIN warna ON barangkeluar.idWarna = warna.id JOIN driver ON barangkeluar.idDriver = driver.id JOIN area ON barangkeluar.idArea = area.id ");

  $jenis = jenis("SELECT * FROM jenis");
  $warna = warna("SELECT * FROM warna");
  $driver = driver("SELECT * FROM driver");
  $area = area("SELECT * FROM area");

  function jenis($query){
  // Memanggil variabel koneksi dari luar function
  global $conn;
  // Menjalankan Printah Query
  $result = mysqli_query($conn,$query);
  // $rows untuk menampung hasil dari $row
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  // Mengembalikan angka yang sudah didapat pada proses query apakah berhasil atau tidak
  return $rows;
}

  function warna($query1){
  // Memanggil variabel koneksi dari luar function
  global $conn;
  // Menjalankan Printah Query
  $result = mysqli_query($conn,$query1);
  // $rows untuk menampung hasil dari $row
  $rows1 = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows1[] = $row;
  }
  // Mengembalikan angka yang sudah didapat pada proses query apakah berhasil atau tidak
  return $rows1;
}

  function driver($query2){
  // Memanggil variabel koneksi dari luar function
  global $conn;
  // Menjalankan Printah Query
  $result = mysqli_query($conn,$query2);
  // $rows untuk menampung hasil dari $row
  $rows2 = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows2[] = $row;
  }
  // Mengembalikan angka yang sudah didapat pada proses query apakah berhasil atau tidak
  return $rows2;
}

  function area($query2){
  // Memanggil variabel koneksi dari luar function
  global $conn;
  // Menjalankan Printah Query
  $result = mysqli_query($conn,$query2);
  // $rows untuk menampung hasil dari $row
  $rows2 = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows2[] = $row;
  }
  // Mengembalikan angka yang sudah didapat pada proses query apakah berhasil atau tidak
  return $rows2;
}

?>
 <div class="container-fluid">
 		<img src="img/logockm.png" style="float: left;height: 100px; width: 200px; margin:20px">
 		<div style="text-align: center;padding: 50px;margin-right: 150px;color: black">
 		<h1>CitraKreasi Makmur</h1>	
 		<h3 style="margin-left: 150px">Laporan Data Barang Keluar</h3>
 		</div>
 		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="table-secondary"> 
                        <th>No</th>
                        <th>Type</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Keluar Barang</th>
                        <th>Driver</th>
                        <th>Area</th>
                        <th>Out Stock</th>
                        <th>Satuan</th>                           
                    </tr>
                  </thead>
  				<tbody>
                    <?php 
                    $no = 1;
                    while ($keluar = mysqli_fetch_assoc($data)) : ?>
    				<tr class="bg-primary">
                      <td><?= $no++; ?></td>
                      <td><?= $keluar['kode']; echo $keluar['kodeBarang'] . "/" . $keluar['kodeWarna']?></td>
                      <td> <?= $keluar['nama'] ?></td>
                      <td><?= date("d F Y", strtotime($keluar['tanggalKeluar'])) ?></td>
                      <td><?= $keluar['namaDriver'] ?></td>
                      <td><?= $keluar['namaArea'] ?></td>
                      <td><?= $keluar['outStock']; ?></td>
                      <td><?= $keluar['satuan']; ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<script type="text/javascript">window.print();</script>