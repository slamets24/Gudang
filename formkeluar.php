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


  if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];
    $data = querys("SELECT * FROM barangmasuk WHERE nama = '$cari'");       
    }else{
      header('location:formkeluar.php');
    }

function querys($query){
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
 ?>
<!-- Begin Page Content -->
 <div class="container-fluid">
   <form method="POST" action="formkeluar.php">
    <div class="form-row">
    <div class="col-md-3 mb-3">
     <input type="text" name="cari" class="form-control">
    </div>
    <div class="col-md-5 mb-3">
     <input type="submit" value="Cari" class="btn btn-primary">
    </div>
   </div>
   </form>
   <?php if(isset($_POST['cari'])) : ?>
    <?php 
            

     ?>

    <?php foreach ($data as $keluar):?>
   <form class="needs-validation" novalidate method="POST" action="control/proseskeluar.php">
          <div class="form-row">
            <div class="col-md-5 mb-3">
              <label for="validationTooltip01">Type</label>
              <select class="custom-select" id="validationTooltip01"  name="idJenis">
                <option selected disabled value="">Jenis...</option>
                  <?php foreach ($jenis as $djenis) : ?>
                <option  <?php echo ($djenis['id'] == $keluar['idJenis'])?'selected':''?> value="<?= $djenis['id'] ?>"><?= $djenis['jenisAlat']  ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-tooltip">
                Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip02">&nbsp</label>
              <input type="text" class="form-control" id="validationTooltip02"  placeholder="Kode"  name="kodeBarang" value="<?= $keluar['kodeBarang'] ?>">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip03">&nbsp</label>
              <select class="custom-select" id="validationTooltip03"  name="idWarna">
                <option selected disabled value="">Warna...</option>
                  <?php foreach ($warna as $dwarna) : ?>
                <option   <?php echo ($dwarna['id'] == $keluar['idWarna'])?'selected':''?> value="<?= $dwarna['id']; ?>"><?= $dwarna['nWarna'];  ?></option>
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
              <input  type="text" class="form-control" id="validationTooltip04"  name="nama" value="<?= $keluar['nama']; ?>">
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
              <input type="text" class="form-control" id="validationTooltip06" required name="outStock" value="<?= $keluar['inStock'] ?>">
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
              <input type="hidden" name="idBarangmasuk" value="<?= $keluar['id'] ?>">
              <a href="barangmasuk.php?#"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>
              <button class="btn btn-primary" type="submit" name="tambah">Submit</button>
            </div>
            </form>
          <?php endforeach; ?>


   <?php else: ?>
    <form class="needs-validation" novalidate method="POST" action="control/proseskeluar.php">
          <div class="form-row">
            <div class="col-md-5 mb-3">
              <label for="validationTooltip01">Type</label>
              <select class="custom-select" id="validationTooltip01" required name="idJenis">
                <option selected disabled value="">Jenis...</option>
                  <?php foreach ($jenis as $djenis) : ?>
                <option  value="<?= $djenis['id'] ?>"><?= $djenis['jenisAlat']  ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-tooltip">
                Mohon Di Isi
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip02">&nbsp</label>
              <input type="text" class="form-control" id="validationTooltip02" required placeholder="Kode" name="kodeBarang"  value="<?= $keluar['kodeBarang'] ?>">
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
  <?php endif;  ?>
</div>

<!-- End of Main Content -->

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


<?php 

include 'layout/footer.html';

 ?>