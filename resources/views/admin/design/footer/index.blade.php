@extends('admin.layouts/app')

@section('title', __('admin.fs_title'))

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
                                <a class="nav-link btn btn-block d-flex btn-active-light-info active" data-bs-toggle="tab" href="#kt_vtab_about_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/general/gen046.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                                            <path d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">{{__('admin.fs_about_section')}}</span>
                                        <span class="fs-7">{{__('admin.sh_click_to_go')}}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="nav-link btn btn-block d-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_contact_settings">
                                    <!--begin::Svg Icon | path: /icons/duotune/communication/com012.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"/>
                                            <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"/>
                                            <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5 fw-bold">{{__('admin.fs_contact_data')}}</span>
                                        <span class="fs-7">{{__('admin.sh_click_to_go')}}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="nav-link btn btn-block d-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_links_settings">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com008.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z" fill="currentColor"/>
                                            <path d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5 fw-bold">{{__('admin.fs_links')}}</span>
                                        <span class="fs-7">{{__('admin.sh_click_to_go')}}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="nav-link btn btn-block d-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_socialmedia_settings">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs048.svg-->
                                    <span class="svg-icon svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor"/>
                                            <path d="M8.70001 6C8.10001 5.7 7.39999 5.40001 6.79999 5.10001C7.79999 4.00001 8.90001 3 10.1 2.2C10.7 2.1 11.4 2 12 2C12.7 2 13.3 2.1 13.9 2.2C12 3.2 10.2 4.5 8.70001 6ZM12 8.39999C13.9 6.59999 16.2 5.30001 18.7 4.60001C18.1 4.00001 17.4 3.6 16.7 3.2C14.4 4.1 12.2 5.40001 10.5 7.10001C11 7.50001 11.5 7.89999 12 8.39999ZM7 20C7 20.2 7 20.4 7 20.6C6.2 20.1 5.49999 19.6 4.89999 19C4.59999 18 4.00001 17.2 3.20001 16.6C2.80001 15.8 2.49999 15 2.29999 14.1C4.99999 14.7 7 17.1 7 20ZM10.6 9.89999C8.70001 8.09999 6.39999 6.9 3.79999 6.3C3.39999 6.9 2.99999 7.5 2.79999 8.2C5.39999 8.6 7.7 9.80001 9.5 11.6C9.8 10.9 10.2 10.4 10.6 9.89999ZM2.20001 10.1C2.10001 10.7 2 11.4 2 12C2 12 2 12 2 12.1C4.3 12.4 6.40001 13.7 7.60001 15.6C7.80001 14.8 8.09999 14.1 8.39999 13.4C6.89999 11.6 4.70001 10.4 2.20001 10.1ZM11 20C11 14 15.4 9.00001 21.2 8.10001C20.9 7.40001 20.6 6.8 20.2 6.2C13.8 7.5 9 13.1 9 19.9C9 20.4 9.00001 21 9.10001 21.5C9.80001 21.7 10.5 21.8 11.2 21.9C11.1 21.3 11 20.7 11 20ZM19.1 19C19.4 18 20 17.2 20.8 16.6C21.2 15.8 21.5 15 21.7 14.1C19 14.7 16.9 17.1 16.9 20C16.9 20.2 16.9 20.4 16.9 20.6C17.8 20.2 18.5 19.6 19.1 19ZM15 20C15 15.9 18.1 12.6 22 12.1C22 12.1 22 12.1 22 12C22 11.3 21.9 10.7 21.8 10.1C16.8 10.7 13 14.9 13 20C13 20.7 13.1 21.3 13.2 21.9C13.9 21.8 14.5 21.7 15.2 21.5C15.1 21 15 20.5 15 20Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5 fw-bold">{{__('admin.fs_socialmedia')}}</span>
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
                        <div class="tab-pane fade show active" id="kt_vtab_about_settings" role="tabpanel">
                            @include('admin.design.footer.about')
                        </div>
                        <div class="tab-pane fade" id="kt_vtab_contact_settings" role="tabpanel">
                            @include('admin.design.footer.contact')
                        </div>
                        <div class="tab-pane fade" id="kt_vtab_links_settings" role="tabpanel">
                            @include('admin.design.footer.links')
                        </div>
                        <div class="tab-pane fade" id="kt_vtab_socialmedia_settings" role="tabpanel">
                            @include('admin.design.footer.social_media')
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
        $('.additional_links').repeater({
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
        $('#socialmedia').repeater({
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