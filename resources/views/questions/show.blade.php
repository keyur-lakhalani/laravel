@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Questions Detail') }}</div>

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