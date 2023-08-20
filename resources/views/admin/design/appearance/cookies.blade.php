<div class="card mb-5 mb-xl-10">
    <!-- Begin::nav items -->
    <div class="card-body pb-0">
        <!--begin::Navs-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            @foreach (languageList() as $langCode => $langName)
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{$langCode == 'ar' ? 'active' : ''}}" data-bs-toggle="tab" href="#kt_cookies_tab_{{$langCode}}">
                        {{$langName}}
                    </a>
                </li>
                <!--end::Nav item-->
            @endforeach
        </ul>
        <!--end::Navs-->
    </div>
    <!-- End::nav items -->
</div>

<!-- Begin:: tabs -->
<div class="card mb-5">
    <div class="tab-content" id="myTabContent">
        @foreach (languageList() as $langCode => $langName)
            <div class="tab-pane fade show {{$langCode == 'ar' ? 'active' : ''}}" id="kt_cookies_tab_{{$langCode}}" role="tabpanel">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">{{__('admin.as_cookies_title')}} - ({{$langName}})</div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form id="kt_cookies_settings_form_{{$langCode}}" class="form form-validation">
                    @csrf
                    <!--begin::set locale -->
                    <input type="hidden" name="locale" value="{{$langCode}}">
                    <!-- end::set locale -->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.as_cookies_status')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="cookies_status" name="cookies_status" value="{{get_setting('cookies_status','on',$langCode)}}" {{get_setting('cookies_status','on',$langCode) == 'on' ? 'checked' : ''}}/>
                                    <label class="form-check-label fw-semibold text-gray-400 ms-3" for="status">{{__('admin.sh_active')}}</label>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8 cookies_text {{get_setting('cookies_status',null,$langCode) == 'off' ? 'd-none' : ''}}">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.as_cookies_text')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <textarea name="cookies_text" placeholder="{{__('admin.as_cookies_text')}}" id="kt_ckeditor_classic_{{$langCode}}" class="form-control form-control-solid">{{get_setting('cookies_text',null,$langCode)}}</textarea>
                            </div>
                            <!--begin::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.sh_discard')}}</button>
                        <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.cookies_data')}}"
                            data-loading-target="kt_app_content_container" data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">
                            {{__('admin.sh_save')}}
                        </button>
                    </div>
                    <!--end::Card footer-->
                </form>
                <!--end:Form-->
            </div>
        @endforeach
    </div>
</div>
<!-- End:: tabs -->