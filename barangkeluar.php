<?php 
error_reporting(0);
 session_start();
 if (empty($_SESSION['username'])) {
  echo "<script>document.location.href='index.php'</script>";
 }

include 'layout/header.html';
include 'layout/sidebar.html';
include 'layout/topbar.html';
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
<!-- Begin Page Content -->
 <div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Barang Keluar</h1>
            <a href="printbarangkeluar.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Print Data Barang Keluar</a>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="formkeluar.php" class="btn btn-success btn-icon-split " >
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Barang Keluar</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Keluar Barang</th>
                        <th>Driver</th>
                        <th>Area</th>
                        <th>Out Stock</th>
                        <th>Satuan</th>
                        <th style="text-align: center;">Action</th>                                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    while ($keluar = mysqli_fetch_assoc($data)) : ?>
                     <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $keluar['kode']; echo $keluar['kodeBarang'] . "/" . $keluar['kodeWarna']?></td>
                      <td> <?= $keluar['nama'] ?></td>
                      <td><?= date("d F Y", strtotime($keluar['tanggalKeluar'])) ?></td>
                      <td><?= $keluar['namaDriver'] ?></td>
                      <td><?= $keluar['namaArea'] ?></td>
                      <td><?= $keluar['outStock']; ?></td>
                      <td><?= $keluar['satuan']; ?></td>
                      <td align="center">
                        <a href="#" class="btn btn-info btn-flat btn-sm" data-toggle="modal" data-target="#update<?= $keluar['id'] ?>" >
                        <i class="fas fa-edit"></i>
                        </a> |
                        <a href="#" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#hapus<?= $no ?>"><i class="fa fa-trash"></i></a>
                      </a>
                      </td>
                    </tr>

      <!-- Hapus Modal-->
          <div class="modal fade" id="hapus<?= $no?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Ingin Menghapusnya?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Tekan "Hapus" Untuk Menghapus data tersebut</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="control/proseskeluar.php?id=<?php echo $keluar['id'] ?>">Hapus</a>
                </div>
              </div>
            </div>
          </div>

  <!-- Form Edit Modal-->
  <div class="modal fade" id="update<?= $keluar['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate method="POST" action="control/proseskeluar.php">
          <div class="form-row">
            <div class="col-md-5 mb-3">
              <label for="validationTooltip01">Type</label>
              <select class="custom-select" id="validationTooltip01" required name="idJenis">
                <option selected disabled value="">Jenis...</option>
                  <?php foreach ($jenis as $djenis) : ?>
                <option <?php echo ($djenis['id'] == $keluar['idJenis'])?'selected':''?> value="<?= $djenis['id'] ?>"><?= $djenis['jenisAlat']  ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-tooltip">
                Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip02">&nbsp</label>
              <input type="text" class="form-control" id="validationTooltip02" required placeholder="Kode" name="kodeBarang" value="<?= $keluar['kodeBarang'] ?>">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip03">&nbsp</label>
              <select class="custom-select" id="validationTooltip03" required name="idWarna">
                <option selected disabled value="">Warna...</option>
                  <?php foreach ($warna as $dwarna) : ?>
                <option <?php echo ($dwarna['id'] == $keluar['idWarna'])?'selected':''?> value="<?= $dwarna['id']; ?>"><?= $dwarna['nWarna'];  ?></option>
                <?php endforeach; ?>
              </select>
              </select>
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip04">Nama Barang</label>
              <input type="text" class="form-control" id="validationTooltip04" required name="nama" value="<?= $keluar['nama'] ?>">
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
            <div class="col-md-5 mb-3">
              <label for="validationTooltip05">Tanggal Keluar</label>
              <input type="date" class="form-control" id="validationTooltip05" required name="tanggalKeluar" value="<?= $keluar['tanggalKeluar'] ?>">
              <div class="invalid-tooltip">
                Mohon Di Isi
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-3 mb-3">
              <label for="validationTooltip06">Out Stock</label>
              <input type="text" class="form-control" id="validationTooltip06" required name="outStock" value="<?= $keluar['outStock'] ?>">
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationTooltip07">Satuan</label>
              <select class="custom-select" id="validationTooltip07" disable required name="satuan">
                  <option value="pcs">pcs</option>
              </select >
              <div class="invalid-tooltip" >
                Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip08">Driver</label>
              <select class="custom-select" id="validationTooltip08" required name="idDriver">
                <option selected disabled value="">Driver...</option>
                <?php foreach ($driver as $ddriver) : ?>
                <option <?php echo ($ddriver['id'] == $keluar['idDriver'])?'selected':''?> value="<?= $ddriver['id']; ?>"><?= $ddriver['namaDriver'];  ?></option>
              <?php endforeach; ?>
              </select>
              </select>
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip08">Area</label>
              <select class="custom-select" id="validationTooltip08" required name="idArea">
                <option selected disabled value="">Area...</option>
                <?php foreach ($area as $darea) : ?>
                <option <?php echo ($darea['id'] == $keluar['idArea'])?'selected':''?> value="<?= $darea['id']; ?>"><?= $darea['namaArea'];  ?></option>
              <?php endforeach; ?>
              </select>
              </select>
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
        </div>
            <div class="modal-footer">
              <input type="hidden" name="id" value="<?= $keluar['id'] ?>">
              <a href="barangmasuk.php?#"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>
              <button class="btn btn-primary" type="submit" name="Edit">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

 </div>
