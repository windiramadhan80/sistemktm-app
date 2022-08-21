<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('user.index', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('failed', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request)
    {

        $data = [
            'title' => 'Registrasi',
            'user' => User::all()
        ];
        return view('user.register', $data);
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'bulan_lahir' => 'required',
            'tahun_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'image' => 'image|file|max:1024',
            'program_studi' => 'required',
            'nim' => 'required|min:9|max:9',
            'password' => 'required|min:3',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('ktm-img');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registrasi berhasil silahkan login!');
    }
}
