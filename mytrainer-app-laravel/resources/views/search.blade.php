@extends('layouts.common')
@section('content')
    <div>
        <div>
            <div class="image-list-sec">
                @foreach ($imgUrls as $url)
                    <img src="https://mytrainer-imgs.s3-ap-northeast-1.amazonaws.com/{{ $url }}" >
                @endforeach
            </div>
        </div>
    </div>
@endsection