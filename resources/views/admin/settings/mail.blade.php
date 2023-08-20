@extends('admin.layouts/app')

@section('title', __('admin.ms_title'))

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
        <div id="kt_app_content_container" class="app-container container-xxl row">
            <!--begin::div container-->
            <div class="col-md-6 p-2">
                <!--begin::Card mail settings-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title fs-3 fw-bold">{{__('admin.ms_title')}}</div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Form-->
                    <form id="kt_mail_settings_form" class="form form-validation">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.ms_server')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="mail_server" value="{{get_setting('mail_server')}}" placeholder="{{__('admin.ms_server')}}"/>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.ms_port')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="mail_port" value="{{get_setting('mail_port')}}" placeholder="{{__('admin.ms_port')}}"/>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.ms_user')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="mail_user" value="{{get_setting('mail_user')}}" placeholder="{{__('admin.ms_user')}}"/>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.ms_password')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="mail_password" value="{{get_setting('mail_password')}}" placeholder="{{__('admin.ms_password')}}"/>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.ms_encryption')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <select class="form-select form-select-solid" name="mail_encryption" data-placeholder="{{__('admin.sh_selec_option')}}">
                                        <option value="SSL" {{get_setting('mail_encryption') == 'SSL' ? 'selected' : ''}}>SSL</option>
                                        <option value="TLS" {{get_setting('mail_encryption') == 'TLS' ? 'selected' : ''}}>TLS</option>
                                    </select>
                                </div>
                                <!--begin::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.ms_sender')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="mail_sender" value="{{get_setting('mail_sender')}}" placeholder="{{__('admin.ms_sender')}}"/>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.ms_sender_name')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="mail_sender_name" value="{{get_setting('mail_sender_name')}}" placeholder="{{__('admin.ms_sender_name')}}"/>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.sh_discard')}}</button>
                            <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.mail_settings.save')}}"
                                data-loading-target="kt_app_content_container" data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">
                                {{__('admin.sh_save')}}
                            </button>
                        </div>
                        <!--end::Card footer-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Card mail settings-->
            </div>
            <!--end::div container-->

            <!--begin::div container-->
            <div class="col-md-6 p-2">
                <!--begin::Card test mail-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title fs-3 fw-bold">{{__('admin.ms_check')}}</div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Form-->
                    <form id="kt_check_mail_settings_form" class="form form-validation">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.ms_email')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="mail" placeholder="{{__('admin.ms_email')}}"/>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.sh_discard')}}</button>
                            <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.mail_test')}}"
                                data-loading-target="kt_app_content_container" data-ajax-type="POST" data-type="form" data-on-start-submit-button="disable">
                                {{__('admin.ms_send_check')}}
                            </button>
                        </div>
                        <!--end::Card footer-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Card test mail-->

                <!--begin::Card instructures-->
                <div class="card mt-4">
                    <!--begin::Card header-->
                    <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_card_collapsible">
                        <!--begin::Card title-->
                        <div class="card-title fs-3 fw-bold">{{__('admin.ms_instructions')}}</div>
                        <!--end::Card title-->
                        <div class="card-toolbar rotate-180 pulse">
                            <span class="pulse-ring"></span>
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr062.svg-->
                            <span class="svg-icon svg-icon-muted">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="currentColor"/>
                                    <path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Card header-->
                    <div id="kt_card_collapsible" class="collapse">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <p class="text-warning">{{__('admin.ms_hint')}}</p>
                            <!-- no ssl instructions -->
                            <div class="mb-2">
                                <h6 class="text-muted">{{__('admin.ms_nossl')}}</h6>
                                <ul class="list-group mb-1">
                                    <li class="list-group-item text-dark">{{__('admin.ms_nossl_1')}}</li>
                                    <li class="list-group-item text-dark">{{__('admin.ms_nossl_2')}}</li>
                                    <li class="list-group-item text-dark">{{__('admin.ms_nossl_3')}}</li>
                                    <li class="list-group-item text-dark">{{__('admin.ms_nossl_4')}}</li>
                                </ul>
                            </div>
                            <!-- ssl instructions -->
                            <div class="mb-2">
                                <h6 class="text-muted">{{__('admin.ms_ssl')}}</h6>
                                <ul class="list-group">
                                    <li class="list-group-item text-dark">{{__('admin.ms_ssl_1')}}</li>
                                    <li class="list-group-item text-dark">{{__('admin.ms_ssl_2')}}</li>
                                    <li class="list-group-item text-dark">{{__('admin.ms_ssl_3')}}</li>
                                    <li class="list-group-item text-dark">{{__('admin.ms_ssl_4')}}</li>
                                </ul>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <!--end::Card instructures-->
            </div>
           <!--end::div container-->
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
@endsection