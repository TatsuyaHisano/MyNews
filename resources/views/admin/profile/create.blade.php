<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial=scale=1">
        
        <title>MyNews</title>
    </head>
    <body>
        <h1>プロフィール画面</h1>
        
        {{-- layouts/profile.blade.phpを読み込む --}}
        {{-- 13ニュース投稿画面を作成しよう課題追記 --}}
        @extends('layouts.profile')
        @section('title', 'プロフィール編集')
        
        {{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
        @section('content')
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2>プロフィール入力</h2>
                        <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                            
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group row">
                                <lavel class="col-md-2">氏名(name)</lavel>
                                <div class="col-md-10">
                                    <input type="text" class="form-control"name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <lavel class="col-md-2">性別(gender)</lavel>
                                <div class="col-md-10">
                                    <input type="text" class="form-control"name="gender" value="{{ old('gender') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <lavel class="col-md-2">趣味(hobby)</lavel>
                                <div class="col-md-10">
                                    <input type="text" class="form-control"name="hobby" value="{{ old('hobby') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <lavel class="col-md-2">自己紹介(introduction)</lavel>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="introduction" rows="20">{{old('introduction') }}</textarea>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </form>
                    </div>
                </div>
            </div>
        @endsection
    </body>
</html>
