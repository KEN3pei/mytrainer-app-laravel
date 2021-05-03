@extends('layouts.common')
@section('content')
<div id="carouselExampleIndicators" class="carousel"  >
  <ol class="carousel-indicators">
    @foreach($name_urls as $item)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
      @if($loop->index === 0)
        class="active"
      @endif
      >
      </li>
    @endforeach
    </ol>
  <div class="carousel-inner">
    @if(count($name_urls) > 0)
      @foreach($name_urls as $item)
          @if($loop->index === 0)
            <div class="carousel-item active">
          @else
            <div class="carousel-item">
          @endif
            <img src="https://mytrainer-imgs.s3-ap-northeast-1.amazonaws.com/{{ $item->s3_img_url }}">
            </div>
      @endforeach
    @else
      <div class="carousel-item active">
        <img src="https://mytrainer-imgs.s3-ap-northeast-1.amazonaws.com/no-image.jpg">
        </div>
    @endif
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>
<div>
    <div class="add-menu-list">
      <div class="add-items">
        <!-- <div class="item">
          <img src="https://mytrainer-imgs.s3-ap-northeast-1.amazonaws.com/no-image.jpg">
          </div> -->
          <div class="table-wrap">
      <table class="table">
        <tr>
            @foreach($all_item as $item)
              <td>
                <img src="https://mytrainer-imgs.s3-ap-northeast-1.amazonaws.com/{{ $item->s3_img_url }}">
                <p>{{$item->item_name}}</p>
                <span>+</span>
              </td>
              @if(($loop->index + 1) % ceil(count($all_item) / 3) === 0)
              </tr>
              <tr>
                @if($loop->index + 1 === count($all_item))
                </tr>
                @endif

              @endif
            @endforeach
      </table>
</div>
      </div>
    </div>
</div>

@endsection