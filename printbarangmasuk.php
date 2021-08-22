<script>window.print();</script>
<?php 
 session_start();

 if (empty($_SESSION['username'])) {
  echo "<script>document.location.href='index.php'</script>";
 }

include 'layout/header.html';
include 'control/koneksi.php';

	$data = mysqli_query($conn, "SELECT barangmasuk.*, jenis.kode, warna.kodeWarna, supplier.namaSup FROM barangmasuk JOIN jenis ON barangmasuk.idJenis = jenis.id JOIN warna ON barangmasuk.idWarna = warna.id JOIN supplier ON barangmasuk.idSup = supplier.id");

	$jenis = jenis("SELECT * FROM jenis");
	$warna = warna("SELECT * FROM warna");
	$supplier = supplier("SELECT * FROM supplier");


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

	function supplier($query2){
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
 		<h3 style="margin-left: 150px">Laporan Data Barang Masuk</h3>
 		</div>
 		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="table-secondary"> 
                        <th>No</th>
						<th>Type</th>
						<th>Nama Barang</th>
						<th>Tanggal</th>
						<th>Supplier</th>
						<th>In Stock</th>
						<th>Satuan</th>                             
                    </tr>
                  </thead>
  				<tbody bgcolor="black">
  					<?php 
                        $no =1 ;
                        while ($masuk = mysqli_fetch_array($data)) :
                     ?>
    				<tr class="bg-success" >
                        <td> <?= $no++; ?> </td>                                      
                        <td><?= $masuk['kode']; echo $masuk['kodeBarang'] . "/" . $masuk['kodeWarna']?></td>
                        <td> <?= $masuk['nama'] ?></td>
                        <td><?= date("d F Y", strtotime($masuk['tanggalMasuk'])) ?></td>                                   
                        <td><?= $masuk['namaSup'] ?></td>
						<td><?= $masuk['inStock']; ?></td>
						<td><?= $masuk['satuan']; ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
