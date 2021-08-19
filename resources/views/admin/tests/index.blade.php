@extends('layouts.admin')

@section('header')
    <h3>Tests</h3>
@endsection

@section('main_content')
    <div class="col-xs-12">
        <div class="box">
            @include('admin.parts.errorsChecking')
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.tests.create') }}" title="Create a test"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @if($tests->count() > 0)
                        @foreach ($tests as $test)
                            <tr>
                                <td>{{ $test->id }}</td>
                                <td>{{ $test->name }}</td>
                                <td>
                                    <form action="{{ route('admin.tests.destroy', $test->id) }}" method="POST">
                                        <a href="{{ route('admin.tests.show', $test->id) }}" title="show">
                                            <i class="fas fa-eye text-success  fa-lg"></i>
                                        </a>
                                        <a href="{{ route('admin.tests.edit', $test->id) }}">
                                            <i class="fas fa-edit  fa-lg"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">
                                <div>
                                    Tests Not Found
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {{--                {{ $tests->links() }}--}}
            </div>
        </div>
    </div>
@endsection
