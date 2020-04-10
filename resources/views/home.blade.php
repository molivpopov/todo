@extends('layouts.app')

@section('title')
    ToDo - Home
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
                        <tr>
                            <td>1</td>
                            <td>20 jan 2020</td>
                            <td>big day</td>
                            <td data-original-title="Tooltip on top" title="show full text"><a href="#">hi, please use...</a></td>
                            <td class="text-right">
                                <a type="button" rel="tooltip"
                                   class="btn btn-success btn-sm"
                                   href="{{route('index')}}"
                                   data-original-title="Tooltip on top" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot class="text-primary">
                        <tr>
                            <th colspan="4"></th>
                            <th class="text-right">
                                <a type="button" rel="tooltip" id="add-accruals"
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
@endsection
