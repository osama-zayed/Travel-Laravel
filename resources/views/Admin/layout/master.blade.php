<!DOCTYPE html>
<html lang="{{app()->getLocale() == 'ar' ? 'ar' : 'en'}}" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}" >
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>QUEEN BILQIS Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}} ">
      <!-- مكتبة تبع الايقونات  mid-->
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('admin/css/style_rtl.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    @endif

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}} "  />
</head>
<body>
<div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
            @include('admin.include.header')
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
             @include('admin.include.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">


                @yield('content')

               <!-- يتم استبدال هذا الجزء بمحتوى كل صفحة-->





            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
                @include('admin.include.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<script src="{{asset('admin/js/todolist.js')}}"></script>
<!-- End custom js for this page -->
</body>
</html>
