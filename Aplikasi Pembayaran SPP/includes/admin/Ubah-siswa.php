<?php
    if(isset($_POST['submit'])) {
        if($admin->ubahDataSiswa(
            $_POST['nis'],
            $_POST['nama'],
            $_POST['id_kelas'],
            $_POST['alamat'],
            $_POST['no_telp'],
            $_POST['id_spp'],
            $_GET['nisn']
            ))
        {
            header('Location: ?p=siswa');
            $_SESSION['pesan'] = "Data Siswa berhasil diubah";
        } 
        else 
        {
            header('Location: ?p=siswa');
            $_SESSION['pesan'] = "Data Siswa gagal diubah";
        }
    }

    if(isset($_GET['nisn'])) {
        $dt_siswa = $admin->getDataSiswaByNisn($_GET['nisn']);

        foreach ($dt_siswa as $row) :
?>

<h2>Ubah Data Siswa</h2>
<form method="post">
    <label for="nis">NISN</label>
    <br>
    <input type="text" name="nisn" id="nisn" required value="<?= $row['nisn']; ?>" disabled>
    <br>
    <br>

    <label for="nis">NIS</label>
    <br>
    <input type="text" name="nis" id="nis" required value="<?= $row['nis']; ?>">
    <br>
    <br>

    <label for="nama">Nama Lengkap</label>
    <br>
    <input type="text" name="nama" id="nama" required value="<?= $row['nama_lengkap']; ?>">
    <br>
    <br>

    <label for="id_kelas">Kelas</label>
    <br>
    <select name="id_kelas" id="id_kelas" required value="<?= $row['id_kelas']; ?>">
        <?php
            $dt_spp = $admin->getDataKelas();
            foreach ($dt_spp as $row) :
        ?>
   
            <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>;

        <?php
            endforeach;
        ?>
    </select>
    <br>
    <br>

    <label for="alamat">Alamat</label>
    <br>
    <input type="text" name="alamat" id="alamat">
    <br>
    <br>

    <label for="no_telp">No Telp</label>
    <br>
    <input type="text" name="no_telp" id="no_telp">
    <br>
    <br>

    <label for="id_spp">Tahun</label>
    <br>
    <select name="id_spp" id="id_spp" required value="<?= $row['id_spp']; ?>">
  
        <?php
            $dt_spp = $admin->getDataSPP();
            foreach ($dt_spp as $row) :
        ?>
   
            <option value="<?= $row['id_spp']; ?>"><?= $row['tahun']; ?></option>;

        <?php
            endforeach;
        ?>

    </select>
    <br>
    <br>

    <button type="submit" name="submit">Simpan</button>
    <a href="?p=siswa"> <input type='button' value='Batal'></a>
</form>

<?php
    endforeach;
    }
?>