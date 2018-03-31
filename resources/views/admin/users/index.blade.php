@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-header">
            Published Posts
        </div>
        <table class="card-body table ">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Permissions</th>
                <th class="text-center" scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @if($users->count()>0)
                @foreach($users as $user)
                    <tr>
                        <td class=" align-middle"> <img src="{{ asset($user->profile->avatar) }}" alt="" class="rounded " height="50" width="50"> </td>
                        <td class="text-center align-middle">{{ $user->name }}</td>
                        <td class="text-center align-middle"> <a href="{{ route('user.admin', ['id' => $user->id ]) }}" class="btn btn-primary btn-sm ">

                            @if($user->admin)
                                Remove Admin Permissions
                            @else
                                Give  Admin  Permissions
                            @endif
                        </a> </td>
                        <td class="text-center align-middle"> <a href="#" class="btn btn-danger btn-sm ">Delete</a> </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="4" class="text-center">There are no users :(</th>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@stop
