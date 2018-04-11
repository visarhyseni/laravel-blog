@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create a new user
        </div>

        <div class="card-body">
            <form class="" action="{{ route('settings.update') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
                </div>
                <div class="form-group">
                    <label for="email">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
                </div>
                <div class="form-group">
                    <label for="address">Contact Email</label>
                    <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Update Settings</button>
                </div>
            </form>
        </div>
    </div>
@stop
