<?php

    $koneksi = mysqli_connect("localhost", "root", "root", "ifrizkiweekly");

    //if($koneksi)
    //{
    //    echo "Berhasil Konek";
    //}


    $query = "SELECT * FROM mahasiswa";

    $result = mysqli_query($koneksi, $query);

    //// ambil data (fetch) mahasiswa dari lemari (result)


    // ada 4 cara 
    //-----------------------

    //// mysqli_fetch_row
    //// mysqli_fetch_assoc
    //// mysqli_fetch_object
    //// mysqli_fetch_array
    
    //while ($mhs = mysqli_fetch_assoc($result));
    //{
    //    var_dump($mhs);
    //}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WEB INFORMATIKA A</h1>
    <hr>
    <table border="1" cellspacing="0" cellpadding="15px">
        <tr>
            <td> <a href="index.php">Home</a>
            </td>

            <td> <a href="profile.php">Profile</a>
            </td>

            <td> <a href="contact.php">Contact</a>
            </td>

            <td> <a href="mahasiswa.php">data mahasiswa</a>
            </td>
         <tr>
    <table>
        <h2>Data Mahasiswa</h2>
        <a href="inputdata.php">
            <button>Tambah data</button>
        
        <table border="1" cellpadding="spx">
        <tr>
            <th >No</th>
            <th >Nama</th>
            <th >Nim</th>
            <th >Jurusan</th>
            <th >Email</th>
            <th>NO. Hp</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php 
            $i = 1;
            while($mhs = mysqli_fetch_assoc($result));
            {
        ?>
        <tr>
            <td align="center"><?php $i ?></td>
            <td><?php echo $mhs["nama"] ?></td>
            <td align="center"><?php echo $mhs["nim"] ?></td>
            <td align="center"><?php echo $mhs["jurusan"] ?></td>
            <td align="center"><?php echo $mhs["email"] ?></td>
            <td align="center"><?php echo $mhs["no_hp"] ?></td>
            <td align="center"><img src="assets/images/<?php echo $mhs["foto"] ?> width="70 px"></td>  
            <td>
                <button class="btn-edit">EDIT</button>
                <button class="btn-edit">DELETE</button>
            <td>
        </tr>
        <?php 
            $i++;
            }       
        ?>

</body>
</html>