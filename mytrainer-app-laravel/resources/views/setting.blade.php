@extends('layouts.common')
@section('content')
    <div>
       <div class="setting-main">
           <div class="setting-contents">
           <!-- <a href="">logout</a> -->
                <p>Edit profile</p>
                <form action="/setting?param=name" method="POST">
                    @csrf
                    <label for="name-label">User name : {{ Auth::user()->name }}</label><br>
                    <input type="text" name="name" id="name-label">
                    <button type="submit">setting</button>
                </form>
                <form action="/setting?param=email" method="POST">
                    @csrf
                    <label for="name-label">E-mail : 
                        @if(Auth::user()->email == null)
                            設定されていません
                        @else
                            {{ Auth::user()->email }}
                        @endif
                    </label><br>
                    <input type="text" name="email" id="email-label">
                    <button type="submit">setting</button>
                </form>
                <a href="/setting/logout">logout</a>
           </div>
       </div>
    </div>
@endsection