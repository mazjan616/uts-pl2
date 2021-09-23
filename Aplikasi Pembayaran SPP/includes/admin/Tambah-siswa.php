<?php
    if(isset($_POST['submit'])) {
        $simpan = $admin->tambahDataSiswa(
            $_POST['nisn'],
            $_POST['nis'],
            $_POST['nama_lengkap'],
            $_POST['id_kelas'],
            $_POST['alamat'], 
            $_POST['no_telp'], 
            $_POST['id_spp']
        );

        if($simpan) {
            header('Location: ?p=siswa');
            $_SESSION['pesan'] = "Data Siswa berhasil ditambah";
        } else {
            header('Location: ?p=siswa');
            $_SESSION['pesan'] = "Data Siswa gagal ditambah";
        }
    }
?>

<h2>Tambah Data Siswa</h2>
<form method="post">
    <label for="nisn">NISN</label>
    <br>
    <input type="text" name="nisn" id="nisn" required>
    <br>
    <br>

    <label for="nis">NIS</label>
    <br>
    <input type="text" name="nis" id="nis" required>
    <br>
    <br>

    <label for="nama_lengkap">Nama Lengkap</label>
    <br>
    <input type="text" name="nama_lengkap" id="nama_lengkap" required>
    <br>
    <br>

    <label for="id_kelas">Kelas</label>
    <br>
    <select name="id_kelas" id="id_kelas">
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
    <input type="text" name="alamat" id="alamat" required>
    <br>
    <br>

    <label for="no_telp">No Telp</label>
    <br>
    <input type="text" name="no_telp" id="no_telp" required>
    <br>
    <br>

    <label for="id_spp">Tahun</label>
    <br>
    <select name="id_spp" id="id_spp">
  
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