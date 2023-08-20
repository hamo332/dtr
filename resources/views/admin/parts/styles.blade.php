<!-- BEGIN: Vendor CSS-->

<!-- uppy upload  -->
<link href="https://releases.transloadit.com/uppy/v2.6.0/uppy.min.css" rel="stylesheet">
<link href="{{asset('assets/admin/plugins/custom/nprogress/nprogress.css')}}" rel="stylesheet">

@yield('vendor-style')
<!-- END: Vendor CSS-->


<!-- BEGIN: Theme CSS-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    @if($locale == 'ar')
        <link href="{{asset('assets/admin/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{asset('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endif
    <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

<!-- END: Theme CSS-->

<!-- BEGIN: Custom CSS-->
    
<!-- END: Custom CSS-->

{{-- Page Styles --}}
@yield('page-style')