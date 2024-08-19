<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Admin;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Login');
    }
    public function add()
    {
        return view('Admin.addmovie');
    }
    public function edit($slug)
    {
        $movie=Film::select('*')->where('slug', $slug)->first();
        return view('Admin.Editmovie',compact('movie'));
    }
    public function dashboard()
    {   $movies=Film::select('*')->paginate(10);
        $feeds=Feedback::select('*')->with('akun')->paginate(5,['*'], 'Feedback');
        return view('Admin.Dashboard', compact('movies','feeds'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ],[
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

            if(Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password]))
            {
                $request->session()->regenerate();
            return redirect()->route('dashboard');;
            }
            else{
                $errors = new MessageBag(['password' => ['Email atau Password salah'], 'email' => ['Email atau password salah']]);
                return redirect()->back()->withErrors($errors);
            }

    }
    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'email harus diisi',
        ]);
        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('Admin')->with('success', 'Pendaftaran Berhasil');

    }
    protected function create(array $data)
    {
        return Admin::create(
            [
                'email' => $data['email'],
                'password' => Hash::make($data['password']),

            ]
        );
    }
    public function logout(Request $request)
{
    Auth::guard('admin')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('Home');
}


}
