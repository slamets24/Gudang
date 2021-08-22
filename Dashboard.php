<?php
 session_start();

 if (empty($_SESSION['username'])) {
  echo "<script>document.location.href='index.php'</script>";
 }

include 'layout/header.html';
include 'layout/sidebar.html';
include 'layout/topbar.html';

include 'control/koneksi.php';

$totalmasuks = mysqli_query($conn, "SELECT SUM(inStock) AS inStocks FROM barangmasuk");
$totalmasuk = mysqli_fetch_assoc($totalmasuks);

$totalkeluars = mysqli_query($conn, "SELECT SUM(outStock) AS outStocks FROM barangkeluar");
$totalkeluar = mysqli_fetch_assoc($totalkeluars);

$masukKeluar = $totalmasuk['inStocks'] - $totalkeluar['outStocks'];

  $dataK = mysqli_query($conn, "SELECT barangkeluar.*, jenis.kode, warna.kodeWarna, area.namaArea, driver.namaDriver FROM barangkeluar JOIN jenis ON barangkeluar.idJenis = jenis.id JOIN warna ON barangkeluar.idWarna = warna.id JOIN driver ON barangkeluar.idDriver = driver.id JOIN area ON barangkeluar.idArea = area.id ");

    $dataM = mysqli_query($conn, "SELECT barangmasuk.*, jenis.kode, warna.kodeWarna, supplier.namaSup FROM barangmasuk JOIN jenis ON barangmasuk.idJenis = jenis.id JOIN warna ON barangmasuk.idWarna = warna.id JOIN supplier ON barangmasuk.idSup = supplier.id");

 ?>
<!-- Begin Page Content -->
 <div class="container-fluid">
 	<h2>Dashboard</h2><br>
 	<div class="row">
 		<!-- Earnings (Barang Masuk) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Barang Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalmasuk['inStocks']; ?></div>
                    </div>
                    <div class="col-auto">
                    	<i class="fas fa-boxes fa-2x text-black-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

     <!-- Earnings (Barang Keluar) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Barang Keluar</div>
                      <?php if ($totalkeluar['outStocks'] < 1): ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        0
                      </div>
                      <?php else: ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $totalkeluar['outStocks'] ?>
                      </div>
                      <?php endif ?>
                    </div>
                    <div class="col-auto">
                    	<i class="fas fa-dolly fa-2x text-black-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

      <!-- Earnings (Total Barang) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Barang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $masukKeluar; ?></div>
                    </div>
                    <div class="col-auto">
                    	<i class="fas fa-clipboard-list fa-2x text-black-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 	</div>

  <div class="form-row">
          <!-- DataTales Example -->
          <div class="card shadow col-md-5 mb-3">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Type</th>
                      <th>Nama Barang</th>
                      <th>Tanggal Masuk</th>
                      <th>In Stock</th>
                    </tr>
                  </thead>
  				        <tbody>
                    <?php 
                    $no = 1;
                    while ($dashboardm = mysqli_fetch_assoc($dataM)) :?>
    				        <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $dashboardm['kode']; echo $dashboardm['kodeBarang'] . "/" . $dashboardm['kodeWarna']?></td>
                      <td><?= $dashboardm['nama'] ?></td>
                      <td><?= $dashboardm['tanggalMasuk'] ?></td>
                      <td><?= $dashboardm['inStock'] ?></td>
                    <?php endwhile; ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <!-- DataTales Example -->
          <div class="card shadow col-md-5 mb-3">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Type</th>
                      <th>Nama Barang</th>
                      <th>Tanggal Keluar</th>
                      <th>Out Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    while ($dashboardk = mysqli_fetch_assoc($dataK)) :?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $dashboardk['kode']; echo $dashboardk['kodeBarang'] . "/" . $dashboardk['kodeWarna']?></td>
                      <td><?= $dashboardk['nama'] ?></td>
                      <td><?= $dashboardk['tanggalKeluar'] ?></td>
                      <td><?= $dashboardk['outStock'] ?></td>
                    <?php endwhile; ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

 </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php 

include 'layout/footer.html';

 ?>