@extends('layouts.app')

@section('title')
    ToDo - Edit
@endsection

@section('script')
    <script src="{{ asset('js/edit_todo/events.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$todo ? 'Edit todo #'.$todo->id : 'Add new todo'}}</div>
                    <div class="card-body">
                        <form method="post" action="{{route('apply', ['id' => $todo ? $todo->id : null])}}">
                            @csrf
                            <div class="col-sm-8">

                                @include('toDo.includes.textGroup', ['name' => 'date', 'val' => $todo ? $todo->date : null])
                                @include('toDo.includes.textGroup', ['name' => 'subject', 'val' => $todo ? $todo->subject : null])
                                @include('toDo.includes.textGroup', ['name' => 'resume', 'val' => $todo ? $todo->resume : null])
                                @include('toDo.includes.textGroup', ['name' => 'email', 'val' => $todo ? $todo->email : null])

                                <div class="input-group mt-1">
                                        <textarea type="text" name="full_text" class="form-control  @error('text') is-invalid @enderror"
                                                  placeholder="full text">{{$todo ? $todo->full_text : null}}</textarea>
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
                                    <a type="button" class="btn btn-outline-success" href="{{back()->getTargetUrl()}}"
                                       placeholder="subject">back
                                    </a>
                                    <button type="submit" class="btn btn-success ml-1" id="submit"
                                            placeholder="subject">{{$todo ? 'edit' : 'add new'}}
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
