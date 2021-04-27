@extends('layouts.common')
@section('content')
    <div>
        <div>
            <div class="search-form">
                <form action="/search/keyWord" method="GET">
                    @csrf
                    <input type="text" name="keyWord">
                    <button type="submit" value="検索">search</button>
                </form>
            </div>
            <div class="image-list-sec">
                @isset ($s3imgUrls)
                    @foreach ($s3imgUrls as $item)
                        <img src="https://mytrainer-imgs.s3-ap-northeast-1.amazonaws.com/{{ $item }}" >
                        @endforeach
                    @endisset
                @isset ($imgUrls)
                   
                    <div class="container">
                        @foreach ($imgUrls as $item)
                            <img src="https://mytrainer-imgs.s3-ap-northeast-1.amazonaws.com/{{ $item }}" >
                        @endforeach
                    </div>

                    {{ $imgUrls->links('vendor/pagination/semantic-ui') }}
                    @endisset
            </div>
        </div>
    </div>
@endsection