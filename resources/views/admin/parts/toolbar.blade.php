<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@yield('title')</h1>
            <!--end::Title-->
            @if(@isset($breadcrumbs))
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                {{-- this will load breadcrumbs dynamically from controller --}}
                @foreach ($breadcrumbs as $breadcrumb)
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        @if(isset($breadcrumb['link']))
                            <a href="{{ $breadcrumb['link'] == 'javascript:void(0)' ? $breadcrumb['link']:url($breadcrumb['link']) }}" class="text-muted text-hover-primary">
                        @endif
                            {{$breadcrumb['name']}}
                        @if(isset($breadcrumb['link']))
                            </a>
                        @endif
                    </li>
                    <!--end::Item-->
                    @if(isset($breadcrumb['link']))
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                    @endif
                @endforeach
            </ul>
            <!--end::Breadcrumb-->
            @endisset
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        @yield('toolbar-actions')
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->