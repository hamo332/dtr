@php $locale = App::currentLocale();@endphp
<!DOCTYPE html>
<html lang="rtl" direction="rtl" dir="rtl" style="direction: rtl">
    <!--begin::Head-->
	<head><base href=""/>
		<title>{{__('admin.dashboard')}} -  @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta property="og:locale" content="{{$locale}}" />
		<meta property="og:type" content="page" />
		<meta property="og:title" content="{{__('admin.dashboard')}} -  @yield('title')" />
		<meta property="og:url" content="{{ getBaseURL() }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <!-- Include core + vendor Styles -->
        @include('admin.parts.styles')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
        <!-- include Theme mode setup on page load -->
        @include('admin.parts.theme-setup')

        <!-- BEGIN: Content-->
        <!--begin::App-->
		<div class="d-flex flex-column flex-root app-root">
			<!--begin::Page-->
            <div class="app-page flex-column flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="flex-column flex-row-fluid">
                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid">
                        @yield('content')
                    </div>
                    <!--end:::Main-->
                </div>
                <!--end::Wrapper-->
            </div>
			<!--end::Page-->
        </div>
        <!--end::App-->

        <!-- END: Content-->

        <!-- include default scripts -->
        @include('admin.parts.scripts')

        <!-- notifications toast script -->
        @include('admin.parts.flash_messages')
    </body>
</html>