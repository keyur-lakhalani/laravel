@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to poll application
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif  
                    
                    <form method="POST" action="{{ route('vote.store') }}">
                        @csrf
     
                    <div class="card-body">
                        @foreach($questions as $q)
                        <div class="form-group">
                            <strong>Question:</strong>
                            {{ $q->question }}
                        </div>
                        @endforeach

                        @foreach($choices as $c)
                        <div class="form-group">
                            @if($q->multiple_answer == 1)
                                <input id="choice_{{$c->choice_id}}" type="checkbox" class="" name="choices[]" value="{{$c->choice_id}}">
                            @else
                                <input id="choice_{{$c->choice_id}}" type="radio" class="" name="choices" value="{{$c->choice_id}}">
                            @endif
                            &nbsp;&nbsp;
                            {{ $c->choice_text }}
                        </div>
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Vote') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

