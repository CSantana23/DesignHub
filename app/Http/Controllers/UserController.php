<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
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

//        Mail::to($user->email)->send(new WelcomeMail());

//        Auth::login($user);
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
