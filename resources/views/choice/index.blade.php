@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Choices') }}</div>
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

                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Choice</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($choices as $choice)
                        <tr>
                            <td>{{ $choice->choice_id }}</td>
                            <td>{{ $choice->choice_text }}</td>
                            <td>
                                <form action="{{ route('choice.destroy',$choice->choice_id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('choice.edit',$choice->choice_id) }}">Edit</a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
  
                    {!! $choices->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection