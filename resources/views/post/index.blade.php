@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
 <fieldset>
        <legend>Data posts</legend>
        <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary" style="align:float-right">
            Tambah data
        </a>
        <div class="table-responsive py-2">
        <table class="table">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        @foreach ($post as $data)
        <tr>
            <th bgcolor="blue">{{ $loop->iteration }}</th>
            <th>{{ $data->title }}</th>
            <th bgcolor="red">{{ Str::limit($data->content, 100) }}</th>
            <th>
                <form action="{{ route('post.delete',$data->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('post.edit',$data->id) }}" class="btn btn-sm btn-success">
                        Edit
                    </a>
                    <a href="{{ route('post.show',$data->id) }}" class="btn btn-sm btn-warning">
                        Show
                    </a>
                    <button type="submit" onclick="return confirm('Ar yu sur?')" class="btn btn-sm btn-danger">
                        Delete
                    </button>
                </form>
            </th>
        </tr>
        @endforeach
        </table>
        </div>
    </fieldset>
@endsection
        </div>
    </div>
</div>