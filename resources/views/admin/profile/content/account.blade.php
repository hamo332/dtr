<!--begin::Card-->
<div class="card card-flush mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header mt-6">
        <!--begin::Card title-->
        <div class="card-title flex-column">
            <h2 class="mb-1">{{__('admin.us_user_data')}}</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9 pt-4">
        <!--begin::Form-->
        <form id="kt_update_users_account_form" class="form form-validation">
            @csrf
            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Row-->
                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_name')}}</div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid" name="name" value="{{$user->name}}" placeholder="{{__('admin.us_user_name')}}"/>
                    </div>
                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_mail')}}</div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-9 fv-row">
                        <input type="email" class="form-control form-control-solid" name="email" value="{{$user->email}}" placeholder="{{__('admin.us_user_mail')}}"/>
                    </div>
                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_phone')}}</div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid" name="phone" value="{{$user->phone}}" placeholder="{{__('admin.us_user_phone')}}"/>
                    </div>
                </div>
                <!--end::Row-->

                <!--begin::seperator-->
                <div class="separator border-5 border-light theme-light-show my-10"></div>
                <!--end::seperator-->

                <!--begin::Row-->                        
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_image')}}</div>
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
                            <input type="hidden" name="types[]" value="user_img">
                            <input type="hidden" name="user_img" value="{{$user->user_img}}" class="selected-files">
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
                <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.profile.update')}}"
                    data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">
                    {{__('admin.sh_save')}}
                </button>
            </div>
            <!--end::Card footer-->
        </form>
        <!--end:Form-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->