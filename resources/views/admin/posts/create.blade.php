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
                <div class="form-group custom-file mb-2">
                    <label for="title" class="custom-file-label">Featured image</label>
                    <input type="file" name="featured" class="custom-file-input">
                </div>
                <div class="form-group ">
                    <label for="category">Select a category</label>
                    <select  name="category_id" class="custom-select" >
                      @foreach ($categories as $category)
                        <option class="form-control" value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    @foreach($tags as $tag)
                     <div class="checkbox">
                         <label><input name="tags[]" value="{{ $tag->id }}" type="checkbox">{{ $tag->tag }}</label>
                     </div>
                    @endforeach
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
