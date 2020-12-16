<footer>
  <!-- chăm sóc khach hàng -->
  <div class="service-bg">
    <div class="container">
      <div class="all-ser text-center">
          <div class="ser-block">
            <div class="d-inline-block">
              <i class="fa fa-handshake-o" aria-hidden="true"></i>
            </div>
            <div class="ser-co d-inline-block text-left">
              <p>Cam kết chính hãng</p>
            </div>
          </div>
          <div class="ser-block">
            <div class="d-inline-block">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </div>
            <div class="ser-co d-inline-block text-left">
              <p>Giá luôn tốt nhất</p>
            </div>
          </div>
          <div class="ser-block">
            <div class="d-inline-block">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <div class="ser-co d-inline-block text-left">
              <p>Hỗ trợ tận tâm</p>
            </div>
          </div>
          <div class="ser-block">
            <div class="d-inline-block">
              <i class="fa fa-truck" aria-hidden="true"></i>
            </div>
            <div class="ser-co d-inline-block text-left">
              <p>Giao hàng miễn phí</p>
            </div>
          </div>
          <div class="ser-block">
            <div class="d-inline-block">
              <i class="fa fa-credit-card"></i>
            </div>
            <div class="ser-co d-inline-block text-left">
              <p>Thanh toán linh hoạt</p>
            </div>
          </div>
      </div>
    </div>
  </div>
  <!-- Chăm sóc khách hàng -->
  <div class="container">
    <div class="">
      <div class="row footmr">
        <div class="middle-footer">
          <div class="col-sm-3">
              <div id="info" class="collapse footer-collapse">
                @foreach($stt as $item)
                <ul class="list-unstyled">
                  <li class="img-logo">
                    <a href="{{ route('index')}}"><img src="{{asset('storage/setting/' .$item->logo) }}" alt=""></a>
                  </li>
                  <li>
                    <p>{{ $item->des_en }}</p>
                  </li>
               </ul>
               @endforeach
              <div class="footsocial">
                @foreach($stt as $item)
                <ul class="socials list-inline">
                 <li class="facebook"><a href="{{ $item->link_fb }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                 <li class="twitter"><a href="{{ $item->link_tw }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                 <li class="google_plus"><a href="{{ $item->link_yt }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                 <li class="pinterest"><a href="{{ $item->link_pin }}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                </ul>
                @endforeach
              </div>
             </div>
          </div>
          <div class="col-sm-3">
            <h5>Quy định và chính sách
              <button type="button" class="btn btn-primary toggle collapsed" data-toggle="collapse" data-target="#account"></button>
            </h5>
            <div id="account" class="collapse footer-collapse">
              <ul class="list-unstyled lastb">
                @foreach($page as $item)
                <li><a href="{{ route('page', $item->id)}}"><p><i style="font-size: 11px;" class="fa fa-chevron-right" aria-hidden="true"></i> &nbsp{{ $item->name }}</p></a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="xs-fab">
              <aside id="column-left1">
                <div>
                  <div>
                    <h5 class="">
                      <span>Liên hệ với chúng tôi</span>
                      <button type="button" class="btn btn-primary toggle collapsed" data-toggle="collapse" data-target="#contact"></button>
                    </h5>
                    <div id="contact" class="collapse footer-collapse footcontact">
                      @foreach($stt as $item)
                      <ul class="list-unstyled f-left">
                        <li><i class="fa fa-map-marker"></i>{{ $item->address1}} </li>
                        <li><i class="fa fa-phone"></i>{{ $item->sup_telephone1 }}</li>
                        <li><i class="fa fa-envelope"></i>&nbsp{{ $item->email}}</li>
                      </ul>
                      <ul class="list-unstyled f-left">
                        <li><i class="fa fa-map-marker"></i>{{ $item->address2 }} </li>
                        <li><i class="fa fa-phone"></i>{{ $item->sup_telephone2 }}</li>
                        <li><i class="fa fa-envelope"></i>&nbsp{{ $item->email}}</li>
                      </ul>
                      <ul class="list-unstyled f-left">
                        <li><i class="fa fa-map-marker"></i>{{ $item->address3 }} </li>
                        <li><i class="fa fa-phone"></i>{{ $item->sup_telephone3  }}</li>
                        <li><i class="fa fa-envelope"></i>&nbsp{{ $item->email}}</li>
                      </ul>
                      @endforeach
                    </div>
                  </div>
                </div>
              </aside>
           </div>
          </div>
        </div>
      </div>
      <div></div>
    </div>
  </div>
  <div class="foot-bootom text-center">
    <div class="container">
      <div class="row">
        <div class="left col-lg-6 col-sm-12 col-12">
          <p>© 2018 by LabVietChem All Right Reserved</p>
          <a href="#" target="_blank" rel="nofollow"><img src="giaodien/image/catalog/da-thong-bao-bo-cong-thuong.png" alt=""></a>
        </div>
      </div>
    </div>
  </div>
  <a href="" id="scroll" title="Scroll to Top" style="display: block;">
   <i class="fa fa-angle-up"></i>
  </a>
</footer>
<div id="box-phone-number">
    <span class="ping"></span>
    <i class="fa fa-phone" aria-hidden="true"></i>
    <a class="phone" href="tel:0963029988">0963029988</a>
</div>