<?php

$conn = mysqli_connect('localhost', 'root', '', 'kredit_rumah');


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    //ambil data dari tiap elemen dalam form
    $harga = $data['harga'];
    $bunga = $data['bunga'];
    $uangdp = $data['uangdp'];
    $tenor = $data['tenor'];
    $margin = $data['margin'];

    //query insert data
    $query = "INSERT INTO data_kredit VALUES
('', '$harga', '$bunga', '$uangdp','$tenor', '$margin')
";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    // if (mysqli_query($conn, $query)) {
    //     echo "Record updated successfully";
    // } else {
    //     echo "Error updating record: " . mysqli_error($conn);
    // }
}

function hapus($id)
{
    global $conn;
    $query = "DELETE FROM data_kredit WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    //ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $harga = $data['harga'];
    $bunga = $data['bunga'];
    $uangdp = $data['uangdp'];
    $tenor = $data['tenor'];
    $margin = $data['margin'];
    //query insert data
    $query = "UPDATE data_kredit SET
harga = '$harga',
bunga = '$bunga',
uangdp = '$uangdp',
tenor = '$tenor',
margin = '$margin'
WHERE id = '$id'
";
    //echo $query;
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    // if (mysqli_query($conn, $query)) {
    //     echo "Record updated successfully";
    // } else {
    //     echo "Error updating record: " . mysqli_error($conn);
    // }
}
