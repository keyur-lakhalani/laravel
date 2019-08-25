@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Questions Detail') }}</div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif  
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('choice.create',$questions->questions_id) }}"> Create New Choice</a>
                </div>    
                <div class="card-body">
                    <div class="form-group">
                        <strong>Question:</strong>
                        {{ $questions->question }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection