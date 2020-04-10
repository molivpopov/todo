@extends('layouts.app')

@section('title')
    ToDo - Edit
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit</div>
                    <div class="card-body">
                        <form method="post" action="{{route('apply')}}">
                            @csrf
                            <div class="col-sm-8">

                                @include('toDo.includes.textGroup', ['name' => 'date'])
                                @include('toDo.includes.textGroup', ['name' => 'subject'])
                                @include('toDo.includes.textGroup', ['name' => 'not_email'])

                                <div class="input-group mt-1">
                                        <textarea type="text" name="text" class="form-control  @error('text') is-invalid @enderror"
                                                  value=""
                                                  placeholder="full text"></textarea>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-10 mt-1">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="notification" class="form-check-input"
                                                   type="checkbox">
                                            <span class="form-check-sign"></span>
                                            Send notification
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group mt-1">
                                    <button type="submit" class="btn btn-success"
                                            placeholder="subject">send
                                    </button>
                                </div>
                            </div>
                            {{--                    </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
