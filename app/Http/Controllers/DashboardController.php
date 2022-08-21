<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user()->created_at;
        $date = Carbon::create($user)->addYears(5);
        $users = showDateTime($date);


        $data = [
            'title' => 'Dashboard',
            'waktu' => $users
        ];
        return view('user.dashboard', $data);
    }
    public function profile($id)
    {
        $data = [
            'title' => 'Dashboard',
            'mhs' => User::find($id)
        ];
        return view('user.profile', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Dashboard',
            'mhs' => User::find($id)
        ];
        return view('user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'bulan_lahir' => 'required',
            'tahun_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'image' => 'image|file|max:1024',
            'program_studi' => 'required',
            'nim' => 'required|min:9|max:9',
        ];
        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage != 'ktm-img/default.jpg') {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('ktm-img');
        }

        User::where('id', $id)
            ->update($validatedData);

        return redirect('/profile/' . $id)->with('success', 'Profile berhasil diubah!');
    }
}
