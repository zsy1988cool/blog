<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\GoodAddEvent;
use App\Jobs\SendReminderEmail;
use Illuminate\Support\Facades\Auth;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $goods = DB::table('goods')->get();
        $goods = Good::all();
        return view('goods.index', ['goods' => $goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:goods|max:255'
        ]);

        // 博客文章验证通过...
        $title = $request->get('title');
        $intro = $request->get('intro');
        $content = $request->get('content');

//        $carbon = \Illuminate\Support\Carbon::now('Asia/shanghai');
//        DB::insert('insert into goods (title, intro, content, created_at, updated_at) values (?, ?, ?, ?, ?)', [$title, $intro, $content, $carbon, $carbon]);

        Good::create(['title' => $title, 'intro' => $intro, 'content' => $content]);

        // 发送商品新增事件
        // event(new GoodAddEvent($good));

        // 发送商品新增邮件，使用任务队列实现
        $user = Auth::user();
        $this->dispatch(new SendReminderEmail($user, $title));
        return redirect('/goods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $good = DB::table('goods').find($id);
//        return view('goods.show', ['good' => $good]);
        $good = DB::table('goods')->where('id', $id)->first();
        // return view('goods.test', ['intro' => $users->intro]);
        return view('goods.show', ['good' => $good]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
