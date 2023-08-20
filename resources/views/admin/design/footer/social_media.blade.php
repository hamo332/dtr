<!-- Begin:: tabs -->
<div class="card mb-5">
    <div class="tab-content" id="myTabContent">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title fs-3 fw-bold">{{__('admin.fs_socialmedia')}})</div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Form-->
        <form id="kt_socialmedia_settings_form" class="form form-validation">
            @csrf
            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Repeater-->
                <div id="socialmedia" class="row mb-8">
                    <!--begin::Form group-->
                    <div class="form-group">
                        <div data-repeater-list="socialmedia">
                            @if(get_setting('socialmedia') != null)
                                @foreach (json_decode(get_setting('socialmedia'), true) as $key => $value)
                                    <div data-repeater-item>
                                        <div class="form-group row m-b-2">
                                            <div class="col-md-3">
                                                <label class="form-label">{{__('admin.fs_socialmedia_name')}}:</label>
                                                <select class="form-select form-select-solid" name="name">
                                                    @foreach(socialMediaIcons() as $keySocial => $socialValue)
                                                        <option value="{{$keySocial}}" @if($keySocial == $value['name']) selected @endif>{{$keySocial}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-7">
                                                <label class="form-label">{{__('admin.fs_socialmedia_link')}}:</label>
                                                <input type="text" class="form-control form-control-solid mb-2 mb-md-0" name="link" value="{{$value['link']}}" placeholder="{{__('admin.fs_socialmedia_link')}}" />
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
                                            <label class="form-label">{{__('admin.fs_socialmedia_name')}}:</label>
                                            <select class="form-select form-select-solid" name="name">
                                                @foreach(socialMediaIcons() as $keySocial => $socialValue)
                                                    <option value="{{$keySocial}}">{{$keySocial}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-7">
                                            <label class="form-label">{{__('admin.fs_socialmedia_link')}}:</label>
                                            <input type="text" class="form-control form-control-solid mb-2 mb-md-0" name="link" placeholder="{{__('admin.fs_socialmedia_link')}}" />
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
                <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.socialmedia_settings')}}"
                    data-loading-target="kt_app_content_container" data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">
                    {{__('admin.sh_save')}}
                </button>
            </div>
            <!--end::Card footer-->
        </form>
        <!--end:Form-->
    </div>
</div>
<!-- End:: tabs -->