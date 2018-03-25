@extends('layouts.app')


@section('content')
<div class="card">
  <div class="card-header">
    Categories
  </div>
    <table class="card-body table ">
      <thead>
        <tr>
          <th  scope="col">Category name</th>
          <th class="text-center" scope="col">Edit Category</th>
          <th class="text-center" scope="col">Delete Category</th>
        </tr>
      </thead>
      <tbody>
      @if($categories->count()>0)
        @foreach($categories as $category)
        <tr>
          <td>{{ $category->name }}</td>
          <td class="text-center"> <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-primary btn-sm">Edit</a> </td>
          <td class="text-center"> <a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-danger btn-sm">Delete</a> </td>

        </tr>
        @endforeach
      @else
          <tr>
            <th colspan="3" class="text-center">There are no categories :(</th>
          </tr>
      @endif
      </tbody>
    </table>
</div
@stop
