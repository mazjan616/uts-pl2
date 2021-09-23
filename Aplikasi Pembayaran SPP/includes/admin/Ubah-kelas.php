<?php

    if(isset($_POST['submit'])) {
        if($admin->ubahDataKelas($_POST['nama_kelas'], $_POST['kompetensi_keahlian'], $_GET['id_kelas']))
        {
        header('Location: ?p=kelas');
        $_SESSION['pesan'] = "Data Kelas berhasil diubah";
        } 
        else 
        {
        header('Location: ?p=kelas');
        $_SESSION['pesan'] = "Data Kelas gagal diubah";
        }
    }

    if(isset($_GET['id_kelas'])) {
        $dt_kelas = $admin->getDataKelasbyId($_GET['id_kelas']);

        foreach ($dt_kelas as $row) :
?>

<h2>Ubah data Kelas</h2>
    <form method="post">
        <label for="id_kelas">ID Kelas</label>
        <br>
        <input type="text" name="id_kelas" id="id_kelas" value="<?= $row['id_kelas']; ?>" disabled>
        <br>
        <br>
        
        <label for="nama_kelas">Nama Kelas</label>
        <br>
        <input type="text" name="nama_kelas" id="nama_kelas" placeholder="Masukan Nama Kelas ajaran" required value="<?= $row['nama_kelas']; ?>">
        <br>
        <br>

        <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
        <br>
        <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" placeholder="Masukan Kompetensi Keahlian" required value="<?= $row['kompetensi_keahlian']; ?>">
        <br>
        <br>

        <input type="submit" name="submit" value="Simpan">
        <a href="?p=kelas"> <input type='button' value='Batal'></a>
    </form>

<?php
        endforeach;
    }
?>