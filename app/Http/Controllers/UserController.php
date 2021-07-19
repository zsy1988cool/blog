<?php

namespace App\Http\Controllers;

class MyUser
{
    public $name;
    public $age;
    public $id;

    public function __construct($n, $a, $id)
    {
        $this->name = $n;
        $this->age = $a;
        $this->id = $id;
    }
}


class UserController extends Controller
{
    public function show($id)
    {
        $user = new MyUser("張三", 6, $id);
        return view('greeting', ['user' => $user]);
//        return view('greeting', ['name' => $user->name, 'age' => $user->age, 'id' => $user->id]);
    }

}
