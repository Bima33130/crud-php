<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENCARIAN</title>
    <link rel="stylesheet" type="text/css" href="coba_css/gaya.css">
</head>
<body>
    <center><h1>Pencarian DATA SISWA<h1></center>
    <form method="GET" action="indexi.php" class="coba">
        <label>Kata Pencarian :</label>
        <input type="text" name="kata_cari" value="<?php if (isset ($_GET['kata_cari'])) 
        { echo $_GET['kata_cari']; }?>" />
        <button type="submit">Cari</button>
    </form>
    <table>
        <thead border="1">
            <tr>
                <th>No</th>
                <th>Id Siswa</th>
                <th>Nama Siswa</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah asal</th>
            
            </tr>
        </thead>
        <tbody>
            <?php
            //untuk me include kan koneksi
            include('config.php');

            //jika kita klik cari, maka yang tampil query cari ini
            if(isset($_GET['kata_cari']))
            {
                //menampung variable kata_cari dari form pencarian
                $cari = $_GET['kata_cari'];

                //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
                //jika ingin mencari 1 ketentuan saja query nya ini: SELECT * FROM calon_siswa WHERE id like '%".$kata_cari".%'
                
                $query = mysqli_query($db,"select * from calon_siswa where id like 
                '%".$cari."%' OR nama like 
                '%".$cari."%' OR alamat like
                '%".$cari."%' OR jenis_kelamin like 
                '%".$cari."%' OR agama like 
                '%".$cari."%' OR sekolah_asal like
                '%".$cari."%' ");

            } else{
                //jika tidak ada pencarian, deafult yang dijalankan query ini
                $query = mysqli_query($db,"select * from calon_siswa ");

            }
            $no = 1;
            
            //kalau ini melakukan foreach atau perulangan 
            while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['jenis_kelamin']; ?></td>
                <td><?php echo $row['agama']; ?></td>
                <td><?php echo $row['sekolah_asal']; ?></td>
            
            <td>
                <?php echo "<a href='form-edit.php?id=".$row['id']."'>Edit |</a>";
                echo "<a href='hapus.php?id=".$row['id']."'>Hapus</a>"; ?>
            </td>
            </tr>

            <?php } ?>
        
        </tbody>
    </table>
        <center><h3><a href="index.php" class="back">Kembali</a></h3><center>
</body>
</html>