<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Parkir;
use App\Models\UserParkir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $parkir = Parkir::all();
        return view('admin.index', compact('parkir'));
    }

    public function increment($id){
        $parkir = Parkir::find($id);
        $parkir->kendaraan_parkir = $parkir->kendaraan_parkir + 1;
        $parkir->save();
        return redirect()->route('admin')->with('status', 'Kuota parkir berhasil ditambah');
    }

    public function decrement($id){
        $parkir = Parkir::find($id);
        $parkir->kendaraan_parkir = $parkir->kendaraan_parkir - 1;
        $parkir->save();
        return redirect()->route('admin')->with('status', 'Kuota parkir berhasil dikurangi');
    }

    public function parkirDetail($id){
        $parkir = Parkir::find($id);
        return view('admin.show', compact('parkir', 'id'));
    }

    public function generate($id){
        $parkir = Parkir::find($id);
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $length = 6;
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $char[rand(0, strlen($char) - 1)];
        }
        $parkir->kode_parkir = $randomString;
        $parkir->save();

        $user_parkir = UserParkir::where('parkir_id', $id)->get();
        foreach ($user_parkir as $user) {
            $user->kode_parkir = $randomString;
            $user->save();
        }
        return redirect()->route('admin.parkir.detail', $id)->with('status', 'Kode parkir berhasil digenerate');
    }

    public function profile(){
        $user = User::find(auth()->user()->id);
        return view('admin.profile', compact('user'));
    }
}
