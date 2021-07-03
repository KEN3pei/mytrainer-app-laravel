@extends('layouts.common')
@section('content')
    <div>
        <div class="create-menu-sec" id="create-menu">
            <a>＋</a>
            <p>トレーニングメニューを作成</p>
        </div>
        <div class="sp-menuLists">
            @foreach($lists as $list)
                <!-- <span class="three-point">︙<span class="delete-popup" id="{{ $list->list_id }}">削除</span></span> -->
                <p><a href="/top/menulist?listname={{ $list->list_name }}">{{ $list->list_name }}</a>
                <span class="three-point">︙<span class="delete-popup" id="{{ $list->list_id }}">削除</span></span>
                </p>
            @endforeach
        </div>
    </div>
@endsection