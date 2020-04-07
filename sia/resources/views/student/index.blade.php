@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 py-2">
        <h2>@lang('pages.student_list')</h2>
    </div>

    <div class="col-sm-12 py-2">
        <a href="/students/new" class="btn btn-primary">@lang('pages.new_student')</a>
    </div>

    <div class="col-sm-12 py-2">
        <table class="table table-striped book-table">
            <thead>
                <tr>
                    <th>@lang('pages.student_id')</th>
                    <th>@lang('pages.student_name')</th>
                    <th>@lang('pages.major')</th>
                    <th></th>
                </tr>

            </thead>

            <tbody>

                @if(count($students) == 0)

                <tr>
                    <td colspan="5" style="text-align:center"> @lang('pages.table_no_data')</td>
                </tr>

                @endif

                @foreach($students as $student)
                <tr>
                    <td>
                        {{$student->id}}
                    </td>

                    <td>
                        {{$student->name}}
                    </td>

                    <td>
                        {{$student->major->name}}
                    </td>

                    <td>
                        <form action="/students/{{$student->id}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <button class="btn btn-danger"> @lang('pages.delete_student')</button>
                        </form>
                    </td>
                </tr>

                @endforeach

            </tbody>

        </table>
    </div>

</div>

@endsection