<?php

namespace App\Http\Controllers\User;

use App\Models\Parkir;
use App\Models\UserParkir;

class Service {

  public function getAllParkir(){
    return Parkir::all();
  }

  public function checkParkir($user_id, $parkir_id){
    $check_parkir = UserParkir::where('user_id', $user_id)->where('parkir_id', $parkir_id)->first();
    if($check_parkir){
      return true;
    }
    return false;
  }

  public function storeParkir($user_parkir){
    UserParkir::create($user_parkir);
  }

  public function getParkirByParkirCode($parkir_code){
    return Parkir::where('kode_parkir', $parkir_code)->first();
  }
}