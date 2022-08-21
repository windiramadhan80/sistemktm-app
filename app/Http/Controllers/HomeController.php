<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Kartu Tanda Mahasiswa',
            'user' => User::latest()->filter(request(['search']))->paginate(10)->withQueryString()

        ];
        return view('home.index', $data);
    }

    public function show($id)
    {
        $user = User::find($id)->created_at;
        $date = Carbon::create($user)->addYears(5);
        $time = showDateTime($date);

        $data = [
            'title' => 'Kartu Tanda Mahasiswa',
            'mhs' => User::find($id),
            'data' => $time
        ];
        return view('home.single', $data);
    }

    public function tutorial()
    {
        $data = [
            'title' => 'KTM | Tutorial'
        ];
        return view('home.tutorial', $data);
    }

    public function pendaftaran()
    {
        $data = [
            'title' => 'KTM | Pendaftaran'
        ];
        return view('home.pendaftaran', $data);
    }
}
