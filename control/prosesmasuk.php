<?php 

include 'koneksi.php';

if(isset($_POST['tambah'])) {

	$id = $_POST['id'];
	$idJenis = $_POST['idJenis'];
	$kodeBarang = $_POST['kodeBarang'];
	$idWarna = $_POST['idWarna'];
	$nama = $_POST['nama'];
	$satuan = $_POST['satuan'];
	$inStock = $_POST['inStock'];
	$idSup = $_POST['idSup'];
	$tanggalMasuk = $_POST['tanggalMasuk'];

		$query = "INSERT INTO barangmasuk VALUES ('$id','$nama','$kodeBarang','$tanggalMasuk', '$satuan', '$inStock', '$idJenis', '$idWarna', '$idSup')";

		$insert = mysqli_query($conn, $query);
		if ($insert) {
			header("location:../barangmasuk.php");
		}else{
			header("location:../barangmasuk.php?Tambah=Gagal");
		}
	}

if(isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $query1 = "DELETE FROM barangmasuk WHERE id=$id";
    $hapus = mysqli_query($conn, $query1);

    // apakah query hapus berhasil?
    if( $hapus ){
        header('Location:../barangmasuk.php?Berhasil=hapus');
    } else {
        header('Location:../barangmasuk.php?gagal_menghapus');
    }

}

if(isset($_POST['Edit'])){

	$id = $_POST['id'];
	$idJenis = $_POST['idJenis'];
	$kodeBarang = $_POST['kodeBarang'];
	$idWarna = $_POST['idWarna'];
	$nama = $_POST['nama'];
	$satuan = $_POST['satuan'];
	$inStock = $_POST['inStock'];
	$idSup = $_POST['idSup'];
	$tanggalMasuk = $_POST['tanggalMasuk'];

    // buat query update
    $sql = "UPDATE barangmasuk SET nama = '$nama', kodeBarang='$kodeBarang', tanggalMasuk='$tanggalMasuk', satuan='$satuan', inStock='$inStock', idJenis='$idJenis', idWarna='$idWarna', idSup='$idSup' WHERE id='$id'";

    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location:../barangmasuk.php?berhasil=Edit');
    } else {
        // kalau gagal tampilkan pesan
        header('Location:../barangmasuk.php?Edit=Gagal');
    }


}



 ?>