@extends('layouts.common')
@section('content')

@if(!Auth::check())
<div id="login-wrapper" class="row">
    <div class="col-7">
        <h1 class="text-white"><b>Hello Hackers！</b></h1>
        <p class="text-white">コードを書いていて気づいたことや、自分がハマったあの仕様について、他のエンジニアと知見を共有しましょう <br>エンジニアリングに関する知識を記録・共有するためのサービスです。</p>
    </div>
    <div class="col-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <table>
                <tr>
                    <th>ユーザ名</th>
                    <td><input type="text" class="form-control" placeholder="test" size="50" value="{{ old('email') }}" name="username" required autofocus></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="email" class="form-control" placeholder="hoge@hoge.com" size="50" name="email" required></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td><input type="password" class="form-control" name="password" required size="50"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="ログイン" class="form-control"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
@else
<div class="top-wrapper">
    <div class="articles-wrapper col-md-6">
        @foreach ($articles as $article)
        <div class="article-box">
            <div class="article-box-left"></div>
            <div class="article-box-right">
                <a class="article-title" href="/drafts/{{$article->id}}">{{ $article->title }}</a>
                <div class="article-details">
                    <div class="article-date">{{ $article->created_at }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection