<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Questions::latest()->paginate(5);
            
        return view('questions.index',compact('questions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'question' => 'required',
         ]);
         
        Questions::create([
                        'question' => $request->post('question'),
                        'multiple_answer' => ($request->post('multiple_answer')) ? 1 : 0,
                        'user_id' => Auth::id()    
                        ]);
   
        return redirect()->route('questions.index')
                        ->with('success','Question is created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $questions = Questions::findorFail($request->route('question'));
        return view('questions.show',compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $questions = Questions::findorFail($request->route('question'));
        return view('questions.edit',compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questions $questions)
    {
        $request->validate([
            'question' => 'required',
         ]);
        
        Questions::find($request->route('question'))
                        ->update([
                            'question' => $request->post('question'),
                            'multiple_answer' => ($request->post('multiple_answer')) ? 1 : 0
                        ]);
  
        return redirect()->route('questions.index')
                        ->with('success','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Questions $questions)
    {
        Questions::find($request->route('question'))->delete();
  
        return redirect()->route('questions.index')
                        ->with('success','Question deleted successfully');
    }
}
