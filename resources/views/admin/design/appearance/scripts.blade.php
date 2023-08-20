<!-- Begin:: tabs -->
<div class="card mb-5">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title fs-3 fw-bold">{{__('admin.as_additional_script_title')}}</div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Form-->
    <form id="kt_scripts_settings_form" class="form form-validation">
        @csrf
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.as_additional_script_header')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <textarea name="head_script" placeholder="{{__('admin.as_additional_script_header')}}" class="form-control form-control-solid" data-kt-autosize="true">{{get_setting('head_script')}}</textarea>
                </div>
                <!--begin::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.as_additional_script_body')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <textarea name="footer_script" placeholder="{{__('admin.as_additional_script_body')}}" class="form-control form-control-solid" data-kt-autosize="true">{{get_setting('footer_script')}}</textarea>
                </div>
                <!--begin::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.sh_discard')}}</button>
            <button type="submit" class="btn btn-primary" id="kt_submit" data-url="{{route('admin.additional_script')}}"
                data-loading-target="kt_app_content_container" data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable">
                {{__('admin.sh_save')}}
            </button>
        </div>
        <!--end::Card footer-->
    </form>
    <!--end:Form-->  
</div>
<!-- End:: tabs -->