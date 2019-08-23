@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Questions') }}</div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif  
                <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('questions.create') }}"> Create New Question</a>
                </div>  
                <div class="card-body">
                        
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Questions</th>
                            <th>Multiple Answer</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->questions_id }}</td>
                            <td>{{ $question->question }}</td>
                            <td>{{ $question->multiple_answer }}</td>
                            <td>
                                <form action="{{ route('questions.destroy',$question->questions_id) }}" method="POST">
                   
                                    <a class="btn btn-info" href="{{ route('questions.show',$question->questions_id) }}">Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('questions.edit',$question->questions_id) }}">Edit</a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
  
                    {!! $questions->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
