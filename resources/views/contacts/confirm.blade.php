@php
$title = 'お問い合わせ - 確認';
@endphp

@extends('layout')

@section('content')
<h1 class="text-center mt-2 mb-5">内容確認</h1>
<div class="container">
  {!! Form::open(['route' => 'process', 'method' => 'POST']) !!}
  {{ csrf_field() }}
  <div class="form-group row">
    <p class="col-sm-4 col-form-label">お名前</p>
    <div class="col-sm-4">
      {{ $inputs['last_name'] }}
    </div>
    <div class="col-sm-4">
      {{ $inputs['first_name'] }}
    </div>
  </div>
  <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
  <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">

  <div class="form-group row">
    <p class="col-sm-4 col-form-label">性別</p>
    <div class="col-sm-8">
      {{ $inputs['gender'] }}
    </div>
  </div>
  <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">

  <div class="form-group row">
    <p class="col-sm-4 col-form-label">メールアドレス</p>
    <div class="col-sm-8">
      {{ $inputs['email'] }}
    </div>
  </div>
  <input type="hidden" name="email" value="{{ $inputs['email'] }}">

  <div class="form-group row">
    <p class="col-sm-4 col-form-label">郵便番号</p>
    <div class="col-sm-1 text-center">〒</div>
    <div class="col-sm-7">
      {{ $inputs['zip'] }}

    </div>
  </div>
  <input type="hidden" name="zip" value="{{ $inputs['zip'] }}">


  <div class="form-group row">
    <p class="col-sm-4 col-form-label">住所</p>
    <div class="col-sm-8">
      {{ $inputs['address'] }}

    </div>
  </div>
  <input type="hidden" name="address" value="{{ $inputs['address'] }}">

  <div class="form-group row">
    <p class="col-sm-4 col-form-label">建物名</p>
    <div class="col-sm-8">
      {{ $inputs['building_name'] }}

    </div>
  </div>
  <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}">


  <div class="form-group row">
    <p class="col-sm-4 col-form-label">お問い合わせ内容</p>
    <div class="col-sm-8">
      {{ $inputs['opinion'] }}

    </div>
  </div>
  <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">

  <div class="text-center">
    <button name="action" type="submit" value="submit" class="btn btn-primary">送信</button>
    <button name="action" type="submit" value="return" class="btn btn-dark">修正する</button>
  </div>
  {!! Form::close() !!}
</div>
</div>
@endsection