
<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title fs-3 fw-bold">{{__('admin.hs_slider_title')}}</div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Form-->
    <form id="kt_slider_settings_form" class="form form-validation">
        @csrf
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Repeater-->
            <div id="slider" class="row mb-8">
                <!--begin::Form group-->
                <div class="form-group">
                    <div data-repeater-list="slider">
                        @if(get_setting('slider') !== null)
                            @foreach (json_decode( get_setting('slider'), true) as $key => $value)
                                <div data-repeater-item>
                                    <div class="form-group row m-b-2">
                                        <div class="col-md-4">
                                            <label class="form-label">{{__('admin.hs_slider_img')}}:</label>
                                            <div class="input-group" data-toggle="awduploader" data-type="image">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-soft-secondary">
                                                        {{ __('admin.browse') }}
                                                    </div>
                                                </div> 
                                                <div class="form-control file-amount">{{ __('admin.choose_file') }}</div>
                                                <input type="hidden" name="img" value="{{$value['img']}}" class="selected-files">
                                            </div>
                                            <div class="file-preview box sm"></div> 
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">{{__('admin.sh_title')}}:</label>
                                            <input type="text" class="form-control mb-2 mb-md-0" name="title" value="{{$value['title']}}" placeholder="{{__('admin.sh_title')}}" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">{{__('admin.sh_content')}}:</label>
                                            <input type="text" class="form-control mb-2 mb-md-0" name="content" value="{{$value['content']}}" placeholder="{{__('admin.sh_content')}}" />
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
                                        <label class="form-label">{{__('admin.hs_slider_img')}}:</label>
                                        <div class="input-group" data-toggle="awduploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary">
                                                    {{ __('admin.browse') }}
                                                </div>
                                            </div> 
                                            <div class="form-control file-amount">{{ __('admin.choose_file') }}</div>
                                            <input type="hidden" name="img" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm"></div> 
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">{{__('admin.sh_title')}}:</label>
                                        <input type="text" class="form-control mb-2 mb-md-0" name="title" placeholder="{{__('admin.sh_title')}}" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">{{__('admin.sh_content')}}:</label>
                                        <input type="text" class="form-control mb-2 mb-md-0" name="content" placeholder="{{__('admin.sh_content')}}" />
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
            <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.slider_store')}}"
                data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">
                {{__('admin.sh_save')}}
            </button>
        </div>
        <!--end::Card footer-->
    </form>
    <!--end:Form-->
</div>
<!--end::Card-->
        