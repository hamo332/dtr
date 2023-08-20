
<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title fs-3 fw-bold">{{__('admin.hs_title')}}</div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Form-->
    <form id="kt_header_settings_form" class="form form-validation">
        @csrf
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->                        
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.hs_logo')}}</div>
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
                        <input type="hidden" name="types[]" value="header_logo">
                        <input type="hidden" name="header_logo" value="{{get_setting('header_logo')}}" class="selected-files">
                    </div>
                    <div class="file-preview box sm"></div> 
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.hs_language_changer')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" id="language_changer" name="language_changer" value="{{get_setting('language_changer') ?? 'off'}}" {{get_setting('language_changer') == 'on' ? 'checked' : ''}}/>
                        <label class="form-check-label fw-semibold text-gray-400 ms-3" for="status">{{__('admin.sh_active')}}</label>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="separator border-5 border-light theme-light-show my-10"></div>
            <!--begin::Row-->                        
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.hs_baner')}}</div>
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
                        <input type="hidden" name="types[]" value="header_baner">
                        <input type="hidden" name="header_baner" value="{{get_setting('header_baner')}}" class="selected-files">
                    </div>
                    <div class="file-preview box sm"></div> 
                    <p class="text-warning">{{__('admin.hs_baner_hint')}}</p>
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.hs_baner_link')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="baner_link" value="{{get_setting('baner_link')}}" placeholder="{{__('admin.hs_baner_link')}}"/>
                </div>
            </div>
            <!--end::Row-->
            <div class="separator border-5 border-light theme-light-show my-10"></div>
            <!--begin::Repeater-->
            <div id="menu" class="row mb-8">
                <!--Begin::title-->
                <div class="col-sm-12">
                    <h4 class="card-title">
                    {{__('admin.hs_add')}} 
                    </h4>
                </div>
                <!--End::title-->

                <!--begin::Form group-->
                <div class="form-group">
                    <div data-repeater-list="menu">
                        @if(get_setting('menu') != null)
                            @foreach (json_decode( get_setting('menu'), true) as $key => $value)
                                <div data-repeater-item>
                                    <div class="form-group row m-b-2">
                                        <div class="col-md-4">
                                            <label class="form-label">{{__('admin.hs_menu_name')}}:</label>
                                            <input type="text" class="form-control form-control-solid mb-2 mb-md-0" value="{{$value['name']}}" name="name" placeholder="{{__('admin.hs_menu_name')}}"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{__('admin.hs_menu_link')}}:</label>
                                            <input type="text" class="form-control form-control-solid mb-2 mb-md-0" name="link" value="{{$value['link']}}" placeholder="{{__('admin.hs_menu_link')}}" />
                                        </div>
                                        <div class="col-md-2 text-end">
                                            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                <i class="la la-trash-o"></i>{{__('admin.hs_delete')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div data-repeater-item>
                                <div class="form-group row m-b-2">
                                    <div class="col-md-4">
                                        <label class="form-label">{{__('admin.hs_menu_name')}}:</label>
                                        <input type="text" class="form-control form-control-solid mb-2 mb-md-0" name="name" placeholder="{{__('admin.hs_menu_name')}}"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{__('admin.hs_menu_link')}}:</label>
                                        <input type="email" class="form-control form-control-solid mb-2 mb-md-0" name="link" placeholder="{{__('admin.hs_menu_link')}}" />
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                            <i class="la la-trash-o"></i>{{__('admin.hs_delete')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!--end::Form group-->

                <!--begin::Form group-->
                <div class="form-group mt-5">
                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                        <i class="la la-plus"></i>Add
                    </a>
                </div>
                <!--end::Form group-->
            </div>
            <!--end::Repeater-->


        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.sh_discard')}}</button>
            <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.header_store')}}"
                data-loading-target="kt_app_content_container" data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">
                {{__('admin.sh_save')}}
            </button>
        </div>
        <!--end::Card footer-->
    </form>
    <!--end:Form-->
</div>
<!--end::Card-->
        