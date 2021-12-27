<@php
$title = 'お問い合わせ';

@endphp

@extends('layout')


<h1 class="text-center mt-2 mb-5">お問い合わせ</h1>
<div class="container">
  {!! Form::open(['route' => 'confirm', 'method' => 'POST']) !!}
  {{ csrf_field() }}
  <div class="form-group row">
    <p class="col-sm-4 col-form-label">お名前<span class="text-danger ml-1 h6">※</span></p>
    <div class="col-sm-4">
      {{ Form::text('last_name', null, ['class' => 'form-control', 'wire:model' => 'last_name']) }}
    </div>
    <div class="col-sm-4">
      {{ Form::text('first_name', null, ['class' => 'form-control', 'wire:model' => 'first_name']) }}
    </div>
  </div>
  @if ($errors->has('first_name'))
  <p class="alert alert-danger">{{ $errors->first('first_name')}}</p>
  @endif
  @if ($errors->has('last_name'))
  <p class="alert alert-danger">{{ $errors->first('last_name') }}</p>
  @endif
  <div class="form-group row">
    <p class="col-sm-4 col-form-label"></span></p>
    <div class="col-sm-4 text-muted">例）山田</div>
    <div class="col-sm-4 text-muted">例）太郎</div>
  </div>

  <div class="form-group row">
    <p class="col-sm-4 col-form-label">性別<span class="text-danger ml-1 h6">※</span></p>
    <div class="col-sm-8">
      <label>{{ Form::radio('gender', "男性" , true,['class' => ""])}}男性</label>
      <label>{{ Form::radio('gender', "女性") }}女性</label>
    </div>
  </div>
  @if ($errors->has('gender'))
  <p class="alert alert-danger">{{ $errors->first('gender') }}</p>
  @endif

  <div class="form-group row">
    <p class="col-sm-4 col-form-label">メールアドレス<span class="text-danger ml-1 h6">※</span></p>
    <div class="col-sm-8">
      {{ Form::text('email', null, ['class' => 'form-control', 'wire:model' => 'email']) }}
    </div>
  </div>
  @if ($errors->has('email'))
  <p class="alert alert-danger">{{ $errors->first('email') }}</p>
  @endif

  <div class="form-group row">
    <p class="col-sm-4 col-form-label">郵便番号<span class="text-danger ml-1 h6">※</span></p>
    <div class="col-sm-1 text-center">〒</div>
    <div class="col-sm-7">

      {{ Form::text('zip', null, ['class' => 'form-control', 'wire:model' => 'zip','onKeyUp'=>"AjaxZip3.zip2addr('zip', '', 'address', 'address');"]) }}
    </div>
  </div>
  @if ($errors->has('zip'))
  <p class="alert alert-danger">{{ $errors->first('zip') }}</p>
  @endif


  <div class="form-group row">
    <p class="col-sm-4 col-form-label">住所<span class="text-danger ml-1 h6">※</span></p>
    <div class="col-sm-8">
      {{ Form::text('address', null, ['class' => 'form-control', 'wire:model' => 'address']) }}
    </div>
  </div>
  @if ($errors->has('address'))
  <p class="alert alert-danger">{{ $errors->first('address') }}</p>
  @endif

  <div class="form-group row">
    <p class="col-sm-4 col-form-label">建物名</p>
    <div class="col-sm-8">
      {{ Form::text('building_name', null, ['class' => 'form-control']) }}
    </div>
  </div>



  <div class="form-group row">
    <p class="col-sm-4 col-form-label">お問い合わせ内容<span class="text-danger ml-1 h6">※</span></p>
    <div class="col-sm-8">
      {{ Form::textarea('opinion', null, ['class' => 'form-control', 'wire:model' => 'opinion']) }}
    </div>
  </div>
  @if ($errors->has('opinion'))
  <p class="alert alert-danger">{{ $errors->first('opinion') }}</p>
  @endif

  <div class="text-center">
    {{ Form::submit('確認画面へ', ['class' => 'btn btn-primary']) }}
  </div>
  {!! Form::close() !!}
</div>
</div>

</body>

</html>
