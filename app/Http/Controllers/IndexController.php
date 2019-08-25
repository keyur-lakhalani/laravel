<?php

namespace App\Http\Controllers;
use App\Questions;
use App\Choice;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $clientIP = $request->ip();

        /*$questions = DB::table('questions')
            ->join('choice', 'questions.questions_id', '=', 'choice.questions_id')
            ->join('vote', 'vote.choice_id', '=', 'choice.choice_id')
            ->whereRaw("vote.user_ip != '$clientIP'")
            ->get('choice.*');*/
        //$questions = Questions::find(1);
        $questions = Questions::orderByRaw('RAND()')->limit(1)->get();
        foreach($questions as $q){
            $choices = Choice::where('questions_id', $q->questions_id)->get();                        
        } 
        return view('welcome', compact('questions','choices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientIP = $request->ip();
        $request->validate([
            'choices' => 'required',
        ]);
        $post_choices = $request->post('choices');
        if(is_array($post_choices)){
            foreach($post_choices as $id){
                Vote::create(['choice_id' => $id, 
                            'user_ip' => $clientIP,
                            'user_id' => Auth::id() 
                ]);    
            }
        }else{
            Vote::create(['choice_id' => $post_choices, 
                            'user_ip' => $clientIP,
                            'user_id' => Auth::id() 
                ]);
        }
        
        return redirect()->route('vote')
                        ->with('success','Poll Submitted.');
    }
}
