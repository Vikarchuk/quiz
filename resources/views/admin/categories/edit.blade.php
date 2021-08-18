@extends('layouts.admin')

@section('header')
    <h1>Edit category</h1>
@endsection

@section('main_content')
    @include('admin.parts.errorsChecking')
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.categories.update', ['category' => $category->id]) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="name"
                   value="{{ old('name') ?? $category->name }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection
