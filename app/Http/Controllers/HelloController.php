<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function say($id)
    {
       $uid = Auth::id();
       $response = 'hello,' . $id . ' username:' . $uid;
       return $response;
    }
}
