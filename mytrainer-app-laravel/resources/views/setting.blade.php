@extends('layouts.common')
@section('content')
    <div>
       <div class="setting-main">
           <div class="setting-contents">
           <!-- <a href="">logout</a> -->
                <p>Edit profile</p>
                <form action="">
                    @csrf
                    <label for="name-label">Name</label><br>
                    <input type="text" name="name" id="name-label"><br>
                    <label for="name-label">E-mail</label><br>
                    <input type="text" name="email" id="email-label"><br>
                    <button type="submit">setting</button>
                </form>
                <a href="/setting/logout">logout</a>
           </div>
       </div>
    </div>
@endsection