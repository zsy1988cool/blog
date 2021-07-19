<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function say($id)
    {
       $response = 'hello,' . $id;
       return $response;
    }
}
