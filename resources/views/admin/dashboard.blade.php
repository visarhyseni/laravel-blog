@extends('layouts.app')

@section('content')
<div class="card p-1">
    <div class="card-header mb-2">Dashboard</div>

    <div class="row">
        <div class="col-md-3">
            <div class="card bg-light text-center" >
                <div class="card-header">Published Posts</div>
                <div class="card-body text-primary">
                    <h5 class="card-title">{{ $post_count }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-light text-center" >
                <div class="card-header">Trashed Posts</div>
                <div class="card-body text-danger">
                    <h5 class="card-title">{{ $trashed_count }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-light text-center" >
                <div class="card-header">Categories</div>
                <div class="card-body text-success">
                    <h5 class="card-title">{{ $categories_count }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-light text-center" >
                <div class="card-header">Users</div>
                <div class="card-body text-success">
                    <h5 class="card-title">{{ $user_count }}</h5>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection
