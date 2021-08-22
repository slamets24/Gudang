<?php 

include 'koneksi.php';

if(isset($_POST['tambah'])) {
	$id = $_POST['id'];
	$idJenis = $_POST['idJenis'];
	$kodeBarang = $_POST['kodeBarang'];
	$idWarna = $_POST['idWarna'];
	$nama = $_POST['nama'];
	$satuan = $_POST['satuan'];
	$outStock = $_POST['outStock'];
	$idDriver = $_POST['idDriver'];
	$idArea = $_POST['idArea'];
	$tanggalKeluar = $_POST['tanggalKeluar'];
	$idBarangmasuk = $_POST['idBarangmasuk'];

	$masuk = mysqli_query($conn, "SELECT * FROM barangmasuk WHERE id='$idBarangmasuk' ");
	$cek = mysqli_fetch_assoc($masuk);

	if ($outStock < $cek['inStock']) {
		$query = "INSERT INTO barangkeluar VALUES ('','$nama','$kodeBarang','$tanggalKeluar', '$outStock', '$satuan', '$idJenis', '$idWarna', '$idDriver', '$idArea', '$idBarangmasuk')";
		$insert = mysqli_query($conn, $query);
		if ($insert) {
			header("location:../barangkeluar.php");
		}else{
			header("location:../barangkeluar.php?Tambah=Gagal");
		}
	}else{
		header("location:../barangkeluar.php?Stock_Kurang");
	}

		
	}



if(isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $query1 = "DELETE FROM barangkeluar WHERE id=$id";
    $hapus = mysqli_query($conn, $query1);

    // apakah query hapus berhasil?
    if( $hapus ){
        header('Location:../barangkeluar.php?Berhasil=hapus');
    } else {
        header('Location:../barangkeluar.php?gagal_menghapus');
    }

}

if(isset($_POST['Edit'])){

	$id = $_POST['id'];
	$idJenis = $_POST['idJenis'];
	$kodeBarang = $_POST['kodeBarang'];
	$idWarna = $_POST['idWarna'];
	$nama = $_POST['nama'];
	$satuan = $_POST['satuan'];
	$outStock = $_POST['outStock'];
	$idDriver = $_POST['idDriver'];
	$idArea = $_POST['idArea'];
	$tanggalKeluar = $_POST['tanggalKeluar'];
	$idBarangmasuk = $_POST['idBarangmasuk'];

    // buat query update
    $sql = "UPDATE barangkeluar SET nama = '$nama', kodeBarang='$kodeBarang', tanggalKeluar='$tanggalKeluar', outStock='$outStock', satuan='$satuan', idJenis='$idJenis', idWarna='$idWarna', idDriver='$idDriver', idArea='$idArea' WHERE id='$id'";
   
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location:../barangkeluar.php?berhasil=Edit');
    } else {
        // kalau gagal tampilkan pesan
        header('Location:../barangkeluar.php?Edit=Gagal');
    }


}


 ?>