<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getHouseCleaners() {
        $users = User::where('service_type','=',1)->get();
        $users->toArray();
        return response()->json(['users'=>$users]);
    }
}
