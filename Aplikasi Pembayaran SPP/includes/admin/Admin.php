<?php

    require_once '../../config/Koneksi.php';

    class Admin extends Koneksi {
        public function getDataPetugas($id) {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_petugas WHERE id_petugas = '" . $id . "'");

            return $stmt;
        }

        // CRUD SPP

        public function getDataSPP() {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_spp ORDER BY tahun ASC");

            return $stmt;
        }

        public function tambahDataSPP($id_spp,$tahun, $nominal) {
            $stmt = mysqli_query($this->konek, "INSERT INTO tb_spp VALUES (
                '" . $id_spp . "',
                '" . $tahun . "',
                '" . $nominal . "'
                )");

            if($stmt) {
                return true;
            } else {
                return false;
            }
        }

        public function getDataSPPbyId($id) {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_spp WHERE id_spp = '".$id."'");
          
            return $stmt;
        }
          
        public function ubahDataSPP($tahun, $nominal, $id) {
            $stmt = mysqli_query($this->konek, "UPDATE tb_spp SET 
            tahun = '".$tahun."', 
            nominal = '".$nominal."' 
            WHERE id_spp = ".$id);
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }
          
        public function hapusDataSPP($id) {
            $stmt = mysqli_query($this->konek, "DELETE FROM tb_spp WHERE id_spp = ".$id);
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }


        // CRUD SISWA DAN PEMBAYARAN

        public function getDataSiswa() {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_siswa ORDER BY nisn ASC");
          
            return $stmt;
        }
          
        public function cekDataSiswa($nisn, $nis) {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_siswa WHERE nisn = '$nisn' OR nis = '$nis'");
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }
          
        public function tambahDataSiswa($nisn, $nis, $nama_lengkap, $id_kelas, $alamat, $no_telp, $id_spp) {
            $stmt = mysqli_query($this->konek, "INSERT INTO tb_siswa VALUES (
                '" . $nisn . "',
                '" . $nis . "',
                '" . $nama_lengkap . "',
                '" . $id_kelas . "',
                '" . $alamat . "',
                '" . $no_telp . "',
                '" . $id_spp . "'
                )");

          
                if ($stmt) {
                    return true;
                } else {
                    return false;
                }
        }
          

        public function getDataSiswaByNisn($nisn) {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_siswa WHERE nisn = '$nisn'");
          
            return $stmt;
        }
          
        public function ubahDataSiswa($nis, $nama_lengkap, $id_kelas, $alamat, $no_telp, $id_spp, $nisn) {
            $stmt = mysqli_query($this->konek, "UPDATE tb_siswa SET 
            nis = '".$nis."',
            nama_lengkap = '".$nama_lengkap."',
            id_kelas = '".$id_kelas."',
            alamat = '".$alamat."',
            no_telp = '".$no_telp."',
            id_spp = '".$id_spp."'
            WHERE nisn='".$nisn."'
            ");
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }
          
        public function hapusDataSiswa($nisn) {
            $stmt = mysqli_query($this->konek, "DELETE FROM tb_siswa WHERE nisn = '$nisn'");
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }

        // CRUD PEMBAYARAN 
        
        public function getDataPembayaran() {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_pembayaran ORDER BY tahun_bayar ASC");
          
            return $stmt;
        }
          
        public function tambahDataPembayaran($id_pembayaran, $id_petugas, $nisn, $tgl_bayar, $bulan_bayar, $tahun_bayar, $id_spp, $jumlah_bayar) {
            $stmt = mysqli_query($this->konek, "INSERT INTO tb_pembayaran VALUES (
                '" . $id_pembayaran . "',
                '" . $id_petugas . "',
                '" . $nisn . "',
                '" . $tgl_bayar . "',
                '" . $bulan_bayar . "',
                '" . $tahun_bayar . "',
                '" . $id_spp . "',
                '" . $jumlah_bayar . "'
                )");

          
                if ($stmt) {
                    return true;
                } else {
                    return false;
                }
        }
          

        public function getDataPembayaranByID($id_pembayaran) {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_pembayaran WHERE id_pembayaran = '$id_pembayaran'");
          
            return $stmt;
        }
          
        public function ubahDataPembayaran($id_petugas, $nisn, $tgl_bayar, $bulan_bayar, $tahun_bayar, $id_spp, $jumlah_bayar, $id_pembayaran) {
            $stmt = mysqli_query($this->konek, "UPDATE tb_pembayaran SET 
            id_petugas = '".$id_petugas."',
            nisn = '".$nisn."',
            tgl_bayar = '".$tgl_bayar."',
            bulan_bayar = '".$bulan_bayar."',
            tahun_bayar = '".$tahun_bayar."',
            id_spp = '".$id_spp."',
            jumlah_bayar = '".$jumlah_bayar."'
            WHERE id_pembayaran='".$id_pembayaran."'
            ");
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }
          
        public function hapusDataPembayaran($id_pembayaran) {
            $stmt = mysqli_query($this->konek, "DELETE FROM tb_pembayaran WHERE id_pembayaran = '$id_pembayaran'");
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
            }


        // CRUD PETUGAS

        public function getAllDataPetugas() {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_petugas");
          
            return $stmt;
        }
          
        public function tambahDataPetugas($nama_petugas, $username, $password, $level) {
            $stmt = mysqli_query($this->konek, "INSERT INTO tb_petugas VALUES ('', '$username', '$password', '$nama_petugas', '$level')");
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }
          
        public function ubahDataPetugas($nama_petugas, $username, $password, $level, $id) {
            $stmt = mysqli_query($this->konek, "UPDATE tb_petugas SET nama_petugas = '$nama_petugas', username = '$username', password = '$password', level = '$level' WHERE id_petugas = '$id'");
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }
          
        public function hapusDataPetugas($id) {
            $stmt = mysqli_query($this->konek, "DELETE FROM tb_petugas WHERE id_petugas = '$id'");
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }


        // CRUD Kelas

        public function getDataKelas() {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_kelas ORDER BY id_kelas ASC");

            return $stmt;
        }

        public function tambahDataKelas($id_kelas, $nama_kelas, $kompetensi_keahlian) {
            $stmt = mysqli_query($this->konek, "INSERT INTO tb_kelas VALUES (
                '" . $id_kelas . "',
                '" . $nama_kelas . "',
                '" . $kompetensi_keahlian . "'
                )");

            if($stmt) {
                return true;
            } else {
                return false;
            }
        }

        public function getDataKelasbyId($id_kelas) {
            $stmt = mysqli_query($this->konek, "SELECT * FROM tb_kelas WHERE id_kelas = '".$id_kelas."'");
          
            return $stmt;
        }
          
        public function ubahDataKelas($nama_kelas, $kompetensi_keahlian, $id_kelas) {
            $stmt = mysqli_query($this->konek, "UPDATE tb_kelas SET nama_kelas = '".$nama_kelas."', kompetensi_keahlian = '".$kompetensi_keahlian."' WHERE id_kelas = ".$id_kelas);
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }
          
        public function hapusDataKelas($id_kelas) {
            $stmt = mysqli_query($this->konek, "DELETE FROM tb_kelas WHERE id_kelas = ".$id_kelas);
          
                if($stmt) {
                    return true;
                } else {
                    return false;
                }
        }


    }

?>