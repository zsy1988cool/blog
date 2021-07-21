@extends('goods/app')

@section('content')
<h1>添加新商品</h1>
{!! Form::open(array('url' => 'goods')) !!}
<div class="form-group">
    {!! Form::label('title','标题:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('intro','介绍:') !!}
    {!! Form::text('intro',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content','正文:') !!}
    {!! Form::textarea('content',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('上线',['class'=>'btn btn-success form-control']) !!}
</div>
{!! Form::close() !!}
@endsection
