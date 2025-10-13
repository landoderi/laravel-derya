@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Biodata</h2>
    <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('biodata.form')
        <button class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
