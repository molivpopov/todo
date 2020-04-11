@extends('layouts.app')

@section('title')
    ToDo - Home
@endsection

@section('script')
    <script src="{{ asset('js/functions.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">To Do</div>
                    <table class="table">
                        <thead class="text-primary">
                        <tr>
                            <th>#</th>
                            <th>date</th>
                            <th>subject</th>
                            <th>resume</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody id="tbl-accruals">

                        @foreach($todos as $todo)
                            <tr>
                                <td>{{$todo->id}}</td>
                                <td>{{$todo->date}}</td>
                                <td>{{$todo->subject}}</td>
                                <td data-original-title="Tooltip on top" title="show full text"><a
                                        href="#">{{$todo->resume}}</a></td>
                                <td class="text-right">
                                    <a type="button" rel="tooltip"
                                       class="btn btn-success btn-sm"
                                       href="{{route('showTodo', ['id'=>$todo->id])}}"
                                       data-original-title="Tooltip on top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" rel="tooltip"
                                            class="btn btn-danger btn-sm"
                                            onclick="trash({{$todo->id}})"
                                            data-original-title="Tooltip on top" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot class="text-primary">
                        <tr>
                            <th colspan="4"></th>
                            <th class="text-right">
                                <a type="button" rel="tooltip"
                                   href="{{route('showTodo')}}"
                                   class="btn btn-success btn-link btn-sm"
                                   data-original-title="Tooltip on top" title="Add" disabled>
                                    <i class="far fa-calendar-plus"></i>
                                </a>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{route('trash')}}" id="send-trash" hidden>
        <input type="text" id="trash" name="trash">
        @csrf
    </form>
@endsection
