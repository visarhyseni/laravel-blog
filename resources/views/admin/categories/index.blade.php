@extends('layouts.app')


@section('content')
<div class="card">
    <table class="card-body table ">
      <thead>
        <tr>
          <th  scope="col">Category name</th>
          <th class="text-center" scope="col">Edit Category</th>
          <th class="text-center" scope="col">Delete Category</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <td>{{ $category->name }}</td>
          <td class="text-center"> <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-primary btn-sm">Edit</a> </td>
          <td class="text-center"> <a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-danger btn-sm">Delete</a> </td>

        </tr>
        @endforeach

      </tbody>
    </table>
</div
@stop
