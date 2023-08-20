<div class="card mb-5 mb-xl-10">
    <!-- Begin::nav items -->
    <div class="card-body pb-0">
        <!--begin::Navs-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            @foreach (languageList() as $langCode => $langName)
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{$langCode == 'ar' ? 'active' : ''}}" data-bs-toggle="tab" href="#kt_links_settings_form_{{$langCode}}">
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
            <div class="tab-pane fade show {{$langCode == 'ar' ? 'active' : ''}}" id="kt_links_settings_form_{{$langCode}}" role="tabpanel">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">{{__('admin.fs_links')}} - ({{$langName}})</div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form id="kt_links_settings_form_{{$langCode}}" class="form form-validation">
                    @csrf
                    <!--begin::set locale -->
                    <input type="hidden" name="locale" value="{{$langCode}}">
                    <!-- end::set locale -->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Repeater-->
                        <div id="additional_links" class="row mb-8 additional_links">
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div data-repeater-list="additional_links">
                                    @if(get_setting('additional_links',null,$langCode) != null)
                                        @foreach (json_decode(get_setting('additional_links',null,$langCode), true) as $key => $value)
                                            <div data-repeater-item>
                                                <div class="form-group row m-b-2">
                                                    <div class="col-md-3">
                                                        <label class="form-label">{{__('admin.fs_additional_links_name')}}:</label>
                                                        <input type="text" class="form-control form-control-solid mb-2 mb-md-0" name="name" value="{{$value['name']}}" placeholder="{{__('admin.fs_additional_links_name')}}"/>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label class="form-label">{{__('admin.fs_additional_links_link')}}:</label>
                                                        <input type="text" class="form-control form-control-solid mb-2 mb-md-0" name="link" value="{{$value['link']}}" placeholder="{{__('admin.fs_additional_links_link')}}" />
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
                                                <div class="col-md-3">
                                                    <label class="form-label">{{__('admin.fs_additional_links_name')}}:</label>
                                                    <input type="text" class="form-control form-control-solid mb-2 mb-md-0" name="name" placeholder="{{__('admin.fs_additional_links_name')}}"/>
                                                </div>
                                                <div class="col-md-7">
                                                    <label class="form-label">{{__('admin.fs_additional_links_link')}}:</label>
                                                    <input type="text" class="form-control form-control-solid mb-2 mb-md-0" name="link" placeholder="{{__('admin.fs_additional_links_link')}}" />
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
                        <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.additional_links_settings')}}"
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