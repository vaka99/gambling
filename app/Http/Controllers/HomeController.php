<?php

namespace App\Http\Controllers;
use Config;
use Session;
use App\User;
use App\UserPrize;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function welcome(){
        $user = auth()->user();
        return view('welcome', compact('user'));
    }

    public function getPrize(){
        $prizes = (array) User::PRIZES;
        $keys = array_keys($prizes);
        $random_key = $keys[array_rand($keys)];
        $len = count($prizes[$random_key]) - 1;
        $prize = $prizes[$random_key][$len];
        $data = [
            'prize' => $prize,
            'type' => $random_key,
        ];

        Session::put("prize_" . auth()->user()->id, $data);
        return view('prize', compact('data'));
    }


    public function takePrize(){
        $user_prize =  Session::get('prize_' . auth()->user()->id);
        $input['user_id'] = auth()->user()->id;
        $input[$user_prize['type']] = $user_prize['prize'];
        UserPrize::create($input);
        return redirect('/');
    }
}
