<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use App\Models\akun;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function loginindex(){
        $title='Login';
        return view('Login', compact('title'));
    }
    public function regisindex(){
        $title='Register';
        return view('Regis', compact('title'));
    }

    public function profile($slug){
        $title='My Profile';
        $data= Akun::select('*')->with('fav')->where('slug', $slug)->first();
        $favs= Fav::select('*')->with('film')->where('user_id', $data->id)->get();

        return view('Profile', compact('title','favs','data'));
    }

    public function editprofile(){
        $title='Edit Profile';
        $user= Akun::select('*')->where('id', Auth::user()->id)->first();
        return view('Editprofile', compact('title','user'));
    }

    public function updateprofile(Request $request){

        $request->validate([
            'name' => 'required|string',
            'DOB' => 'required|date',
        ],[
            'name.required' => 'Username harus diisi',
            'DOB.required' => 'Tanggal lahir harus di pilih',
        ]);
            $data['username'] = $request->name;
            $data['slug'] = Str::slug($request->name.rand());
            $data['date_of_birth'] = $request->DOB;
            $data['gender'] = $request->gender;
            $data['desc'] = $request->description;

        if ($request->file('files')) {
            $img = Akun::select('img')->where('id', $request->uid)->first();
            if (File::exists(public_path('/storage/' . $img->img))) {
                File::delete(public_path('/storage/' . $img->img));
            }
            $data['img'] = $request->file('files')->store('Users', 'public');
        }
        Akun::where('id', $request->uid)->update($data);
        return redirect()->route('Profil',Auth::user()->slug)->with('success', 'Data berhasil diupdate');
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

            if(Auth::attempt($login))
            {
                $request->session()->regenerate();

                return redirect()->route('Home');
            }
            else{
                $errors = new MessageBag(['password' => ['Email atau Password salah'], 'email' => ['Email atau password salah']]);
                return redirect()->back()->withErrors($errors);
            }

    }
    public function regis(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:user,email',
            'name' => 'required|string',
            'DOB' => 'required|date',
            'gender' => 'required|string',
            'password' => 'required|confirmed|min:6',
        ],[
            'email.required' => 'Email harus diisi',
            'name.required' => 'Username harus diisi',
            'DOB.required' => 'Tanggal lahir harus di pilih',
        ]);
        event(new Registered($user = $this->create($request->all())));
        return redirect()->route('Login')->with('success', 'Pendaftaran Berhasil');
    }



    protected function create(array $data)
    {
        return akun::create(
            [
                'email' => $data['email'],
                'username' => $data['name'],
            'slug'=> Str::slug($data['name'].rand()),
                'gender' => $data['gender'],
                'Exp' => 0,
                'date_of_birth' => $data['DOB'],
                'password' => Hash::make($data['password']),

            ]
        );
    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('Home');
}
}
