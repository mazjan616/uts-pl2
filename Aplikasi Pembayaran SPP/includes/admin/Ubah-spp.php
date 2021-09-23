<?php

    if(isset($_POST['submit'])) {
        if($admin->ubahDataSPP($_POST['tahun'], $_POST['nominal'], $_GET['id']))
        {
        header('Location: ?p=spp');
        $_SESSION['pesan'] = "Data SPP berhasil diubah";
        } 
        else 
        {
        header('Location: ?p=spp');
        $_SESSION['pesan'] = "Data SPP gagal diubah";
        }
    }

    if(isset($_GET['id'])) {
        $dt_spp = $admin->getDataSPPbyId($_GET['id']);

        foreach ($dt_spp as $row) :
?>

<h2>Ubah data SPP</h2>
    <form method="post">
        <label for="id_spp">ID SPP</label>
        <br>
        <input type="text" name="id_spp" id="id_spp" value="<?= $row['id_spp']; ?>" disabled>
        <br>
        <br>

        <label for="tahun">Tahun</label>
        <br>
        <input type="text" name="tahun" id="tahun" placeholder="Masukan tahun ajaran" required value="<?= $row['tahun']; ?>">
        <br>
        <br>

        <label for="nominal">Nominal</label>
        <br>
        <input type="text" name="nominal" id="nominal" placeholder="Masukan nominal" required value="<?= $row['nominal']; ?>">
        <br>
        <br>

        <input type="submit" name="submit" value="Simpan">
        <a href="?p=spp"> <input type='button' value='Batal'></a>
    </form>

<?php
        endforeach;
    }
?>