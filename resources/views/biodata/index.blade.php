@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Biodata</h2>
    <a href="{{ route('biodata.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tgl Lahir</th>
            <th>JK</th>
            <th>Agama</th>
            <th>Foto</th>
            <th>Tinggi</th>
            <th>Berat</th>
            <th>Aksi</th>
        </tr>
        @foreach ($biodata as $i => $b)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $b->nama }}</td>
            <td>{{ $b->tgl_lahir }}</td>
            <td>{{ $b->jk }}</td>
            <td>{{ $b->agama }}</td>
            <td>
                @if($b->foto)
                    <img src="{{ asset('storage/'.$b->foto) }}" width="60">
                @endif
            </td>
            <td>{{ $b->tinggi_badan }} cm</td>
            <td>{{ $b->berat_badan }} kg</td>
            <td>
                <a href="{{ route('biodata.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('biodata.destroy', $b->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
