<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LabVIETCHEM - Dụng cụ thủy tinh phòng thí nghiệm</title>
  <meta name="description" content="LabVIETCHEM chuyên cung cấp, phân phối các loại hóa chất thí nghiệm, thiết bị, dụng cụ phòng thí nghiệm và dịch vụ sửa chữa các thiết bị khoa học kỹ thuật">
  <link rel="canonical" href="https://labvietchem.com.vn" />
  <meta name="robots" content="Index,Follow"/>
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:site_name" content="LabVietChem" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="LabVIETCHEM - Dụng cụ thủy tinh phòng thí nghiệm" />
  <meta property="og:description" content="LabVIETCHEM chuyên cung cấp, phân phối các loại hóa chất thí nghiệm, thiết bị, dụng cụ phòng thí nghiệm và dịch vụ sửa chữa các thiết bị khoa học kỹ thuật" />
  <meta property="og:url" content="https://labvietchem.com.vn" />
  <base href="{{asset('')}}">
  @include('frontend.layouts.style')
  <svg style="display:none">
    <symbol viewBox="0 0 483.083 483.083" id="hsearch">
      <path d="M332.74,315.35c30.883-33.433,50.15-78.2,50.15-127.5C382.89,84.433,298.74,0,195.04,0S7.19,84.433,7.19,187.85
      S91.34,375.7,195.04,375.7c42.217,0,81.033-13.883,112.483-37.4l139.683,139.683c3.4,3.4,7.65,5.1,11.9,5.1s8.783-1.7,11.9-5.1
      c6.517-6.517,6.517-17.283,0-24.083L332.74,315.35z M41.19,187.85C41.19,103.133,110.04,34,195.04,34
      c84.717,0,153.85,68.85,153.85,153.85S280.04,341.7,195.04,341.7S41.19,272.567,41.19,187.85z"/>
    </symbol>
    <symbol viewBox="0 0 129 129" id="addwish">
     <path d="m121.6,40.1c-3.3-16.6-15.1-27.3-30.3-27.3-8.5,0-17.7,3.5-26.7,10.1-9.1-6.8-18.3-10.3-26.9-10.3-15.2,0-27.1,10.8-30.3,27.6-4.8,24.9 10.6,58 55.7,76 0.5,0.2 1,0.3 1.5,0.3 0.5,0 1-0.1 1.5-0.3 45-18.4 60.3-51.4 55.5-76.1zm-57,67.9c-39.6-16.4-53.3-45-49.2-66.3 2.4-12.7 11.2-21 22.3-21 7.5,0 15.9,3.6 24.3,10.5 1.5,1.2 3.6,1.2 5.1,0 8.4-6.7 16.7-10.2 24.2-10.2 11.1,0 19.8,8.1 22.3,20.7 4.1,21.1-9.5,49.6-49,66.3z"></path>
   </symbol>
   <symbol id="pcart" viewBox="0 0 491.029 491.029">    
     <path d="M470.129,1.515h-66.6c-9.4,0-17.7,5.2-19.8,14.6l-71.8,263.2h-212.1l-51-155h225.8c11.4,0,20.8-9.4,20.8-20.8
     s-9.4-20.8-20.8-20.8h-253.9c-15.5,0-23.6,15.2-19.8,27l64.5,196.7c3.1,8.3,11.4,13.5,19.8,13.5h241.4c9.4,0,17.7-6.2,20.8-13.5
     l71.8-263.2h51c11.4,0,20.8-9.4,20.8-20.8S481.629,1.515,470.129,1.515z"/>
     <path d="M283.929,350.115c-38.5,0-69.7,31.2-69.7,69.7s31.2,69.7,69.7,69.7c39.5,0,69.7-31.2,69.7-69.7
     S322.429,350.115,283.929,350.115z M283.929,447.815c-15.6,0-29.1-13.5-29.1-29.1s12.5-29.1,29.1-29.1s29.1,13.5,29.1,29.1
     S300.529,447.815,283.929,447.815z"/>
     <path d="M126.829,350.115c-38.5,0-69.7,31.2-69.7,69.7s31.2,69.7,69.7,69.7s69.7-31.2,69.7-69.7S165.329,350.115,126.829,350.115z
     M126.829,447.815c-15.6,0-29.1-13.5-29.1-29.1s12.5-29.1,29.1-29.1c15.6,0,29.1,13.5,29.1,29.1S143.429,447.815,126.829,447.815z
     "/>
   </symbol>
   <symbol id="addcart" viewBox="0 0 511.998 511.998">    
    <path d="M507.472,175.195c-3.63-4.286-8.96-6.757-14.577-6.757h-53.031L335.717,26.582c-6.247-8.514-18.2-10.329-26.702-4.095
    c-8.508,6.247-10.336,18.207-4.095,26.708l87.546,119.244H114.439l87.546-119.244c6.247-8.508,4.407-20.461-4.095-26.708
    c-8.502-6.241-20.461-4.407-26.708,4.095L67.034,168.439h-47.93c-5.617,0-10.947,2.471-14.577,6.757s-5.19,9.947-4.267,15.487
    L48.021,477.25c1.535,9.208,9.508,15.965,18.843,15.965h378.269c9.342,0,17.309-6.75,18.843-15.965l47.761-286.567
    C512.662,185.149,511.102,179.481,507.472,175.195z M428.953,455.006H83.047L41.654,206.648h428.692L428.953,455.006z"></path>
    <path d="M256,251.225c-10.552,0-19.104,8.552-19.104,19.104v125.454c0,10.552,8.552,19.104,19.104,19.104
    c10.552,0,19.104-8.546,19.104-19.105V270.329C275.104,259.777,266.552,251.225,256,251.225z"></path>
    <path d="M354.706,251.225c-10.552,0-19.104,8.552-19.104,19.104v125.454c0,10.552,8.552,19.104,19.104,19.104
    c10.553,0,19.105-8.546,19.104-19.105V270.329C373.81,259.777,365.258,251.225,354.706,251.225z"></path>
    <path d="M157.294,251.225c-10.552,0-19.104,8.552-19.104,19.104v125.454c0,10.552,8.552,19.104,19.104,19.104
    s19.104-8.546,19.104-19.105V270.329C176.398,259.777,167.846,251.225,157.294,251.225z"></path>
  </symbol>
  <symbol id="addcompare" viewBox="0 0 73.17 73.17">    
    <path d="M36.856,12.554c-2.393,0-4.328,1.896-4.328,4.234v52.14c0,2.348,1.936,4.242,4.328,4.242
    c2.389,0,4.328-1.896,4.328-4.242v-52.14C41.185,14.449,39.244,12.554,36.856,12.554z M13.957,26.687
    c-2.391,0-4.329,1.903-4.329,4.242v37.999c0,2.348,1.938,4.242,4.329,4.242c2.388,0,4.325-1.896,4.325-4.242V30.929
    C18.282,28.59,16.345,26.687,13.957,26.687z M59.214,0c-2.389,0-4.324,1.903-4.324,4.242v64.686c0,2.348,1.937,4.242,4.324,4.242
    c2.393,0,4.328-1.896,4.328-4.242V4.242C63.542,1.903,61.606,0,59.214,0z"></path>
  </symbol>
  <symbol viewBox="0 0 456.793 456.793" id="proquick">
   <path d="M448.947,218.474c-0.922-1.168-23.055-28.933-61-56.81c-50.707-37.253-105.879-56.944-159.551-56.944
   c-53.673,0-108.845,19.691-159.551,56.944c-37.944,27.876-60.077,55.642-61,56.81L0,228.396l7.845,9.923
   c0.923,1.168,23.056,28.934,61,56.811c50.707,37.254,105.878,56.943,159.551,56.943c53.672,0,108.844-19.689,159.551-56.943
   c37.945-27.877,60.078-55.643,61-56.811l7.846-9.923L448.947,218.474z M228.396,312.096c-46.152,0-83.699-37.548-83.699-83.699
   c0-46.152,37.547-83.699,83.699-83.699s83.7,37.547,83.7,83.699C312.096,274.548,274.548,312.096,228.396,312.096z
   M41.685,228.396c9.197-9.872,25.32-25.764,46.833-41.478c13.911-10.16,31.442-21.181,51.772-30.305
   c-15.989,19.589-25.593,44.584-25.593,71.782s9.604,52.193,25.593,71.782c-20.329-9.124-37.861-20.146-51.771-30.306
   C67.002,254.159,50.878,238.265,41.685,228.396z M368.273,269.874c-13.912,10.16-31.443,21.182-51.771,30.306
   c15.988-19.589,25.594-44.584,25.594-71.782s-9.605-52.193-25.594-71.782c20.33,9.124,37.861,20.146,51.771,30.305
   c21.516,15.715,37.639,31.609,46.832,41.477C405.91,238.268,389.785,254.161,368.273,269.874z"></path>
   <path d="M223.646,168.834c-27.513,4-50.791,31.432-41.752,59.562c8.23-20.318,25.457-33.991,45.795-32.917
   c16.336,0.863,33.983,18.237,33.59,32.228c1.488,22.407-12.725,39.047-32.884,47.191c46.671,15.21,73.197-44.368,51.818-79.352
   C268.232,175.942,245.969,166.23,223.646,168.834z"></path>
  </symbol>
