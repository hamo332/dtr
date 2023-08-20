<div class="card mb-5 mb-xl-10">
    <!-- Begin::nav items -->
    <div class="card-body pb-0">
        <!--begin::Navs-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            @foreach (languageList() as $langCode => $langName)
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{$langCode == 'ar' ? 'active' : ''}}" data-bs-toggle="tab" href="#kt_about_tab_{{$langCode}}">
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
            <div class="tab-pane fade show {{$langCode == 'ar' ? 'active' : ''}}" id="kt_about_tab_{{$langCode}}" role="tabpanel">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">{{__('admin.fs_about_section')}} - ({{$langName}})</div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form id="kt_about_settings_form_{{$langCode}}" class="form form-validation">
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
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.fs_about_text')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <textarea name="footer_about" placeholder="{{__('admin.fs_about_text')}}" id="kt_ckeditor_classic_{{$langCode}}" class="form-control form-control-solid kt_ckeditor_classic">{{get_setting('footer_about',null,$langCode)}}</textarea>
                            </div>
                            <!--begin::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->                        
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.fs_logo')}}</div>
                            </div>
                            <!--end::Col-->
                            <div class="col-xl-9">
                                <div class="input-group" data-toggle="awduploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary input-solid">
                                            {{ __('admin.browse') }}
                                        </div>
                                    </div> 
                                    <div class="form-control file-amount">{{ __('admin.choose_file') }}</div>
                                    <input type="hidden" name="types[]" value="footer_logo">
                                    <input type="hidden" name="footer_logo" value="{{get_setting('footer_logo')}}" class="selected-files">
                                </div>
                                <div class="file-preview box sm"></div> 
                            </div>
                        </div>
                        <!--end::Row-->
                        <div class="separator border-5 border-light theme-light-show my-10"></div>
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.fs_play_app')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" class="form-control form-control-solid" name="play_app" value="{{get_setting('play_app')}}" placeholder="{{__('admin.fs_play_app')}}"/>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.fs_apple_app')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" class="form-control form-control-solid" name="apple_app" value="{{get_setting('apple_app')}}" placeholder="{{__('admin.fs_apple_app')}}"/>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.sh_discard')}}</button>
                        <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.about_settings')}}"
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