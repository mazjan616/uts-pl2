<?php
    if(isset($_POST['submit'])) {
        $nama_petugas = $_POST['nama_petugas'];
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $level = $_POST['level'];

        if($admin->tambahDataPetugas($nama_petugas, $username, $password, $level)) {
            $_SESSION['pesan'] = "Tambah data petugas berhasil";
            header('Location: ?p=petugas');
        } else {
            $_SESSION['pesan'] = "Tambah data petugas gagal";
            header('Location: ?p=petugas');
        }
    }
?>

<h2>Tambah Data Petugas</h2>

<form method="POST">
    <label>Nama Lengkap</label>
    <br/>
    <input type="text" name="nama_petugas" required>
    <br/>
    <br/>
    
    <label>Username</label>
    <br/>
    <input type="text" name="username" required>
    <br/>
    <br/>
    
    <label>Password</label>
    <br/>
    <input type="password" name="password" required>
    <br/>
    <br/>
    
    
    <label>Level</label>
    <br/>
    <select name="level">
        <option value="Admin">Admin</option>
        <option value="Petugas">Petugas</option>
    </select>
    <br>
    <br>

    <button type="submit" name="submit">Simpan</button>
    <a href="?p=petugas"> <input type='button' value='Batal'></a>
</form>