</svg>
</head>
<body style="">
@include('frontend.layouts.header')
@if(session('flash_messange'))
      <div class="alert alert-success">
        {{ session('flash_messange') }}
      </div>
    @endif
<!-- slider -->
@include('frontend.layouts.slide')
<!-- end-slider -->

<!-- banner qcao -->
@include('frontend.layouts.banner')
<!-- end banner -->
<!-- Danh mục sản phẩm -->
<div class="container pro-nepr">
  <div class="cat-img">
    <h3 class="heading">Danh mục sản phẩm</h3>
    <div class="homecate row thummargin">
      <div id="featured_category" >
        <div class="category_module p-0">
          <div id="category-name" class="owl-carousel owl-theme beyqu-center-column-btn">
            @foreach($loai_sp as $cate)
              <div class="col-xs-12 text-center cate-pa">
                <div class="block-cat-wr">
                <a href="{{ url('danh-muc', [$cate->link, $cate->id]) }}">
                  <img src="{{asset('storage/category/' .$cate->image) }}" alt="">
                </a>
                <div class="content-thumb">
                  <div class="catedesh">
                    <h3 class="text-center"><a href="{{ url('danh-muc', [$cate->link, $cate->id]) }}" class="">{{ $cate->name }}</a></h3>
                  </div>
                </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>           
