@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-header">
            Categories
        </div>
        <table class="card-body table ">
            <thead>
            <tr>
                <th  scope="col">Tag name</th>
                <th class="text-center" scope="col">Edit Tag</th>
                <th class="text-center" scope="col">Delete Tag</th>
            </tr>
            </thead>
            <tbody>
            @if($tags->count()>0)
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->tag }}</td>
                        <td class="text-center"> <a href="{{ route('tag.edit', ['id' => $tag->id ]) }}" class="btn btn-primary btn-sm">Edit</a> </td>
                        <td class="text-center"> <a href="{{ route('tag.delete', ['id' => $tag->id ]) }}" class="btn btn-danger btn-sm">Delete</a> </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="3" class="text-center">There are no tags :(</th>
                </tr>
            @endif
            </tbody>
        </table>
    </div
@stop
