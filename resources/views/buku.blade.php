<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nama = "Derya"
    ?>
    <h1>Ini halaman buku</h1>
    <h2>Nama saya: <?php echo $nama ?></h2>

    @php $now= date('d M Y') @endphp
    <h3>Hari ini tanggal {{ $now }}</h3>
</body>
</html>