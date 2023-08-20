<div class="card mb-5 mb-xl-10">
    <!-- Begin::nav items -->
    <div class="card-body pb-0">
        <!--begin::Navs-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            @foreach (languageList() as $langCode => $langName)
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{$langCode == 'ar' ? 'active' : ''}}" data-bs-toggle="tab" href="#kt_seo_tab_{{$langCode}}">
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
            <div class="tab-pane fade show {{$langCode == 'ar' ? 'active' : ''}}" id="kt_seo_tab_{{$langCode}}" role="tabpanel">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">{{__('admin.as_title')}} - ({{$langName}})</div>
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
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_meta_title')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" class="form-control form-control-solid" value="{{get_setting('meta_title',null,$langCode)}}" name="meta_title" placeholder="{{__('admin.pc_meta_title')}}"/>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_meta_description')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <textarea name="meta_description" placeholder="{{__('admin.pc_meta_description')}}" class="form-control form-control-solid">{{get_setting('meta_description',null,$langCode)}}</textarea>
                            </div>
                            <!--begin::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_meta_keywords')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" id="meta_tags_{{$langCode}}" class="form-control form-control-solid meta_tags" value="{{get_setting('meta_keywords',null,$langCode)}}" name="meta_keywords" placeholder="{{__('admin.pc_meta_keywords')}}"/>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->                        
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_meta_img')}}</div>
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
                                    <input type="hidden" name="types[]" value="meta_img">
                                    <input type="hidden" name="meta_img" value="{{get_setting('meta_img',null,$langCode)}}" class="selected-files">
                                </div>
                                <div class="file-preview box sm"></div> 
                            </div>
                        </div>
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.sh_discard')}}</button>
                        <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.site_meta')}}"
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