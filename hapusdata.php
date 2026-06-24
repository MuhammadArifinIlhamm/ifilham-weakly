<?php

$conn = mysqli_connect("localhost","root","","ifilham-weakly");

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM mahasiswa WHERE id = $id");

header("Location: mahasiswa.php");
exit;

?>