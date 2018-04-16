@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-header">
            Published Posts
        </div>
        <table class="card-body table ">
            <thead>
            <tr>
                <th scope="col">Comment</th>
                <th class="text-center" scope="col">User</th>
                <th class="text-center" scope="col">Post</th>
                <th class="text-center" scope="col">Edit Comment</th>
                <th class="text-center" scope="col">Delete Comment</th>
            </tr>
            </thead>
            <tbody>
            @if($comments->count()>0)
                @foreach($Comments as $comment)
                    <tr>
                        <td class="text-center">{{ $comment->name }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->post->title }}</td>
                        {{--<td class="text-center"> <a href="{{ route('post.edit', ['id' => $post->id ]) }}" class="btn btn-primary btn-sm">Edit</a> </td>--}}
                        {{--<td class="text-center"> <a href="{{ route('post.delete', ['id' => $post->id ]) }}" class="btn btn-danger btn-sm">Delete</a> </td>--}}
                    </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="4" class="text-center">There are no comments :(</th>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@stop
