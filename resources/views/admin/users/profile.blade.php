@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Edit your profile
        </div>

        <div class="card-body">
            <form class="" action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="email">New Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group custom-file mb-2">
                    <label for="title" class="custom-file-label">Avatar</label>
                    <input type="file" name="featured" class="custom-file-input">
                </div>
                <div class="form-group">
                    <label for="name">Facebook profile</label>
                    <input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
                </div>
                <div class="form-group">
                    <label for="name">Youtube profile</label>
                    <input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->profile->about }}</textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>

            </form>
        </div>
    </div>
@stop
