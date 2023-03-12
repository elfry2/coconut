<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\PreferenceController;

class UserController extends Controller
{
    public function index(){
      $parameters = [
        'pageTitle'=>'Pengguna',
        'users'=>User::all(),
        'alerts'=>AlertQueueController::dequeueAll(),
      ];

      return view('users', $parameters);
    }

    public function delete($id){
      User::where('id', $id)->delete();

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Pengguna berhasil dihapus.'
      ]);

      return redirect(route('user.index'));
    }
}
