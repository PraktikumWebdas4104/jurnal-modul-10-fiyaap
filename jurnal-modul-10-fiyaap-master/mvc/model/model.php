<?php
	class model{
		//inisialisasi awal untuk class biasa disebut instansiasi
		// var $host = "localhost";
		// var $uname = "root";
		// var $pass = "";
		// var $db = "6701170003"; //isi sesuai nama database anda
		// var $conn = "";
		function __construct(){
			//buatlah koneksi seperti modul 9 kemarin
			$this->conn = mysqli_connect("localhost", "root", "", "6701170003");//buatlah koneksi secara OOP
			
			
		}
		
		function execute($query){
			return $this->conn->query($query);
		}
		
		function selectAll(){
			//query select*from 
			$query = "SELECT * FROM mahasiswa";
			return $this->execute($query);
		}
		
		function selectMhs($nim){
			$query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
			//query select mahasiswa berdasarkan nim
			return $this->execute($query);
		}
		
		function updateMhs($nim, $nama, $angkatan, $fakultas, $prodi){
			$query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', angkatan='$angkatan', fakultas='$fakultas', program='$prodi' WHERE nim='$nim'";
			//query update nim, nama, angkatan, fakultas, prodi
			return $this->execute($query);
		}
		
		function deleteMhs($nim){
			$query = "DELETE FROM mahasiswa WHERE nim='$nim'";
			//query delete berdasarkan nim
			return $this->execute($query);
		}
		
		function insertMhs($nim, $nama, $angkatan, $fakultas, $prodi){
			$query = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$angkatan', '$fakultas', '$prodi')";
			//query insert nim,nama, angkatan, fakultas, prodi
			return $this->execute($query);
		}
		
		function fetch($var){
			return mysqli_fetch_array($var);
		}
		
		//pasangan construct adalah destruct untuk menghapus inisialisasi class pada memori
		function __destruct(){
		}
	}
?>