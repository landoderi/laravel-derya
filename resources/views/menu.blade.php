<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center> <h1>{{ $toko }}</h1> </center>
    @foreach ( $data as $perlengkapan)
        nama : {{ $perlengkapan['alat_tulis'] }} <br>
        harga : {{ $perlengkapan['Harga'] }} <br>
        jumlah : {{ $perlengkapan['Jumlah'] }} <br>
        @php $total = $perlengkapan['Jumlah'] * $perlengkapan['Harga']; @endphp
        total : {{ $total }} <br>
        @if($total > 15000)
        keterangan: get diskon 5%
        @else
        keterangan: tidak dapat diskon
        @endif
        <hr>
        
    @endforeach
</body>
</html>