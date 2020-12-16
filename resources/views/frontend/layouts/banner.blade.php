<div class="allbanner container">
  <div class="row">
    @foreach($banner as $item)
    <div class="imgbanner firstbanner col-lg-4 col-xs-4">
      <div class=" banner-effect">
         <a href="{{ $item->link }}">
          <img src="{{ asset('storage/banner/' .$item->image)}}" alt="" class="img-responsive" />
        </a>
      </div>
    </div>
    @endforeach
  </div>
</div>