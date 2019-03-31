<?php 
    $nomor = $_POST["nomor"];
    $nama = $_POST["nama"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $nama_ayah = $_POST["nama_ayah"];
    $nama_ibu = $_POST["nama_ibu"];
    $hari_baptis = $_POST["hari_baptis"];
    $tanggal_baptis = $_POST["tanggal_baptis"];
    $oleh = $_POST["oleh"];

    // simpan semua data kedalam array
    $data = array($nomor,$nama,$tempat_lahir,$tanggal_lahir,
                $nama_ayah,$nama_ibu,$hari_baptis,
                $tanggal_baptis,$oleh);

    // Hubung dengan server mysql
    require "connection.php";
    
    // perintah sql untuk menyimpan data ke tabel database
    $sql="INSERT INTO data_kepastoran (nomor, nama, tempat_lahir, tgl_lahir, nm_ayah, nm_ibu, hari_baptis, tgl_baptis, nm_pastor)".
         "VALUES ".
         "('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')";
    $conn->query($sql);
    
    // tutup koneksi dengan server
    mysqli_close($conn);
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php foreach($data as $value) { ?>
        <p><?=$value?></p><br />
    <?php } ?>
</body>
</html>