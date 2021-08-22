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




    $jenis = mysqli_query($conn, "SELECT * FROM jenis");
    $warna = mysqli_query($conn, "SELECT * FROM warna");
    $driver = mysqli_query($conn, "SELECT * FROM driver");
    $area = mysqli_query($conn, "SELECT * FROM area");
    $supplier = mysqli_query($conn, "SELECT * FROM supplier");
    

 ?>
<!-- Begin Page Content -->
 <div class="container-fluid">
  <div class="form-row">
        <!-- DataTales Example -->
          <div class="card shadow col-md-5 mb-3">
            <div class="card-header py-3">
              <a href="#" class="btn btn-success btn-icon-split " data-toggle="modal" data-target="#supplier">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Supplier</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th style="text-align: center;">Action</th>                                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    while ($d1 = mysqli_fetch_assoc($supplier)) : ?>
                     <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d1['kode'];?></td>
                      <td> <?= $d1['namaSup'] ?></td>
                      <td align="center">
                        <a href="control/prosesdatatambahan.php?supplier1=<?= $d1['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin Hapus?')">
                      <i class="fas fa-trash"></i>
                      </a>
                    </td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-1 mb-3">
          </div>
          <div class="card shadow col-md-5 mb-3">
            <div class="card-header py-3">
              <a href="#" class="btn btn-success btn-icon-split " data-toggle="modal" data-target="#area">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Area</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Area</th>
                        <th>Nama Area</th>
                        <th style="text-align: center;">Action</th>                                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    while ($d2 = mysqli_fetch_assoc($area)) : ?>
                     <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d2['kode'];?></td>
                      <td> <?= $d2['namaArea'] ?></td>
                      <td align="center">
                        <a href="control/prosesdatatambahan.php?area1=<?= $d2['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin Hapus?')">
                      <i class="fas fa-trash"></i>
                      </a>
                    </td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
          <div class="form-row">
        <!-- DataTales Example -->
          <div class="card shadow col-md-5 mb-3">
            <div class="card-header py-3">
              <a href="#" class="btn btn-success btn-icon-split " data-toggle="modal" data-target="#jenis">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Jenis</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Jenis</th>
                        <th>Nama Jenis</th>
                        <th style="text-align: center;">Action</th>                                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    while ($d3 = mysqli_fetch_assoc($jenis)) : ?>
                     <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d3['kode'];?></td>
                      <td> <?= $d3['jenisAlat'] ?></td>
                      <td align="center">
                        <a href="control/prosesdatatambahan.php?jenis1=<?= $d3['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin Hapus?')">
                      <i class="fas fa-trash"></i>
                      </a>
                    </td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-1 mb-3">
          </div>
          <div class="card shadow col-md-5 mb-3">
            <div class="card-header py-3">
              <a href="#" class="btn btn-success btn-icon-split " data-toggle="modal" data-target="#warna">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Warna</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Warna</th>
                        <th>Nama Warna</th>
                        <th style="text-align: center;">Action</th>                                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    while ($d4 = mysqli_fetch_assoc($warna)) : ?>
                     <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d4['kodeWarna'];?></td>
                      <td> <?= $d4['nWarna'] ?></td>
                      <td align="center">
                        <a href="control/prosesdatatambahan.php?warna1=<?= $d4['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin Hapus?')">
                      <i class="fas fa-trash"></i>
                      </a>
                    </td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
          <div class="card shadow col-md-5 mb-3">
            <div class="card-header py-3">
              <a href="#" class="btn btn-success btn-icon-split " data-toggle="modal" data-target="#driver">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Driver</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Driver</th>
                        <th>Nama Driver</th>
                        <th style="text-align: center;">Action</th>                                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    while ($d4 = mysqli_fetch_assoc($driver)) : ?>
                     <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d4['kode'];?></td>
                      <td> <?= $d4['namaDriver'] ?></td>
                      <td align="center">
                        <a href="control/prosesdatatambahan.php?driver1=<?= $d5['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin Hapus?')">
                      <i class="fas fa-trash"></i>
                      </a>
                    </td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

 </div>



<!-- /.container-fluid -->

  <!-- Form Supplier Modal-->
  <div class="modal fade" id="supplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate method="POST" action="control/prosesdatatambahan.php">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip01">Kode Supplier</label>
              <input type="text" class="form-control" id="validationTooltip01" required placeholder="Kode" name="kode">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip02">Nama Supplier</label>
              <input type="text" class="form-control" id="validationTooltip02" required placeholder="Nama" name="namaSup">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          
        </div>
            <div class="modal-footer">
              <a href="barangmasuk.php?#"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>
              <button class="btn btn-primary" type="submit" name="supplier">Submit</button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Form Area Modal-->
  <div class="modal fade" id="area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate method="POST" action="control/prosesdatatambahan.php">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip01">Kode Area</label>
              <input type="text" class="form-control" id="validationTooltip01" required placeholder="Kode" name="kode">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip02">Area</label>
              <input type="text" class="form-control" id="validationTooltip02" required placeholder="Nama" name="namaArea">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          
        </div>
            <div class="modal-footer">
              <a href="barangmasuk.php?#"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>
              <button class="btn btn-primary" type="submit" name="area">Submit</button>
            </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Form Jenis Modal-->
  <div class="modal fade" id="jenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate method="POST" action="control/prosesdatatambahan.php">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip01">Kode Jenis</label>
              <input type="text" class="form-control" id="validationTooltip01" required placeholder="Kode" name="kode">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip02">Jenis</label>
              <input type="text" class="form-control" id="validationTooltip02" required placeholder="Nama" name="jenisAlat">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          
        </div>
            <div class="modal-footer">
              <a href="barangmasuk.php?#"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>
              <button class="btn btn-primary" type="submit" name="jenis">Submit</button>
            </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Form Warna Modal-->
  <div class="modal fade" id="warna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate method="POST" action="control/prosesdatatambahan.php">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip01">Kode Warna</label>
              <input type="text" class="form-control" id="validationTooltip01" required placeholder="Kode" name="kodeWarna">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip02">Warna</label>
              <input type="text" class="form-control" id="validationTooltip02" required placeholder="Nama" name="nWarna">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          
        </div>
            <div class="modal-footer">
              <a href="barangmasuk.php?#"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>
              <button class="btn btn-primary" type="submit" name="warna">Submit</button>
            </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Form Driver Modal-->
  <div class="modal fade" id="driver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate method="POST" action="control/prosesdatatambahan.php">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip01">Kode Driver</label>
              <input type="text" class="form-control" id="validationTooltip01" required placeholder="Kode" name="kode">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip02">Nama Driver</label>
              <input type="text" class="form-control" id="validationTooltip02" required placeholder="Nama" name="namaDriver">
              <div class="valid-tooltip">
                 Mohon Di Isi
              </div>
            </div>
          </div>
          
        </div>
            <div class="modal-footer">
              <a href="barangmasuk.php?#"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>
              <button class="btn btn-primary" type="submit" name="driver">Submit</button>
            </div>
            </form>
        </div>
      </div>
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