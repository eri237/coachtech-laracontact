@php
$title = 'お問い合わせ';

@endphp

@extends('layout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          {!! Form::open(['route' => 'index', 'method' => 'GET']) !!}
          {{ csrf_field() }}
          <div class="form-group row">
            <p class="col-sm-2 col-form-label">お名前:</p>
            <div class="col-sm-3">
              {!! Form::text('last_name', $last_name ?? '') !!}
            </div>
            <div class="col-sm-3">
              {!! Form::text('first_name', $first_name ?? '') !!}
            </div>
            <div class="col-sm-4">
              性別:
              <label>{!! Form::radio('gender', "男性", "女性", isset(request()->gender) ? false :true) !!}全て</label>
              <label>{!! Form::radio('gender', "男性" , isset(request()->gender) ? false :true) !!}男性</label>
              <label>{!! Form::radio('gender', "女性", isset(request()->gender) ? false :true) !!}女性</label>
            </div>
          </div>

          <div class="form-group row">
            <p class="col-sm-2 col-form-label">登録日:</p>
            <div class="col-sm-3">
              {!! Form::text('created_at', $created_at ?? '') !!}
            </div>
            <div class="col-sm-1">〜</div>
            <div class="col-sm-3">
              {!! Form::text('created_at', $created_at ?? '') !!}
            </div>
          </div>
          <div class="form-group row">
            <p class="col-sm-2 col-form-label">メールアドレス:</p>
            <div class="col-sm-3">
              {!! Form::text('email', $email ?? '') !!}
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              {!! Form::submit('検索') !!}
            </div>
          </div>
          {!! Form::close() !!}

        </div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">名前</th>
                <th scope="col">性別</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">ご意見</th>
              </tr>
            </thead>
            <tbody>
              @foreach($contacts as $contact)
              <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->last_name}}{{$contact->first_name}}</td>
                <td>{{$contact->gender}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->opinion}}</td>
                <td><button class="btn btn-danger btn-sm btn-dell" onclick="location.href='{{ url('/') }}/contact/del?id={{$contact->id}}'">削除</button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection