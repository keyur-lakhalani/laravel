@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Choice') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('choice.update',$choices->choice_id) }}">
                        @csrf
                        @method('PUT')    
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Choice') }}</label>

                            <div class="col-md-6">
                                <input id="choice_text" type="text" class="form-control @error('choice_text') is-invalid @enderror" name="choice_text" value="{{ $choices->choice_text }}" required autocomplete="choice_text" autofocus>

                                @error('choice_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Choice') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection