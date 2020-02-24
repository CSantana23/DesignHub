<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user/signup');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=> 'email|required|unique:users',
            'password'=> 'required|min:4'
        ]);
        $user = new User([
            'email' => $request->input('email'),
            'password'=>bcrypt($request->input('password'))
        ]);

        $user->save();
        Auth::login($user);
        return redirect()->route('profile');

    }


    public function getSignIn()
    {
        return view('user/signin');
    }

    public function postSignIn(Request $request){
        $this->validate($request,[
            'email'=>'email|required',
            'password'=>'required|min:4'
        ]);

        if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')])){
            return redirect()->route('profile');
        }
        return redirect()->back();
    }

    public function getProfile(){
        return view('user/profile');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
