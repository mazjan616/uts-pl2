<?php
    if(isset($_POST['submit'])) {
        $simpan = $admin->tambahDataSPP(
            $_POST['id_spp'],
            $_POST['tahun'], 
            $_POST['nominal']
        );

        if($simpan) {
            header('Location: ?p=spp');
            $_SESSION['pesan'] = "Data SPP berhasil ditambah";
        } else {
            header('Location: ?p=spp');
            $_SESSION['pesan'] = "Data SPP gagal ditambah";
        }
    }
?>

<h2>Tambah data SPP</h2>
<form method="post">
    <label for="id_spp">ID SPP</label>
    <br>
    <input type="text" name="id_spp" id="id_spp" placeholder="Masukan ID SPP" required>
    <br>
    <br>
    
    <label for="tahun">Tahun</label>
    <br>
    <input type="text" name="tahun" id="tahun" placeholder="Masukan tahun ajaran" required>
    <br>
    <br>
    
    <label for="nominal">Nominal</label>
    <br>
    <input type="text" name="nominal" id="nominal" placeholder="Masukan nominal" required>
    <br>
    <br>
    
    <input type="submit" name="submit" value="Simpan">
    <a href="?p=spp"> <input type='button' value='Batal'></a>
</form>