</div>
<!-- End Danh mục sản phẩm -->

<div id="main">
  <div class="container">
    <!-- sp bán chạy -->
        <div class="pro-nepr">
           <h3 class="heading">Sản phẩm bán chạy</h3>
           <div class="row thummargin">
                <!-- box-product -->
              @foreach($pro_hot as $item)
                <div class="product-layout col-lg-3 col-sm-4 col-12">
                  <div style="margin-bottom: 25px;" class="product-thumb transition">
                    <div class="image">
                      <a href="{{ url('san-pham', $item->url) }}"><img style="height: 250px; width: 100%; border-radius: 5px 5px 0px 0px;" src="{{ asset('storage/products/' .$item->image)}}" alt="MacBook" title="MacBook" class="img-responsive center-block" /></a>
                    </div>
                   <div class="caption text-center">
                      <h3 class="pro-name"><a href="{{ url('san-pham', $item->url) }}">{{ $item->name }}</a></h3>
                      <p class="price">
                        <span class="price-new">{{ number_format($item->price) }} VNĐ</span>
                        <!-- <span class="price-old">$602.00</span> -->
                      </p>
                      <div class="input-group col-xs-12 col-sm-12 qop">
                        <input type="hidden" name="product_id" value=""/>
                        <a href="{{ route('addcart', $item->id)}}">
                          <button type="button" class="acart" onclick="">
                            <svg width="18px" height="18px" class="">
                              <use xlink:href="#pcart"></use>
                            </svg>
                          </button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
                <!-- End-box -->
          </div>
        </div>
    <!-- end-bán chạy -->
    <!-- sp-nổi bật -->
    <div class="pro-nepr">
      <h3 class="heading">Sản phẩm nổi bật</h3>
      <div class="row thummargin"> 
          <!-- box-product -->
        @foreach($pro_hl as $item)
          <div class="product-layout col-lg-3 col-sm-4 col-12">
            <div style="margin-bottom: 25px;" class="product-thumb transition">
              <div class="image">
                <a href="{{ url('san-pham', $item->url) }}"><img style="height: 250px; width: 100%; border-radius: 5px 5px 0px 0px;" src="{{ asset('storage/products/' .$item->image)}}" alt="MacBook" title="MacBook" class="img-responsive center-block" /></a>
              </div>
             <div class="caption text-center">
                <h3 class="pro-name"><a href="{{ url('san-pham', $item->url) }}">{{ $item->name }}</a></h3>
                <p class="price">
                  <span class="price-new">{{ number_format($item->price) }} VNĐ</span>
                  <!-- <span class="price-old">$602.00</span> -->
                </p>
                <div class="input-group col-xs-12 col-sm-12 qop">
                  <input type="hidden" name="product_id" value=""/>
                  <a href="{{ route('addcart', $item->id)}}">
                    <button type="button" class="acart" onclick="">
                      <svg width="18px" height="18px" class="">
                        <use xlink:href="#pcart"></use>
                      </svg>
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
          <!-- End-box -->
      </div>
    </div>
    <!-- end-sp nổi bật -->

    <!-- Blog -->
    <div class="pro-nepr">
      <div class="box blog_inspire ">
        <div class="cmn-title wow bounce">
          <h3 class="heading">Tin tức nổi bật</h3>
        </div>
        <div class="box-content row thummargin">
          <div class="box-product">
            <div id="blog" class="owl-carousel owl-theme">
              @foreach($news as $item)
              <div class="product-block col-xs-12">
                <div class="blogb">
                  <div class="blog-left">
                    <div class="inspire-blog-giaodien/image">
                      <a href="{{ url('tin-tuc', $item->url) }}">
                        <img style="width: 275px; height: 240px; border-radius: 5px;" src="{{ asset('storage/news/' .$item->image)}}" alt="Blog" title="Blog" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                  <div class="blog-right">
                    <a href="{{ url('tin-tuc', $item->url) }}">
                      <div class="blog-title">
                        <h3>{{ $item->title }}</h3>
                      </div>
                    </a>
                    <div class="blog_links">
                    <div>
                      <span class="blog-date">{{ $item->date }}</span>
                    </div>
                  </div>
                    <div class="blog-desc">{!! $item->desc_en !!}</div>
                    <a class="read more" href="{{ url('tin-tuc', $item->url) }}">Xem thêm...</a> 
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end blog -->

    <!-- Đối tác -->
    {{-- <div class="carouselbg">
      <div class="cmn-title wow bounce">
        <h3 class="heading">Đối tác</h3>
      </div>
      <div class="logo-slider row">
          <div class="col-xs-12">
            <div id="carousel0" class="owl-carousel owl-theme">
              @foreach($partner as $item)
              <a href="{{$item->link}}" target="_blank">
                <div class="text-center">
                  <img style="width: 80%; height: 80%" src="{{ asset('storage/partner/' .$item->image)}}" alt="đối tác" class="center-block img-responsive"/>
                </div>
              </a>
              @endforeach
            </div>
          </div>
      </div>
    </div> --}}
    <!-- end Đối tác -->
  </div>
</div>
<!-- end-main -->

@include('frontend.layouts.footer')
@include('frontend.layouts.script')

</body>
</html>



