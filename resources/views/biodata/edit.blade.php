@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Biodata</h2>
    <form action="{{ route('biodata.update', $biodatum->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('biodata.form')
        <button class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
