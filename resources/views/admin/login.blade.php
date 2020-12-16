<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng nhập</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('assets/admin/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/admin/css/bracket.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/admin/css/jquery.growl.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        .login_error{
            list-style: none;
        }
    </style>
</head>
<body class="hold-transition login-page">

  <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
      <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal"></span> ADMIN <span class="tx-info">LabVietChem</span> <span class="tx-normal"></span></div>
     @if (count($errors) >0)
         <ul>
             @foreach($errors->all() as $error)
                 <li class="text-danger"> {{ $error }}</li>
             @endforeach
         </ul>
     @endif
     @if (session('status'))
         <ul>
             <li class="text-danger"> {{ session('status') }}</li>
         </ul>
     @endif
        <form action="{{url('admin/login')}}" method="POST" class="mg-t-20" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <input type="text" name="email"  class="form-control" placeholder="Enter your username">
            @if ($errors->has('email'))
            <span class="error">{{ $errors->first('email') }}</span>
            @endif    
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter your Password">
            @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
            @endif
            <a href="" class="tx-info tx-12 d-block mg-t-10" style="display: none !important;">Quên mật khẩu?</a>
          </div><!-- form-group -->
          <button type="submit" class="btn btn-info btn-block mg-t-20">Đăng nhập</button>
      </form>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->

<!-- /.login-box -->
<script language="javascript" src="{{ asset('assets/admin/lib/jquery/jquery.min.js') }}"></script>
<script language="javascript" src="{{ asset('assets/admin/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script language="javascript" src="{{ asset('assets/admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script language="javascript" src="{{ asset('assets/admin/js/jquery.growl.js') }}"></script>


@include("admin.flash-message")

</body>
</html>
