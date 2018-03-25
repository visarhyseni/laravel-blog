@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-header">
            Trashed Posts
        </div>
        <table class="card-body table ">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th class="text-center" scope="col">Title</th>
                <th class="text-center" scope="col">Edit Post</th>
                <th class="text-center" scope="col">Restore Post</th>
                <th class="text-center" scope="col">Delete Post</th>
            </tr>
            </thead>
            <tbody>
            @if($posts->count()>0)
                @foreach($posts as $post)
                    <tr>
                        <td class="text-center"> <img src="{{ $post->featured }}" alt="{{ $post->title }}" class="rounded" height="50" width="50"> </td>
                        <td>{{ $post->title }}</td>
                        <td class="text-center"> <a href="" class="btn btn-primary btn-sm">Edit</a> </td>
                        <td class="text-center"> <a href="{{ route('post.restore',['id' => $post->id]) }}" class="btn btn-success btn-sm">Restore</a> </td>
                        <td class="text-center"> <a href="{{ route('post.kill', ['id' => $post->id ]) }}" class="btn btn-danger btn-sm">Delete</a> </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center">There are no trashed posts :(</th>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@stop
