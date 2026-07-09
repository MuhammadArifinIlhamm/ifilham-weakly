<?php

$koneksi = mysqli_connect("localhost", "root", "", "dithoweekly-A");



function tampildata($query)
{
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    $rows = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    return $rows;
}

function inputdata($data)
{
    global $koneksi;

    $nama    = htmlspecialchars($data["nama"]);
    $nim     = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email   = htmlspecialchars($data["email"]);
    $no_hp   = htmlspecialchars($data["no_hp"]);

    $foto = "";

    if($_FILES["foto"]["error"] == 0)
    {
        $foto = time() . "_" . $_FILES["foto"]["name"];

        move_uploaded_file(
            $_FILES["foto"]["tmp_name"],
            "assets/images/" . $foto
        );
    }

    $query = "INSERT INTO mahasiswa
    (nama, nim, jurusan, email, no_hp, foto)
    VALUES
    (
        '$nama',
        '$nim',
        '$jurusan',
        '$email',
        '$no_hp',
        '$foto'
    )";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function deletedata($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}

function editdata($data)
{
    global $koneksi;

    $id      = $data["id"];
    $nama    = htmlspecialchars($data["nama"]);
    $nim     = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email   = htmlspecialchars($data["email"]);
    $no_hp   = htmlspecialchars($data["no_hp"]);
    $fotoLama = $data["fotoLama"];

    $foto = $fotoLama;

    if($_FILES["foto"]["error"] == 0)
    {
        $foto = time() . "_" . $_FILES["foto"]["name"];

        move_uploaded_file(
            $_FILES["foto"]["tmp_name"],
            "assets/images/" . $foto
        );
    }

    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                jurusan = '$jurusan',
                email = '$email',
                no_hp = '$no_hp',
                foto = '$foto'
              WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function register($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password1 = $data["password1"] ?? "";
    $password2 = $data["password2"] ?? "";

    // cek konfirmasi password
    if ($password1 !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    // cek username sudah digunakan atau belum
    $queryrow = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $queryrow);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('Username sudah digunakan!');
              </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password1, PASSWORD_DEFAULT);

    // simpan ke database
    $query = "INSERT INTO user (username, password)
              VALUES ('$username', '$password')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function login($data)
{
    global $koneksi;

    // Ambil input dari form
    $username = strtolower(trim($data["username"]));
    $password = trim($data["password"]);

    // Cari user berdasarkan username
    $result = mysqli_query(
        $koneksi,
        "SELECT * FROM user WHERE username = '$username'"
    );

    // Jika username ditemukan
    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        // Verifikasi password hash
        if (password_verify($password, $row["password"])) {

            // Membuat session login
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["user_id"] = $row["id"];

            return 1;
        }
    }

    return 0;
}
?>