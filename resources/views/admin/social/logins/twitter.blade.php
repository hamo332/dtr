<!-- Begin:: tabs -->
<div class="card mb-5">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title fs-3 fw-bold">{{__('admin.sm_twitter_settings')}}</div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Form-->
    <form id="kt_twitter_login_settings_form" class="form form-validation">
        @csrf
        @php 
            $data = json_decode(get_setting('twitter'));
        @endphp
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.twitter')}} {{__('admin.sm_client_id')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <textarea name="twitter[client_id]" placeholder="{{__('admin.twitter')}} {{__('admin.sm_client_id')}}" class="form-control form-control-solid" data-kt-autosize="true">{{$data->client_id ?? ''}}</textarea>
                </div>
                <!--begin::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.twitter')}} {{__('admin.sm_client_secret')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <textarea name="twitter[client_secret]" placeholder="{{__('admin.twitter')}} {{__('admin.sm_client_secret')}}" class="form-control form-control-solid" data-kt-autosize="true">{{$data->client_secret ?? ''}}</textarea>
                </div>
                <!--begin::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.sh_discard')}}</button>
            <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.social.logins.store')}}"
                data-loading-target="kt_app_content_container" data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">
                {{__('admin.sh_save')}}
            </button>
        </div>
        <!--end::Card footer-->
    </form>
    <!--end:Form-->  
</div>
<!-- End:: tabs -->