<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data mahasiswa</title>
</head>
<body>
    <h2>Tambah Data mahasiswa</h2>
    <from action "mahasiswa.php" method="post">
        <table cell padding="5px">
            <tr>
                <td><label for="nama">NAMA</label></td>
                    <td>:</td>
                <td><input type="text" name="nama" id="nama"/></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                    <td>:</td>
                <td><input type="text" name="nim" id="nim"/></td>
            </tr>
            <tr>
                <td><label for="foto">FOTO</label></td>
                    <td>:</td>
                <td><input type="file" name="foto" id="foto"/></td>
            </tr>
            <tr>
                <td><label for="uts">UTS</UAS></td>
                    <td>:</td>
                <td><input type="number" name="uts" id="uts"/></td>
            </tr>
            <tr>
                <td><label for="uas">UAS</UAS></td>
                    <td>:</td>
                <td><input type="number" name="uas" id="uas"/></td>
            </tr>
            <tr>
                <td><label for="tugas">TUGAS</UAS></td>
                    <td>:</td>
                <td><input type="number" name="tugas" id="tugas"/></td>
            </tr>
        </table>
        <button type="submit" name="submit" id="submit"></button>
</body>
</html>