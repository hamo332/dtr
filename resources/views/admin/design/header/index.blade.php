@extends('admin.layouts/app')

@section('title', __('admin.hs_title'))

@section('vendor-style')
  <!-- vendor css files -->
@endsection

@section('page-style')
  <!-- Page css files -->
  
@endsection 

@section('content')

    @section('toolbar-actions')
        @include('admin.settings.misc.list_actions')
    @endsection

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="row">
                <!--begin::ui navbar-->
                <div class="col-md-3 mb-5">
                    <div class="card">
                        <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column fs-6 mt-5 mb-5">
                            <li class="nav-item me-0">
                                <a class="nav-link btn btn-block d-flex btn-active-light-info active" data-bs-toggle="tab" href="#kt_vtab_header_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/layouts/lay010.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M20 21H3C2.4 21 2 20.6 2 20V10C2 9.4 2.4 9 3 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z" fill="currentColor"/>
                                            <path d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5 fw-bold">{{__('admin.hs_title')}}</span>
                                        <span class="fs-7">{{__('admin.sh_click_to_go')}}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="nav-link btn btn-block d-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_slider_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/layouts/lay005.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13 21H3C2.4 21 2 20.6 2 20V4C2 3.4 2.4 3 3 3H13C13.6 3 14 3.4 14 4V20C14 20.6 13.6 21 13 21Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M17 21H21C21.6 21 22 20.6 22 20V4C22 3.4 21.6 3 21 3H17C16.4 3 16 3.4 16 4V20C16 20.6 16.4 21 17 21Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5 fw-bold">{{__('admin.hs_slider_title')}}</span>
                                        <span class="fs-7">{{__('admin.sh_click_to_go')}}</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end::ui navbar-->
                <!--begin::tabs content-->
                <div class="col-md-9 mb-5">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_vtab_header_settings" role="tabpanel">
                            @include('admin.design.header.header')
                        </div>
                        <div class="tab-pane fade" id="kt_vtab_slider_settings" role="tabpanel">
                            @include('admin.design.header.slider')
                        </div>
                    </div>
                </div>
                <!--end::tabs content-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{asset('assets/admin/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>

@endsection

@section('page-script')
    <!-- Page js files -->
    <script>
    $('#language_changer').on('click',function(){
        var val = $(this)[0].checked == true ? 'on' : 'off';
        $('input[name=language_changer]').val(val);
    });
    </script>

    <!-- Begin:: form repeater -->
    <script>
        $('#menu').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>
    <script>
        $('#slider').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>
@endsection