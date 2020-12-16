<nav id="top" class="hidden-xs">
    <div class="container">
      <div class="paddbg">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 headadd hidden-xs">
            Hello Labvietchem
          </div>
          <div id="top-links" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
            <li class="dropdown xsac u-acc"><a href="indexe223.html?route=account/account" title="My Account" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user-o hidden-md hidden-sm hidden-lg"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down hidden-xs"></i></span></a>
              <ul class="dropdown-menu dropdown-menu-right acdrop">
                <li><a href="{{route('admin.login')}}"> <i class="fa fa-sign-in"></i> Login</a></li>
              </ul>
            </li>
          </div>
        </div>
      </div>
    </div>
</nav>
<header>
  <div class="head-bottom">
    <div class="head-po">
      <!-- serach-cart -->
      <div class="head-middle container">
        <div class="row">
          <!-- logo-cty -->
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 xslogo">
            <div id="logo">
              @foreach($header as $item)
                <a href="{{route('index')}}"><img src="{{ asset('storage/setting/' . $item->logo )}}" title="Your Store" alt="Your Store" class="img-responsive" /></a>
              @endforeach
            </div>
          </div>
          <!-- end-logo -->
          <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 rpart text-center">
            <form action="{{ route('search')}}" method="GET">
              <li id="search" class="header-btns desktop-search inline-block">
                <select class="form-control" id="insp-search-category">
                  <option value="0">Chọn danh mục</option>
                  @foreach($cate as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
                <div class="my-search">
                  <div class="input-group">
                    <input type="text" name="key" value="" placeholder="Bạn cần tìm gì.." class="form-control input-lg insp-search">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default btn-lg">
                        <svg width="20px" height="24px"><use xlink:href="#hsearch"></use></svg>
                      </button>
                    </span>
                  </div>
                </div>
              </li>
            </form>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 text-right head-hotline">
            <div class="head-hot">
              <img src="giaodien/image/catalog/hotline.png" alt="">
              <div class="text-hot">
                <p style="font-weight:bold;">Hotline 24/7</p>
                <p style="font-weight:bold;color:#ec2229;">1900 2639</p>
              </div>
            </div>
          </div>
          <!-- shopping cart-->
          <div class="col-lg-2 col-md-2 col-sm-2 text-right head-b-right">
            <div id="cart">
                <button type="button" class="dropdown-toggle">
                  <span class="cartr">
                    <a href="/giohang">
                      <img src="giaodien/image/catalog/svg-file/hcart.svg" alt="cart" class="svg" />
                    </a>
                    <span id="cart-total" class="text-left">
                      <p class="count-tot">
                        @if(Session::has('cart'))
                          {{ Session('cart')->totalQty}}
                          @else
                            0
                        @endif
                      </p>
                      <p class="hidden-xs">Giỏ hàng</p>
                    </span>
                  </span>
                </button>
            </div>
          </div>
        </div>
      </div>
      <!-- end-search-cart -->
      <!-- menu -->
      <div class="head-bg">
        <div class="container">
        <div class="row"> 
          <div class="col-xs-12 head-menu-p">
            <div class="deskmenu hsticky">
              <!-- menu-PC -->
              <div class="hidden-xs allcate">
                <div class="cate-menu" id="all-menu">
                  <nav id="menu" class="navbar">
                    <div class="navbar-header">
                      <span id="category" class="visible-xs">Danh mục</span>
                      <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                      <ul class="nav navbar-nav">
                        <li class="moremenu"><a href="{{ route('index') }}">Trang chủ</a></li>
                        <li class="dropdown moremenu">
                          <a href="#" class="dropdown-toggle header-menu" data-toggle="dropdown">Sản phẩm<i class="fa fa-angle-down enangle"></i>
                          </a>
                          <div class="dropdown-menu col">
                            <div class="dropdown-inner">
                              <ul class="list-unstyled">
                                <li class="dropdown-submenu">
                                  <a href="{{ route('sanpham')}}" class="submenu-title"> Dụng cụ thí nghiệm </a>
                                    <ul class="list-unstyled grand-child">
                                      @foreach($cate as $item)
                                      <li><a href="{{ url('danh-muc', [$item->link, $item->id]) }}">{{ $item->name }}</a>
                                      </li>
                                      @endforeach
                                    </ul>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </li>
                        @foreach($menu as $item)
                          <li class="moremenu"><a href="{{ route('page', $item->id) }}">Giới thiệu</a></li>
                        @endforeach
                        <li class="moremenu"><a href="{{ route('lienhe') }}">Liên hệ</a></li>
                        <li class="dropdown moremenu">
                          <a href="{{ route('tintuc') }}" class="dropdown-toggle header-menu" data-toggle="dropdown">Tin tức<i class="fa fa-angle-down enangle"></i>
                          </a>
                          <div class="dropdown-menu col">
                            <div class="dropdown-inner">
                              <ul class="list-unstyled">
                                <li class="dropdown-submenu">
                                    <ul class="list-unstyled grand-child">
                                      @foreach($cate_new as $item)
                                      <li><a href="{{ route('danhmuctintuc', $item->id) }}">{{ $item->name }}</a>
                                      </li>
                                      @endforeach
                                    </ul>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
              </div>
              <!-- end-menu PC -->
              <!-- menu-App -->
              <div class="hidden-md hidden-lg hidden-sm">
                <nav id="menu" class="navbar">
                  <div class="navbar-header">
                    <button type="button" class="btn btn-navbar" onclick="openNav()" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i>
                    </button>
                  </div>
                  <div id="mySidenav" class="sidenav">
                   <div class="close-nav">
                    <span class="categories">Danh mục</span>
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-close"></i></a>
                  </div>
                  <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                      <li><a href="{{ route('index') }}">Trang chủ</a></li>
                      <li class="dropdown moremenu">
                          <a href="#" class="dropdown-toggle header-menu" data-toggle="dropdown">Sản phẩm<i class="fa fa-angle-down enangle"></i>
                          </a>
                          <div class="dropdown-menu col">
                            <div class="dropdown-inner">
                              <ul class="list-unstyled">
                                <li class="dropdown-submenu">
                                  <a href="{{ route('sanpham')}}" class="submenu-title"> Dụng cụ thí nghiệm </a>
                                    <ul class="list-unstyled grand-child">
                                      @foreach($cate as $item)
                                      <li><a href="{{ url('danh-muc', $item->link) }}">{{ $item->name }}</a>
                                      </li>
                                      @endforeach
                                    </ul>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </li>
                      @foreach($menu as $item)
                        <li class="moremenu"><a href="{{ route('page', $item->id) }}">Giới thiệu</a></li>
                        @endforeach
                      <li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
                      <li><a href="{{ route('tintuc') }}">Tin tức</a></li>
                    </ul>
                  </div>
                </div>
                </nav>
              </div>
              <!-- end-menu App -->
             </div>
           </div>
         </div>
       </div>
       </div>
     </div>
   </div>
</header>