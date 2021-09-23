<?php
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $uname = $_POST['username'];
        $pass = sha1($_POST['password']);
        $level = $_POST['level'];
        $id = $_GET['id'];

        if($admin->ubahDataPetugas($nama, $uname, $pass, $level, $id)) {
            $_SESSION['pesan'] = "Ubah data petugas berhasil";
            header('Location: ?p=petugas');
        } else {
            $_SESSION['pesan'] = "Ubah data petugas gagal";
            header('Location: ?p=petugas');
        }
    }

    $data = $admin->getDataPetugas($_GET['id']);

    foreach ($data as $_GET) :
?>

<h2>Ubah Data Petugas</h2>
<form method="POST">
    <label>Nama Lengkap</label>
    <br/>
    <input type="text" name="nama" required value="<?= $_GET['nama_petugas']; ?>">
    <br/>
    <br/>
    
    <label>Username</label>
    <br/>
    <input type="text" name="username" required value="<?= $_GET['username']; ?>">
    <br/>
    <br/>
    
    <label>Password</label><br/>
    <input type="password" name="password" required value="<?= $_GET['password']; ?>">
    <br/>
    <br/>
    
    <label>Level</label>
    <br/>
    <select name="level">
        <option value="Admin">Admin</option>
        <option value="Petugas">Petugas</option>
    </select>
    <br/>
    <br/>
    
    <button type="submit" name="submit">Ubah</button>
    <a href="?p=petugas"> <input type='button' value='Batal'></a>
</form>

<?php
    endforeach;
?>