<!-- /.container-fluid -->

  <!-- Form Masuk Modal-->
  <div class="modal fade" id="barangkeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate method="POST" action="control/proseskeluar.php">
          <div class="form-row">
            <div class="col-md-5 mb-3">
              <label for="validationTooltip01">Type</label>
              <select class="custom-select" id="validationTooltip01" required name="idJenis">
                <option selected disabled value="">Jenis...</option>
                  <?php foreach ($jenis as $djenis) : ?>
                <option value="<?= $djenis['id'] ?>"><?= $djenis['jenisAlat']  ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-tooltip">
                Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip02">&nbsp</label>
              <input type="text" class="form-control" id="validationTooltip02" required placeholder="Kode" name="kodeBarang" value="<?= $crs['kodeBarang'] ?>">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip03">&nbsp</label>
              <select class="custom-select" id="validationTooltip03" required name="idWarna">
                <option selected disabled value="">Warna...</option>
                  <?php foreach ($warna as $dwarna) : ?>
                <option value="<?= $dwarna['id']; ?>"><?= $dwarna['nWarna'];  ?></option>
                <?php endforeach; ?>
              </select>
              </select>
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip04">Nama Barang</label>
              <input type="text" class="form-control" id="validationTooltip04" required name="nama">
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
            <div class="col-md-5 mb-3">
              <label for="validationTooltip05">Tanggal Keluar</label>
              <input type="date" class="form-control" id="validationTooltip05" required name="tanggalKeluar">
              <div class="invalid-tooltip">
                Mohon Di Isi
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-3 mb-3">
              <label for="validationTooltip06">Out Stock</label>
              <input type="text" class="form-control" id="validationTooltip06" required name="outStock">
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
            <div class="col-md-2 mb-3">
              <label for="validationTooltip07">Satuan</label>
              <select class="custom-select" id="validationTooltip07" disable required name="satuan">
                  <option value="pcs">pcs</option>
              </select >
              <div class="invalid-tooltip" >
                Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip08">Driver</label>
              <select class="custom-select" id="validationTooltip08" required name="idDriver">
                <option selected disabled value="">Driver...</option>
                  <?php foreach ($driver as $ddriver) : ?>
                <option value="<?= $ddriver['id']; ?>"><?= $ddriver['namaDriver'];  ?></option>
                <?php endforeach; ?>
              </select>
              </select>
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip08">Area</label>
              <select class="custom-select" id="validationTooltip08" required name="idArea">
                <option selected disabled value="">Area...</option>
                  <?php foreach ($area as $darea) : ?>
                <option value="<?= $darea['id']; ?>"><?= $darea['namaArea'];  ?></option>
                <?php endforeach; ?>
              </select>
              </select>
              <div class="invalid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
        </div>
            <div class="modal-footer">
              <a href="barangmasuk.php?#"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>
              <button class="btn btn-primary" type="submit" name="tambah">Submit</button>
            </div>
            </form>
            <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
      </script>
          </div>
 </div>
</div>
</div>
<!-- End of Main Content -->



<?php 

include 'layout/footer.html';

 ?>