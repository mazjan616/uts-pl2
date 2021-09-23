<?php 
    require_once 'header.php';

    if(isset($_GET['p'])) {

        // Navigasi Siswa
        if($_GET['p'] == 'siswa') {
            require_once 'data-siswa.php';
        } elseif($_GET['p'] == 'tambah-siswa') {
            require_once 'tambah-siswa.php';
        } elseif($_GET['p'] == 'ubah-siswa') {
            require_once 'ubah-siswa.php';
        } elseif($_GET['p'] == 'hapus-siswa') {
            if($admin->hapusDataSiswa($_GET['nisn']))
            {
                $admin->hapusDataPembayaran($_GET['nisn']);
                header('Location: ?p=siswa');
                $_SESSION['pesan'] = "Data Siswa berhasil dihapus";
            }
            else
            {
                header('Location: ?p=siswa');
                $_SESSION['pesan'] = "Data Siswa gagal dihapus";
            }

        // Navigasi Kelas
        } elseif($_GET['p'] == 'kelas') {
            require_once 'data-kelas.php'; 
        } elseif($_GET['p'] == 'tambah-kelas') {
            require_once 'tambah-kelas.php'; 
        } elseif($_GET['p'] == 'ubah-kelas') {
            require_once 'ubah-kelas.php';
        } elseif($_GET['p'] == 'hapus-kelas') {
            if($admin->hapusDataKelas($_GET['id_kelas']))
            {
                header('Location: ?p=kelas');
                $_SESSION['pesan'] = "Data Kelas berhasil dihapus";
            }
            else
            {
                header('Location: ?p=kelas');
                $_SESSION['pesan'] = "Data kelas gagal dihapus";
            }

        // Navigasi SPP
        } elseif($_GET['p'] == 'spp') {
            require_once 'data-spp.php'; 
        } elseif($_GET['p'] == 'tambah-spp') {
            require_once 'tambah-spp.php'; 
        } elseif($_GET['p'] == 'ubah-spp') {
            require_once 'ubah-spp.php';
        } elseif($_GET['p'] == 'hapus-spp') {
            if($admin->hapusDataSPP($_GET['id']))
            {
                header('Location: ?p=spp');
                $_SESSION['pesan'] = "Data SPP berhasil dihapus";
            }
            else
            {
                header('Location: ?p=spp');
                $_SESSION['pesan'] = "Data SPP gagal dihapus";
            }
    

        // baris kode untuk navigasi pembayaran
        } elseif($_GET['p'] == 'pembayaran') {
            require_once 'data-pembayaran.php';
        } elseif($_GET['p'] == 'tambah-pembayaran') {
            require_once 'tambah-pembayaran.php';
        } elseif($_GET['p'] == 'ubah-pembayaran') {
            require_once 'ubah-pembayaran.php';
        } elseif($_GET['p'] == 'hapus-pembayaran') {
            if($admin->hapusDataPembayaran($_GET['id_pembayaran'])) // digunakan untuk hapus data pembayaran
            {
                header('Location: ?p=pembayaran');
                $_SESSION['pesan'] = "Data Pembayaran berhasil dihapus";
            }
            else
            {
                header('Location: ?p=pembayaran');
                $_SESSION['pesan'] = "Data Pembayaran gagal dihapus";
            }

        // baris kode untuk navigasi petugas
        } elseif($_GET['p'] == 'petugas') {
            require_once 'data-petugas.php';
        } elseif($_GET['p'] == 'tambah-petugas') {
            require_once 'tambah-petugas.php';
        } elseif($_GET['p'] == 'ubah-petugas') {
            require_once 'ubah-petugas.php';
        } elseif($_GET['p'] == 'hapus-petugas') {
            if($admin->hapusDataPetugas($_GET['id'])) // digunakan untuk hapus data petugas
            {
                header('Location: ?p=petugas');
                $_SESSION['pesan'] = "Data Petugas berhasil dihapus";
            }
            else
            {
                header('Location: ?p=petugas');
                $_SESSION['pesan'] = "Data Petugas gagal dihapus";
            }

    
        // Navigasi LogOut
        } elseif($_GET['p'] = 'logout') {
            header('Location: ../../index.php');
            session_destroy();
        }
    } 

    require_once 'footer.php'; 
?>