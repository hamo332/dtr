@extends('admin.layouts/app')

@section('title', __('admin.appearance_settings'))

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
                                <a class="nav-link btn btn-block d-flex btn-active-light-info active" data-bs-toggle="tab" href="#kt_vtab_seo_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/coding/cod009.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M22.0318 8.59998C22.0318 10.4 21.4318 12.2 20.0318 13.5C18.4318 15.1 16.3318 15.7 14.2318 15.4C13.3318 15.3 12.3318 15.6 11.7318 16.3L6.93177 21.1C5.73177 22.3 3.83179 22.2 2.73179 21C1.63179 19.8 1.83177 18 2.93177 16.9L7.53178 12.3C8.23178 11.6 8.53177 10.7 8.43177 9.80005C8.13177 7.80005 8.73176 5.6 10.3318 4C11.7318 2.6 13.5318 2 15.2318 2C16.1318 2 16.6318 3.20005 15.9318 3.80005L13.0318 6.70007C12.5318 7.20007 12.4318 7.9 12.7318 8.5C13.3318 9.7 14.2318 10.6001 15.4318 11.2001C16.0318 11.5001 16.7318 11.3 17.2318 10.9L20.1318 8C20.8318 7.2 22.0318 7.59998 22.0318 8.59998Z" fill="currentColor"/>
                                            <path d="M4.23179 19.7C3.83179 19.3 3.83179 18.7 4.23179 18.3L9.73179 12.8C10.1318 12.4 10.7318 12.4 11.1318 12.8C11.5318 13.2 11.5318 13.8 11.1318 14.2L5.63179 19.7C5.23179 20.1 4.53179 20.1 4.23179 19.7Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">{{__('admin.as_title')}}</span>
                                        <span class="fs-7">{{__('admin.sh_click_to_go')}}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="nav-link btn btn-block d-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_cookies_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/coding/cod002.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M18 22C19.7 22 21 20.7 21 19C21 18.5 20.9 18.1 20.7 17.7L15.3 6.30005C15.1 5.90005 15 5.5 15 5C15 3.3 16.3 2 18 2H6C4.3 2 3 3.3 3 5C3 5.5 3.1 5.90005 3.3 6.30005L8.7 17.7C8.9 18.1 9 18.5 9 19C9 20.7 7.7 22 6 22H18Z" fill="currentColor"/>
                                            <path d="M18 2C19.7 2 21 3.3 21 5H9C9 3.3 7.7 2 6 2H18Z" fill="currentColor"/>
                                            <path d="M9 19C9 20.7 7.7 22 6 22C4.3 22 3 20.7 3 19H9Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5 fw-bold">{{__('admin.as_cookies_title')}}</span>
                                        <span class="fs-7">{{__('admin.sh_click_to_go')}}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="nav-link btn btn-block d-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_scripts_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/coding/cod003.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5 fw-bold">{{__('admin.as_additional_script_title')}}</span>
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
                        <div class="tab-pane fade show active" id="kt_vtab_seo_settings" role="tabpanel">
                            @include('admin.design.appearance.seo')
                        </div>
                        <div class="tab-pane fade" id="kt_vtab_cookies_settings" role="tabpanel">
                            @include('admin.design.appearance.cookies')
                        </div>
                        <div class="tab-pane fade" id="kt_vtab_scripts_settings" role="tabpanel">
                            @include('admin.design.appearance.scripts')
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
    
    <!-- meta tags script -->
    <script>
        $('.meta_tags').each(function(){
            var metaTags = $(this)[0];
            // Initialize Tagify components on the above inputs
            new Tagify(metaTags);
        });     
    </script>

    <script>
        $('#cookies_status').on('click',function(){
            var val = $(this)[0].checked == true ? 'on' : 'off';
            $('input[name=cookies_status]').val(val);
            if(val == 'on')
            {
                $('.cookies_text').removeClass('d-none');
            }
            else
            {
                $('.cookies_text').addClass('d-none');
            }
        });
    </script>
@endsection