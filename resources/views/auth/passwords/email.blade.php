<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
   <!-- BEGIN: Head-->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
      <meta name="description" content="Master admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, Master admin template, dashboard template, flat admin template, responsive admin template, web app">
      <meta name="author" content="PIXINVENT">
      <title>Reset Password | PH Data</title>
      <link rel="apple-touch-icon" href="{{ asset('assets/frontend/logindesign/images/ico/apple-icon-120.png') }}">
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/logindesign/images/ico/favicon.png') }}">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
      <!-- BEGIN: Vendor CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/vendors/css/vendors.min.css') }}">
      <!-- END: Vendor CSS-->
      <!-- BEGIN: Theme CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/bootstrap.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/bootstrap-extended.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/colors.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/components.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/themes/dark-layout.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/themes/bordered-layout.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/themes/semi-dark-layout.css') }}">
      <!-- BEGIN: Page CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/core/menu/menu-types/vertical-menu.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/plugins/forms/form-validation.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/pages/authentication.css') }}">
      <!-- END: Page CSS-->
      <!-- BEGIN: Custom CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/logindesign/css/style.css') }}">
      <!-- END: Custom CSS-->
   </head>
   <!-- END: Head-->
   <!-- BEGIN: Body-->
   <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
      <!-- BEGIN: Content-->
      <style>
         .company-logo-brand{text-align: center; }
         .company-logo-brand img{width: 300px; object-fit: contain; position: absolute; top: 5%; left:0; right: 0; margin: 0 auto; }
      </style>
      <div class="app-content content ">
         <div class="content-overlay"></div>
         <div class="header-navbar-shadow"></div>
         <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
               <div class="auth-wrapper auth-basic px-2">
                  <div class="company-logo-brand">
                     <img src="https://i.imgur.com/gXYYUU8.png" alt="PH Data">
                  </div>
                  <div class="auth-inner my-2">
                     <!-- Login basic -->
                     <div class="card mb-0">
                        <div class="card-body">
                           <a href="javascript:void(0);" class="brand-logo">
                              <h2 class="brand-text text-primary ms-1">PH Data</h2>
                           </a>
                           <h4 class="card-title mb-1">{{ __('Reset Password') }} 👋</h4>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                           <form class="auth-login-form mt-2" method="POST" action="{{ route('password.email') }}">
                            @csrf
                              <div class="mb-1">
                                 <div class="d-flex justify-content-between">
                                    <label class="form-label" for="login-password">{{ __('Email Address') }}</label>
                                    <a href="{{ route('login') }}">
                                        <small>{{ __('Login?') }}</small>
                                    </a>
                                  </div>
                                 <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="john@example.com">
                                 @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                 @endif
                              </div>
                              <button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('Send Password Reset Link') }}</button>
                           </form>
                        </div>
                     </div>
                     <!-- /Login basic -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- END: Content-->
      <!-- BEGIN: Vendor JS-->
      <script src="{{ asset('assets/frontend/logindesign/vendors/js/vendors.min.js') }}"></script>
      <!-- BEGIN Vendor JS-->
      <!-- BEGIN: Page Vendor JS-->
      <script src="{{ asset('assets/frontend/logindesign/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
      <!-- END: Page Vendor JS-->
      <!-- BEGIN: Theme JS-->
      <script src="{{ asset('assets/frontend/logindesign/js/core/app-menu.js') }}"></script>
      <script src="{{ asset('assets/frontend/logindesign/js/core/app.js') }}"></script>
      <!-- END: Theme JS-->
      <!-- BEGIN: Page JS-->
      <script src="{{ asset('assets/frontend/logindesign/js/scripts/pages/auth-login.js') }}"></script>
      <!-- END: Page JS-->
      <script>
         $(window).on('load', function() {
             if (feather) {
                 feather.replace({
                     width: 14,
                     height: 14
                 });
             }
         })
      </script>
   </body>
   <!-- END: Body-->
</html>