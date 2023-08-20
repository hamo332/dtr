@php $locale = App::currentLocale();@endphp
<!DOCTYPE html>
<html lang="{{$locale}}" direction="{{$locale == 'ar' ? 'rtl' : 'ltr'}}" dir="{{$locale == 'ar' ? 'rtl' : 'ltr'}}" style="direction: {{$locale == 'ar' ? 'rtl' : 'ltr'}}">
    <!--begin::Head-->
	<head><base href="{{env('APP_URL')}}"/>
		<title>{{__('admin.dashboard')}} -  @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="description" content="{{ get_setting('meta_description') }}" />
		<meta name="keywords" content="{{ get_setting('meta_keywords') }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ getBaseURL() }}">
        <meta name="file-base-url" content="{{ getFileBaseURL() }}">
		<meta property="og:locale" content="{{$locale}}" />
		<meta property="og:type" content="page" />
		<meta property="og:title" content="{{__('admin.dashboard')}} -  @yield('title')" />
		<meta property="og:url" content="{{ getBaseURL() }}" />
		<meta property="og:site_name" content="{{ get_setting('site_name') }}" />
        @if(get_setting('appleicon') !== null)
		    <link rel="apple-touch-icon" href="{{asset(getFileById(get_setting('appleicon'))->file_name)}}">
        @endif
        @if(get_setting('favicon') !== null)
            <link rel="shortcut icon" type="image/x-icon" href="{{asset(getFileById(get_setting('favicon'))->file_name)}}">
        @endif
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <!-- Include core + vendor Styles -->
        @include('admin.parts.styles')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
        <!-- BEGIN: Content-->
        <!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                <!--begin::Header-->
                <div id="kt_app_header" class="app-header">
                    <!-- Include navbar -->
                    @include('admin.parts.navbar')
                </div>
                <!--end::Header-->

                <!--begin::Wrapper-->
                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    <!--begin::Sidebar-->
                    <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                        <!-- Include side menu -->
                        @include('admin.parts.sidemenu')
                    </div>
                    <!--end::Sidebar-->

                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">
                            <!--begin::toolbar (bread crumbs & action buttons) -->
                            @include('admin.parts.toolbar')
                            <!--end::toolbar (bread crumbs & action buttons) -->

                            @yield('content')
                        <div>
                        <!--end::Content wrapper-->

                        <!-- Include footer -->
                        @include('admin.parts.footer')
                    </div>
                    <!--end:::Main-->
                </div>
                <!--end::Wrapper-->
            </div>
			<!--end::Page-->
        </div>
        <!--end::App-->

        <!--begin::Drawers-->
        @include('admin.parts.drawers')
        <!--end::Drawers-->


        <!-- END: Content-->

        <!-- include modals -->
        @include('admin.parts.modals')


        <!-- include default scripts -->
        @include('admin.parts.scripts')

        <!-- notifications toast script -->
        @include('admin.parts.flash_messages')
    </body>
</html>