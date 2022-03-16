<?php
include('connection.php');
?>

<h3>Aplikasi Mahasiswa</h3>

<a href="tambah.php">Tambah</a>
</br>

<table border="1">
    <thead>
        <tr>
            <th>NIM</th>
            <th>NAMA</th>
            <th>KELAS</th>
        </tr>
    </thead>
    <tbody>

<?php
$sql = "select * from tbl_mahasiswa";
$result = pg_query($sql);

while($row = pg_fetch_object($result)):
?>
        <tr>
            <td><?= $row->nim ?></td>
            <td><?= $row->nama ?></td>
            <td><?= $row->kelas ?></td>
            <td>
<?php echo '<a href="hapus.php?nim=' . $row->nim . '">Hapus</a>' ?>
</td>
<td>
<?php echo '<a href="ubah.php?nim=' . $row->nim . '">Ubah</a>' ?>
</td>

        </tr>
<?php endwhile; ?>
    </tbody>
</table>