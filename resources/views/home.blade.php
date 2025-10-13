@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <a href="{{ route('post.index') }}" class="d-grid gap-2 col-6 mx-auto btn btn-primary" style="align:float-right">
                     Pergi ke Data Post
                </a>
                <div class="d-flex align-items-end flex-column mt-auto p-2"><font color="gray">v 0.0.1</font></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
