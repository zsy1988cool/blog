<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowProfile extends Controller
{
    public function __construct()
    {
        $this->middleware(function (Request $req, $next) {
            static $index = 0;
            $index++;

            $req->input('index', $index);
            return $next($req);
        });
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $name = $request->get('name');
        $index = $request->get('index');
        return view('user.profile', ['profile' => $name, 'index' => $index]);
    }
}
