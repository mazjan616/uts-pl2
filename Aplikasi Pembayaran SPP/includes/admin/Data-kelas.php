<h2>Data Kelas</h2>
<a href="?p=tambah-kelas">Tambah Kelas</a>
<br><br>

<?php
    if(isset($_SESSION['pesan'])) {
        echo $_SESSION['pesan'];
        unset($_SESSION['pesan']);
        echo '<br/>';
    }
?>

<table border="1">
    <tr>
        <th>No.</th>
        <th>ID Kelas</th>
        <th>Nama Kelas</th>
        <th>Kompetensi Keahlian</th>
 </tr>
  
<?php
    $no = 1;
    $kelas = $admin->getDataKelas();
    while($dt_kelas = mysqli_fetch_assoc($kelas)) {
?>

   <tr>
        <td><?= $no++; ?></td>
        <td><?= $dt_kelas['id_kelas']; ?></td>
        <td><?= $dt_kelas['nama_kelas']; ?></td>
        <td><?= $dt_kelas['kompetensi_keahlian']; ?></td>
        <td><a href="?p=ubah-kelas&id_kelas=<?= $dt_kelas['id_kelas']; ?>">Ubah</a>|<a href="?p=hapus-kelas&id_kelas=<?= $dt_kelas['id_kelas']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a></td>
   </tr>

  <?php
  }
  ?>

</table>