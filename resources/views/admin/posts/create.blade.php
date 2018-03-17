@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create a new post
        </div>

        <div class="card-body">
            <form class="" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Featured image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Content</label>
                    <textarea name="content" id="content" rows="5" cols="5" class="form-control"></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Store Post</button>
                </div>

            </form>
        </div>
    </div>
@stop
