<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(){
        return view('user.index');
    }

    public function parkir(){
        $parkir = $this->service->getAllParkir();
        return view('user.parkir', compact('parkir'));
    }

    public function parkirDetail($id){

        return view('user.parkir-detail');
    }

    public function parkirStore(Request $request){

        $user_id = auth()->user()->id;
        $parkir_id = $request->parkir_code;
        $check_parkir = $this->service->checkParkir($user_id, $parkir_id);
        if ($check_parkir) {
            return redirect()->route('user.parkir')->with('status', 'Anda sudah terdaftar di parkir ini');
        }

        $this->validate($request, [
            'parkir_code' => 'required',
        ]);

        $parkir = $this->service->getParkirByParkirCode($request->parkir_code);

        if (!$parkir) {
            return view('user.parkir-detail')->with('status', 'Kode parkir tidak ditemukan');
        }

        $check = $this->service->checkParkir($user_id, $parkir->id);
        if ($check) {
            return view('user.parkir-detail')->with('status', 'Anda sudah terdaftar di parkir ini');
        }

        $user_parkir = [
            'user_id' => $user_id,
            'parkir_id' => $parkir->id,
            'kode_parkir' => $request->parkir_code,
        ];


        $this->service->storeParkir($user_parkir);
        return redirect()->route('parkir')->with('status', 'Anda berhasil mendaftar di parkir ini');
    }

    public function profile(){
        $user = User::find(auth()->user()->id);
        return view('user.profile', compact('user'));
    }

    public function profileUpdate(Request $request){
        $user = User::find(auth()->user()->id);
        $user->update($request->all());
        return redirect()->route('profile')->with('status', 'Profile berhasil diupdate');
    }

}
