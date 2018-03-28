@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create a new tag
        </div>

        <div class="card-body">
            <form class="" action="{{ route('tag.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Store Tag</button>
                </div>

            </form>
        </div>
    </div>
@stop
