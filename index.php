<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: Login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORMATIKA KELAS A</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>WEB INFORMATIKA </h1>
    <hr>
    <table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td>
            <a href="index.php">Home</a>
        </td>
         <td>
            <a href="profile.php">Profile</a>
        </td>
        <td>
            <a href="contact.php">Contact</a>
        </td>
        <td>
            <a href="mahasiswa.php">Data Mahasiswa</a>
        </td>
    </tr>

   
</table>
    <h2>Sambutan kaprodi </h2>
    <img src="assets/images/kaprodi.jpg" alt="kaprodi"  height="200px"/>
   <p> 
    <b>Nama:</b> M. Firmansyah, PDIP.<br><br>

    <b>Jabatan:</b> <i>gatau</i><br><br>

    <b>Sambutan:</b><br>
    Selamat datang di Program Studi Informatika, Semoga tercapai.
</p>
<h3>daftar publikasi</h3>
    <ul>
        <li>scopus</li>
        <ul>
            <li>sentimen analysis</li>
        
        </ul>
        <li>WOS</li>
        <li>sinta</li> 
    </ul>
</body>
</html>