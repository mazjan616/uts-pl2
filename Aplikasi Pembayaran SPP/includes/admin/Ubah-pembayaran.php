<?php
    if(isset($_POST['submit'])) {
        if($admin->ubahDataPembayaran(
            $_POST['id_petugas'],
            $_POST['nisn'],
            $_POST['tgl_bayar'],
            $_POST['bulan_bayar'],
            $_POST['tahun_bayar'],
            $_POST['id_spp'],
            $_POST['jumlah_bayar'],
            $_GET['id_pembayaran']
            ))
        {
            header('Location: ?p=pembayaran');
            $_SESSION['pesan'] = "Data Pembayaran berhasil diubah";
        } 
        else 
        {
            header('Location: ?p=pembayaran');
            $_SESSION['pesan'] = "Data Pembayaran gagal diubah";
        }
    }

    if(isset($_GET['id_pembayaran'])) {
        $dt_pembayaran = $admin->getDataPembayaranByID($_GET['id_pembayaran']);

        foreach ($dt_pembayaran as $row) :
?>

<h2>Ubah Data Pembayaran</h2>
<form method="post">
    <label for="id_pembayaran">ID Pembayaran</label>
    <br>
    <input type="text" name="id_pembayaran" id="id_pembayaran" required value="<?= $row['id_pembayaran']; ?>" disabled>
    <br>
    <br>

    <label for="nisn">NISN</label>
    <br>
    <select name="nisn" id="nisn" required value="<?= $row['nisn']; ?>">
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
    <input type="number" name="tgl_bayar" id="tgl_bayar" required value="<?= $row['tgl_bayar']; ?>">
    <br>
    <br>

    <label for="bulan_bayar">Bulan Bayar</label>
    <br>
    <input type="text" name="bulan_bayar" id="bulan_bayar" required>
    <br>
    <br>

    <label for="tahun_bayar">Tahun Bayar</label>
    <br>
    <input type="number" name="tahun_bayar" id="tahun_bayar" required value="<?= $row['tahun_bayar']; ?>">
    <br>
    <br>

    <label for="id_spp">ID SPP</label>
    <br>
    <select name="id_spp" id="id_spp" value="<?= $row['id_spp']; ?>">
  
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
    <input type="number" name="jumlah_bayar" id="jumlah_bayar" required value="<?= $row['jumlah_bayar']; ?>">
    <br>
    <br>

    <button type="submit" name="submit">Simpan</button>
    <a href="?p=pembayaran"> <input type='button' value='Batal'></a>
</form>

<?php
    endforeach;
    }
?>