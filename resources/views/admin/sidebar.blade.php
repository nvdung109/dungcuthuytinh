<?php $nameRouteCurrent = Route::currentRouteName();?>
<div class="br-sideleft sideleft-scrollbar ps ps--active-y">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('admin.admin.index') }}" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon fa fa-archive tx-15" aria-hidden="true"></i>
            <span class="menu-item-label">Sản phẩm</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub" style="display: none;">
            <li class="sub-item"><a href="{{ route('admin.product.add')}}" class="sub-link">Thêm mới</a></li>
            <li class="sub-item"><a href="{{ route('admin.product')}}" class="sub-link">Danh sách</a></li>
            <li class="sub-item"><a href="{{ route('admin.category')}}" class="sub-link">Danh mục</a></li>
            <li class="sub-item"><a href="{{ route('admin.brand')}}" class="sub-link">Thương hiệu</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon fa fa-user tx-15" aria-hidden="true"></i>
            <span class="menu-item-label">Thành viên</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.user')}}" class="sub-link">Danh sách</a></li>
            <li class="sub-item"><a href="{{ route('admin.user.add')}}" class="sub-link">Thêm mới</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            <span class="menu-item-label">Tin tức</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('admin.news.add')}}" class="sub-link">Thêm mới</a></li>
            <li class="sub-item"><a href="{{route('admin.news')}}" class="sub-link">Danh sách</a></li>
            <li class="sub-item"><a href="{{route('admin.cate_news')}}" class="sub-link">Danh mục</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Bình luận</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.comment')}}" class="sub-link">Danh sách</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Liên hệ</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub nav flex-column">
            <li class="sub-item"><a href="{{ route('admin.contact')}}" class="sub-link">Danh sách</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
            <span class="menu-item-label">Quản lý sile</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('admin.slider.add')}}" class="sub-link">Thêm mới</a></li>
            <li class="sub-item"><a href="{{route('admin.slider')}}" class="sub-link">Danh sách</a></li>
          </ul>
        </li><!-- br-menu-item -->
{{--         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
            <span class="menu-item-label">Đối tác</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.partner.add')}}" class="sub-link">Thêm mới</a></li>
            <li class="sub-item"><a href="{{ route('admin.partner')}}" class="sub-link">Danh sách</a></li>
          </ul>
        </li><!-- br-menu-item --> --}}
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Cấu hình</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('admin.setting')}}" class="sub-link">Cấu hình chung</a></li>
            <li class="sub-item"><a href="{{route('admin.menu')}}" class="sub-link">Menu</a></li>
            <li class="sub-item"><a href="{{route('admin.banner')}}" class="sub-link">Banner</a></li>
            <li class="sub-item"><a href="{{route('admin.page')}}" class="sub-link">Trang</a></li>
          </ul>
        </li><!-- br-menu-item -->
      </ul><!-- br-sideleft-menu -->
      <br>
    <div class="ps__rail-x" style="left: 0px; top: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 575px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 369px;"></div></div></div>
<!-- Main Sidebar Container -->
