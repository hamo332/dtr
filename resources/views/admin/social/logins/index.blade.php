@extends('admin.layouts/app')

@section('title', __('admin.sm_logins_title'))

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
                                <a class="nav-link btn btn-block d-flex btn-active-light-info active" data-bs-toggle="tab" href="#kt_vtab_facebook_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/social/soc004.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor"/>
                                            <path d="M13.643 9.36206C13.6427 9.05034 13.7663 8.75122 13.9864 8.53052C14.2065 8.30982 14.5053 8.18559 14.817 8.18506H15.992V5.23999H13.643C13.1796 5.24052 12.7209 5.33229 12.293 5.51013C11.8651 5.68798 11.4764 5.94841 11.1491 6.27649C10.8219 6.60457 10.5625 6.99389 10.3857 7.42224C10.209 7.85059 10.1183 8.30956 10.119 8.77295V11.718H7.769V14.663H10.119V21.817C11.2812 22.0479 12.4762 22.0604 13.643 21.854V14.663H15.992L17.167 11.718H13.643V9.36206Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">{{__('admin.sm_facebook_settings')}}</span>
                                        <span class="fs-7">{{__('admin.sh_click_to_go')}}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="nav-link btn btn-block d-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_twitter_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/social/soc006.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M19.0003 4.40002C18.2003 3.50002 17.1003 3 15.8003 3C14.1003 3 12.5003 3.99998 11.8003 5.59998C11.0003 7.39998 11.9004 9.49993 11.2004 11.2999C10.1004 14.2999 7.80034 16.9 4.90034 17.9C4.50034 18 3.80035 18.2 3.10035 18.2C2.60035 18.3 2.40034 19 2.90034 19.2C4.40034 19.8 6.00033 20.2 7.80033 20.2C15.8003 20.2 20.2004 13.5999 20.2004 7.79993C20.2004 7.59993 20.2004 7.39995 20.2004 7.19995C20.8004 6.69995 21.4003 6.09993 21.9003 5.29993C22.2003 4.79993 21.9003 4.19998 21.4003 4.09998C20.5003 4.19998 19.7003 4.20002 19.0003 4.40002Z" fill="currentColor"/>
                                            <path d="M11.5004 8.29997C8.30036 8.09997 5.60034 6.80004 3.30034 4.50004C2.90034 4.10004 2.30037 4.29997 2.20037 4.79997C1.60037 6.59997 2.40035 8.40002 3.90035 9.60002C3.50035 9.60002 3.10037 9.50007 2.70037 9.40007C2.40037 9.30007 2.00036 9.60004 2.10036 10C2.50036 11.8 3.60035 12.9001 5.40035 13.4001C5.10035 13.5001 4.70034 13.5 4.30034 13.6C3.90034 13.6 3.70035 14.1001 3.90035 14.4001C4.70035 15.7001 5.90036 16.5 7.50036 16.5C8.80036 16.5 10.1004 16.5 11.2004 15.8C12.7004 14.9 13.9003 13.2001 13.8003 11.4001C13.9003 10.0001 13.1004 8.39997 11.5004 8.29997Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5 fw-bold">{{__('admin.sm_twitter_settings')}}</span>
                                        <span class="fs-7">{{__('admin.sh_click_to_go')}}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="nav-link btn btn-block d-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_google_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/abstract/abs034.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M22 12C22 13.8 21.5 15.5 20.7 17L14.9 7H20.7C21.5 8.5 22 10.2 22 12ZM3.3 7L6.2 12L12 2C8.3 2 5.1 4 3.3 7ZM3.3 17C5 20 8.3 22 12 22L14.9 17H3.3Z" fill="currentColor"/>
                                            <path d="M20.7 7H9.2L12.1 2C15.7 2 18.9 4 20.7 7ZM3.3 7C2.4 8.5 2 10.2 2 12C2 13.8 2.5 15.5 3.3 17H9.10001L3.3 7ZM17.8 12L12 22C15.7 22 18.9 20 20.7 17L17.8 12Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5 fw-bold">{{__('admin.sm_google_settings')}}</span>
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
                        <div class="tab-pane fade show active" id="kt_vtab_facebook_settings" role="tabpanel">
                            @include('admin.social.logins.facebook')
                        </div>
                        <div class="tab-pane fade" id="kt_vtab_twitter_settings" role="tabpanel">
                            @include('admin.social.logins.twitter')
                        </div>
                        <div class="tab-pane fade" id="kt_vtab_google_settings" role="tabpanel">
                            @include('admin.social.logins.google')
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
    
    
@endsection