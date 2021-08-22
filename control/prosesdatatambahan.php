<?php 

include 'koneksi.php';

if(isset($_POST['supplier'])) {

	$id = $_POST['id'];
	$kode = $_POST['kode'];
	$namaSup = $_POST['namaSup'];

		$query = "INSERT INTO supplier VALUES ('$id','$kode','$namaSup')";


		$insert = mysqli_query($conn, $query);
		if ($insert) {
			header("location:../datatambahan.php");
		}else{
			header("location:../datatambahan.php?Tambah=Gagal");
		}
	}

	if(isset($_POST['area'])) {

	$id = $_POST['id'];
	$kode = $_POST['kode'];
	$namaArea = $_POST['namaArea'];

		$query = "INSERT INTO area VALUES ('$id','$kode','$namaArea')";


		$insert = mysqli_query($conn, $query);
		if ($insert) {
			header("location:../datatambahan.php");
		}else{
			header("location:../datatambahan.php?Tambah=Gagal");
		}
	}

	if(isset($_POST['jenis'])) {

	$id = $_POST['id'];
	$kode = $_POST['kode'];
	$jenisAlat = $_POST['jenisAlat'];

		$query = "INSERT INTO jenis VALUES ('$id','$kode','$jenisAlat')";


		$insert = mysqli_query($conn, $query);
		if ($insert) {
			header("location:../datatambahan.php");
		}else{
			header("location:../datatambahan.php?Tambah=Gagal");
		}
	}

	if(isset($_POST['warna'])) {

	$id = $_POST['id'];
	$kodeWarna = $_POST['kodeWarna'];
	$nWarna = $_POST['nWarna'];

		$query = "INSERT INTO warna VALUES ('$id','$kodeWarna','$nWarna')";


		$insert = mysqli_query($conn, $query);
		if ($insert) {
			header("location:../datatambahan.php");
		}else{
			header("location:../datatambahan.php?Tambah=Gagal");
		}
	}

	if(isset($_POST['driver'])) {

	$id = $_POST['id'];
	$kode = $_POST['kode'];
	$namaDriver = $_POST['namaDriver'];

		$query = "INSERT INTO driver VALUES ('$id','$kode','$namaDriver')";


		$insert = mysqli_query($conn, $query);
		if ($insert) {
			header("location:../datatambahan.php");
		}else{
			header("location:../datatambahan.php?Tambah=Gagal");
		}
	}

if(isset($_GET['supplier1']) ){

    // ambil id dari query string
    $id = $_GET['supplier1'];

    // buat query hapus
    $query1 = "DELETE FROM supplier WHERE id=$id";
    $hapus = mysqli_query($conn, $query1);

    // apakah query hapus berhasil?
    if( $hapus ){
        header('Location:../datatambahan.php?Berhasil=hapus');
    } else {
        header('Location:../datatambahan.php?gagal_menghapus');
    }

}

if(isset($_GET['area1']) ){

    // ambil id dari query string
    $id = $_GET['area1'];

    // buat query hapus
    $query1 = "DELETE FROM area WHERE id=$id";
    $hapus = mysqli_query($conn, $query1);

    // apakah query hapus berhasil?
    if( $hapus ){
        header('Location:../datatambahan.php?Berhasil=hapus');
    } else {
        header('Location:../datatambahan.php?gagal_menghapus');
    }

}

if(isset($_GET['jenis1']) ){

    // ambil id dari query string
    $id = $_GET['jenis1'];

    // buat query hapus
    $query1 = "DELETE FROM jenis WHERE id=$id";
    $hapus = mysqli_query($conn, $query1);

    // apakah query hapus berhasil?
    if( $hapus ){
        header('Location:../datatambahan.php?Berhasil=hapus');
    } else {
        header('Location:../datatambahan.php?gagal_menghapus');
    }

}

if(isset($_GET['warna1']) ){

    // ambil id dari query string
    $id = $_GET['warna1'];

    // buat query hapus
    $query1 = "DELETE FROM warna WHERE id=$id";
    $hapus = mysqli_query($conn, $query1);

    // apakah query hapus berhasil?
    if( $hapus ){
        header('Location:../datatambahan.php?Berhasil=hapus');
    } else {
        header('Location:../datatambahan.php?gagal_menghapus');
    }

}

if(isset($_GET['driver1']) ){

    // ambil id dari query string
    $id = $_GET['driver1'];

    // buat query hapus
    $query1 = "DELETE FROM driver WHERE id=$id";
    $hapus = mysqli_query($conn, $query1);

    // apakah query hapus berhasil?
    if( $hapus ){
        header('Location:../datatambahan.php?Berhasil=hapus');
    } else {
        header('Location:../datatambahan.php?gagal_menghapus');
    }

}


 ?>