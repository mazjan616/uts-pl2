<?php
    if(isset($_POST['submit'])) {
        $simpan = $admin->tambahDataPembayaran(
            $_POST['id_pembayaran'],
            $_POST['id_petugas'],
            $_POST['nisn'],
            $_POST['tgl_bayar'],
            $_POST['bulan_bayar'],
            $_POST['tahun_bayar'],
            $_POST['id_spp'], 
            $_POST['jumlah_bayar']
        );

        if($simpan) {
            header('Location: ?p=pembayaran');
            $_SESSION['pesan'] = "Data Pembayaran berhasil ditambah";
        } else {
            header('Location: ?p=pembayaran');
            $_SESSION['pesan'] = "Data Pembayaran gagal ditambah";
        }
    }
?>

<h2>Tambah Data Pembayaran</h2>
<form method="post">

    <label for="id_pembayaran">ID Pembayaran</label>
    <br>
    <input type="text" name="id_pembayaran" id="id_pembayaran" required>
    <br>
    <br>


    <label for="id_petugas">Petugas</label>
    <br>
    <select name="id_petugas" id="id_petugas">
        <?php
            $dt_petugas = $admin->getAllDataPetugas();
            foreach ($dt_petugas as $row) :
        ?>
   
            <option value="<?= $row['id_petugas']; ?>"><?= $row['nama_petugas']; ?></option>;

        <?php
            endforeach;
        ?>
    </select>
    <br>
    <br>

    <label for="nisn">NISN</label>
    <br>
    <select name="nisn" id="nisn">
        <?php
            $dt_siswa = $admin->getDataSiswa();
            foreach ($dt_siswa as $row) :
        ?>
   
            <option value="<?= $row['nisn']; ?>"><?= $row['nama_lengkap']; ?></option>;

        <?php
            endforeach;
        ?>
    </select>
    <br>
    <br>

    <label for="tgl_bayar">Tanggal Bayar</label>
    <br>
    <input type="number" name="tgl_bayar" id="tgl_bayar" required>
    <br>
    <br>

    <label for="bulan_bayar">Bulan Bayar</label>
    <br>
    <input type="text" name="bulan_bayar" id="bulan_bayar" required>
    <br>
    <br>

    <label for="tahun_bayar">Tahun Bayar</label>
    <br>
    <input type="number" name="tahun_bayar" id="tahun_bayar" required>
    <br>
    <br>

    <label for="id_spp">ID SPP</label>
    <br>
    <select name="id_spp" id="id_spp">
  
        <?php
            $dt_spp = $admin->getDataSPP();
            foreach ($dt_spp as $row) :
        ?>
   
            <option value="<?= $row['id_spp']; ?>"><?= $row['id_spp']; ?></option>;

        <?php
            endforeach;
        ?>

    </select>
    <br>
    <br>

    <label for="jumlah_bayar">Jumlah Bayar</label>
    <br>
    <input type="number" name="jumlah_bayar" id="jumlah_bayar" required>
    <br>
    <br>

    <button type="submit" name="submit">Simpan</button>
    <a href="?p=pembayaran"> <input type='button' value='Batal'></a>
</form>