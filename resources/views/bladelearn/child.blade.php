
@extends('bladelearn.app')

@section('sidebar')
  @parent

  <p> This is appended to master sidebar</p>
@endsection

@section('content')
  <p> This is child body content</p>

  @if ($sex === '1')
    <p>这是男得</p>
  @else
    <p>这是女得</p>
  @endif
@endsection

@section('title')
神州鹰
@endsection
