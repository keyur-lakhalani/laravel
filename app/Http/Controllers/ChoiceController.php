<?php

namespace App\Http\Controllers;

use App\Questions;
use App\Choice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChoiceController extends Controller
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
    public function index(Request $request)
    {
        $questions = Questions::findorFail($request->route('question'));

        $choices = Choice::latest()
                    ->where('questions_id', $questions->questions_id)
                    ->paginate(5);
        return view('choice.index',compact('questions', 'choices'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $questions = Questions::findorFail($request->route('question')); 
        return view('choice.create', compact('questions'));
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
            'choice_text' => 'required',
         ]);

        $questions = Questions::findorFail($request->route('question'));
         
        Choice::create([
                        'questions_id' => $request->route('question'),
                        'choice_text' => $request->post('choice_text'),
                        'created_by_user' => Auth::id()    
                        ]);
   
        return redirect()->route('choice.index', $questions->questions_id)
                        ->with('success','Choice is created.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $choices = Choice::findorFail($request->route('choice'));
        $questions = Questions::findorFail($choices->questions_id);
        return view('choice.edit',compact('choices', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'choice_text' => 'required',
         ]);

        $choices = Choice::findorFail($request->route('choice'));
        Choice::find($request->route('choice'))
                        ->update([
                            'choice_text' => $request->post('choice_text')
                        ]);
  
        return redirect()->route('choice.index', $choices->questions_id)
                        ->with('success','Choice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $choices = Choice::findorFail($request->route('choice'));
        $questions_id = $choices->questions_id;
        $choices->delete();
  
        return redirect()->route('choice.index', $questions_id)
                        ->with('success','Choice deleted successfully');
    }
}
