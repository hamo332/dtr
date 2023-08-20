@extends('admin.layouts/app')

@section('title', __('admin.general_settings'))

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
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">{{__('admin.gs_title')}}</div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form id="kt_general_settings_form" class="form form-validation">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.gs_site_name')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" class="form-control form-control-solid" name="site_name" value="{{get_setting('site_name')}}" placeholder="{{__('admin.gs_site_name')}}"/>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.gs_site_timezone')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <select class="form-select form-select-solid" data-control="select2" data-value="{{get_setting('site_timezone')}}" id="site_timezone" name="site_timezone" data-placeholder="{{__('admin.sh_selec_option')}}">
                                    @include('admin.settings.misc.timezone_list')
                                </select>
                            </div>
                            <!--begin::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.gs_site_lang')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <select class="form-select form-select-solid" name="site_default_lang">
                                    @foreach (languageList() as $langCode => $langName)
                                        <option value="{{$langCode}}" @if(get_setting('site_default_lang') == $langCode) selected @endif>{{$langName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--begin::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.gs_site_status')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="site_status" name="site_status" value="{{get_setting('site_status')}}" {{get_setting('site_status') == 'on' ? 'checked' : ''}}/>
                                    <label class="form-check-label fw-semibold text-gray-400 ms-3" for="status">{{__('admin.sh_active')}}</label>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8 close_message {{get_setting('site_status') != 'on' ? '' : 'd-none'}}">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.gs_site_close_message')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <textarea name="site_close_message" placeholder="{{__('admin.gs_site_close_message')}}" id="kt_ckeditor_classic" class="form-control form-control-solid kt_ckeditor_classic">{{get_setting('site_close_message')}}</textarea>
                            </div>
                            <!--begin::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->                        
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.gs_site_logo')}}</div>
                            </div>
                            <!--end::Col-->
                            <div class="col-xl-9">
                                <div class="input-group" data-toggle="awduploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary">
                                            {{ __('admin.browse') }}
                                        </div>
                                    </div> 
                                    <div class="form-control file-amount">{{ __('admin.choose_file') }}</div>
                                    <input type="hidden" name="types[]" value="logo">
                                    <input type="hidden" name="logo" value="{{get_setting('logo')}}" class="selected-files">
                                </div>
                                <div class="file-preview box sm"></div> 
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->                        
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.gs_site_icon')}}</div>
                            </div>
                            <!--end::Col-->
                            <div class="col-xl-9">
                                <div class="input-group" data-toggle="awduploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary">
                                            {{ __('admin.browse') }}
                                        </div>
                                    </div> 
                                    <div class="form-control file-amount">{{ __('admin.choose_file') }}</div>
                                    <input type="hidden" name="types[]" value="favicon">
                                    <input type="hidden" name="favicon" value="{{get_setting('favicon')}}" class="selected-files">
                                </div>
                                <div class="file-preview box sm"></div> 
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->                        
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.gs_site_app_icon')}}</div>
                            </div>
                            <!--end::Col-->
                            <div class="col-xl-9">
                                <div class="input-group" data-toggle="awduploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary">
                                            {{ __('admin.browse') }}
                                        </div>
                                    </div> 
                                    <div class="form-control file-amount">{{ __('admin.choose_file') }}</div>
                                    <input type="hidden" name="types[]" value="appleicon">
                                    <input type="hidden" name="appleicon" value="{{get_setting('appleicon')}}" class="selected-files">
                                </div>
                                <div class="file-preview box sm"></div> 
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.sh_discard')}}</button>
                        <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.general_settings.update')}}"
                            data-loading-target="kt_app_content_container" data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">
                            {{__('admin.sh_save')}}
                        </button>
                    </div>
                    <!--end::Card footer-->
                </form>
                <!--end:Form-->
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
    $('#site_status').on('click',function(){
        var val = $(this)[0].checked == true ? 'on' : 'off';
        $('input[name=site_status]').val(val);
        if(val == 'off')
        {
        $('.close_message').removeClass('d-none');
        }
        else
        {
        $('.close_message').addClass('d-none');
        }
    });
    </script>

    <!-- Begin:: auto select timezone -->
    <script>
        if($('#site_timezone').length){
            var val = $('#site_timezone').attr('data-value');
            $('#site_timezone option').each(function()
            {
                //console.log($(this).val());
                if($(this).val() == val)
                {
                    $(this).attr('selected', 'true');
                }
            });
        }
    </script>
@endsection