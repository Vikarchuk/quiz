@extends('layouts.admin')

@section('header')
    <h3>Create test</h3>
@endsection

@section('main_content')
    <div class="container">
        @include('admin.parts.errorsChecking')
        <div class="form-group">
            <form action="{{route('admin.tests.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name of test">
                </div>
                <div class="form-group">
                    <input type="text" name="performance_time" class="form-control" placeholder="Amount of minutes for test">
                </div>
                <div class="form-group">
                    <label for="">Select Categories</label><br>
                    @foreach($categories as $category)
                        <label>{{$category->name}}</label>
                        <input type="checkbox" name="categories[]" value="{{$category->id}}" placeholder="Select category"/><br>
                    @endforeach
                </div>
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Create Test"/>
            </form>
        </div>
        @if ($tests->count() > 0)
            <div class="form-group">
                <hr>
                <form action="{{route('admin.questions.store')}}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <h2 class="mt-2" align="center">Add question to test</h2>
                        <table class="table table-bordered" id="dynamic_field">
                            <div class="form-group">
                                <label for="">Select Test</label>
                                <select name="test" id="inputState" class="form-control">
                                    @foreach($tests as $test)
                                        <option selected value="{{$test->id}}">{{$test->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <tr>
                                <td>
                                    <textarea name="text" placeholder="Enter question"
                                           class="form-control question_list" required
                                    ></textarea>
                                <td>
                                    <textarea name="answers[]" placeholder="Enter answer"
                                           class="form-control options_list" required
                                    ></textarea>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           name="correct[]"
                                           value="1"
                                           placeholder="Wright answer"
                                           class="form-control"
                                    />
                                </td>
                                </td>
                                <td>
                                    <button type="button" name="addAnswer" id="addAnswer" class="btn btn-success mb-2">
                                        Add Answer
                                    </button>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" name="addQuestion" id="addQuestion" class="btn btn-success mb-2 mr-2"
                               value="Add Question"/>
                    </div>
                </form>
            </div>
        @else
            <div>
                Tests Not Found
            </div>
        @endif
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            var n = 1;
            $('#addAnswer').click(function () {
                n++;
                $('#dynamic_field').append('' +
                    '<tr id="row' + n + '" class="dynamic-added">' +
                    '<td>' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="answers[]" required placeholder="Iveskite atsakyma" class="form-control question_list" />' +
                    '</td>' +
                    '<td>' +
                    '<input type="checkbox" name="correct[]" value="' + n + '" class="form-control question_list" />' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" name="remove" id="' + n + '" class="btn btn-danger btn_remove">X</button>' +
                    '</td>' +
                    '</tr>');
            });
            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>

@endsection
