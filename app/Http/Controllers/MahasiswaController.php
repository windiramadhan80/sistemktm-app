<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    //
    public function show($id)
    {
        $user = User::find($id)->created_at;
        $date = Carbon::create($user)->addYears(5);
        $time = showDateTime($date);

        $data = [
            'title' => 'Daftar Mahasiswa',
            'mhs' => User::find($id),
            'data' => $time
        ];
        return view('home.single', $data);
    }
}
