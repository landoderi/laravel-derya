<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Nama siswa : {{ $nama }} <br>
    Mata pelajaran : {{ $mapel }} <br>
    Nilai : {{ $nilai }} <br>
    Status kelulusan : @if($nilai > 75)
        Lulus
        @else
        Tidak lulus
        @endif
</body>
</html>