<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedbacks;
use Validator;

class MainController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function addFeedback(Request $request)
    {

        if($this->validator($request->all())){
            $this->create($request->all());
            return redirect('/feedback-success');
        }
        
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255',
            'text' => 'required|string|max:255',
        ]);
    }

    protected function create(array $data)
    {
        return Feedbacks::create([
            'name' => $data['name'],
            'mail' => $data['mail'],
            'text' => $data['text'],
        ]);
    }

}
