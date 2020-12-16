<div class="slide-padding">
  <div class="homeslide">
    <div id="slideshow0" class="owl-carousel owl-theme">
      @foreach($slide as $item)
        <a href="{{ $item->link }}">
          <div class="text-center">
            <img src="{{asset('storage/slider/' .$item->image) }}" alt="" class="img-responsive" />
          </div>
        </a>
      @endforeach
    </div>
  </div>
</div>