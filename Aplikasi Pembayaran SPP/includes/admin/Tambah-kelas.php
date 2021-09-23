<?php
    if(isset($_POST['submit'])) {
        $simpan = $admin->tambahDataKelas(
            $_POST['id_kelas'],
            $_POST['nama_kelas'], 
            $_POST['kompetensi_keahlian']
        );

        if($simpan) {
            header('Location: ?p=kelas');
            $_SESSION['pesan'] = "Data Kelas berhasil ditambah";
        } else {
            header('Location: ?p=kelas');
            $_SESSION['pesan'] = "Data Kelas gagal ditambah";
        }
    }
?>

<h2>Tambah data Kelas</h2>
<form method="post">

    <label for="id_kelas">ID Kelas</label>
    <br>
    <input type="text" name="id_kelas" id="id_kelas" placeholder="Masukan ID Kelas" required>
    <br>
    <br>
    
    <label for="nama_kelas">Nama Kelas</label>
    <br>
    <input type="text" name="nama_kelas" id="nama_kelas" placeholder="Masukan Nama Kelas" required>
    <br>
    <br>

    <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
    <br>
    <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" placeholder="Masukan Kompetensi Keahlian" required>
    <br>
    <br>
    
    <input type="submit" name="submit" value="Simpan">
    <a href="?p=kelas"> <input type='button' value='Batal'></a>
</form>