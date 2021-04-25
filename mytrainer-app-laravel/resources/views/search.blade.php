@extends('layouts.common')
@section('content')
    <div>
        <div>
            <div class="search-form">
                <form action="/search" method="POST">
                    @csrf
                    <input type="text" name="search-keyword">
                    <button type="submit" value="検索">search</button>
                </form>
            </div>
            <div class="image-list-sec">
                @if ($imgUrls)
                    @foreach ($imgUrls as $url)
                        <img src="https://mytrainer-imgs.s3-ap-northeast-1.amazonaws.com/{{ $url }}" >
                    @endforeach
                @else
                    <p>表示する画像はありません</p>
                @endif
            </div>
        </div>
    </div>
@endsection