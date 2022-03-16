<?php
include('connection.php');

$sql = "select * from tbl_mahasiswa where nim='" . $_GET['nim'] . "'";
$result = pg_query($sql);
$data = pg_fetch_object($result);
?>

<h3>Form Ubah Data</h3>

<form method="post">
    NIM : 
<?php echo '<input type="text" name="nim" value="' . $data->nim . '" readonly><br>' ?>
    NAMA : 
<?php echo '<input type="text" name="nama" value="' . $data->nama . '"><br>' ?>
    KELAS : 
<?php echo '<input type="text" name="kelas" value="' . $data->kelas . '"><br>' ?>
    <input type="submit" value="Simpan">
</form>

<?php
if(isset($_POST['nim']) and !empty($_POST['nim'])) {
    $sql = "update tbl_mahasiswa set nama='" . $_POST['nama'] . "', kelas='" . $_POST['kelas'] . 
        "' where nim='" . $_POST['nim'] . "'";
    $result = pg_affected_rows(pg_query($sql));
    if($result == 1) {
        echo '<script type="text/javascript">';
        echo 'alert("Perubahan data telah tersimpan");';
        echo 'window.location.href="index.php";';
        echo '</script>';
    }
}
?>
