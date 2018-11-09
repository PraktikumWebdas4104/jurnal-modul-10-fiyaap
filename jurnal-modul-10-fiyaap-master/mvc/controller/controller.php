<?php
	//include class model
	include "model/model.php";
	
	class controller{
		//variabel public
		public $model;
		
		//inisialisasi awal untuk class
		function __construct(){
			$this->model = new model(); //variabel model merupakan objek baru yang dibuat dari class model

		}
		
		function index(){
			$data = $this->model->selectAll();
			//pada class ini (controller), akses variabel model, akses fungsi selectAll (kalo bingung lihat di class model ada fungsi selectAll)
			//panggil model fungsi selectall
			include "view/view.php"; //memamnggil view.php pada folder view
		}
		
		function viewEdit($nim){
			$data = $this->model->selectMhs($nim);
			//panggil model select data mahasiswa dengan nim ...
			$row = $this->model->fetch($data); //fetch hasil select
			include "view/view_edit.php"; //menampilkan halaman untuk mengedit data
		}
		
		function viewInsert(){
			include "view/view_add.php"; //menampilkan halaman add data
		}
		
		//fungsi updata data
		function update(){
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$angkatan = $_POST['angkatan'];
			$fakultas = $_POST['fakultas'];
			$prodi = $_POST['prodi'];
			
			//panggil model update mahasiswa
			$update = $this->model->updateMhs($nim, $nama, $angkatan, $fakultas, $prodi);
			header("location:index.php");
		}
		
		function delete($nim){
			//panggil model delete data mahasiswa dengan nim ...
			$delete = $this->model->deleteMhs($nim);
			header("location:index.php");
		}
		
		function insert(){
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$angkatan = $_POST['angkatan'];
			$fakultas = $_POST['fakultas'];
			$prodi = $_POST['prodi'];
			
			//panggil model insert mahasiswa
			$insert = $this->model->insertMhs($nim, $nama, $angkatan, $fakultas, $prodi);
			header("location:index.php");
		}
		
		function __destruct(){
		}
	}
?>