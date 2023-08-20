<!--modal-->
<div class="modal fade" role="dialog" aria-labelledby="foo" id="commonModal"  data-bs-backdrop="static" data-bs-keyboard="false">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-900px" id="commonModalContainer">
        <form action="" method="post" id="commonModalForm" class="form form-validation form-horizontal">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="commonModalHeader">
                    <!--begin::Modal title-->
                    <h4 class="modal-title" id="commonModalTitle"></h4>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--optional button for when header is hidden-->
                <span class="close x-extra-close-icon" data-dismiss="modal" aria-hidden="true"
                    id="commonModalExtraCloseIcon">
                    <i class="ti-close"></i>
                </span>

                <!--begin::Modal body-->
                <div class="modal-body py-lg-10 px-lg-10 min-h-200" id="commonModalBody">
                    <!--dynamic content here-->
                </div>
                <!--end::Modal body-->

                <div class="modal-footer" id="commonModalFooter">
                    <button type="button" id="commonModalCloseButton" class="btn btn-rounded-x btn-secondary waves-effect text-left" data-bs-dismiss="modal">{{ __('admin.us_cancel') }}</button>
                    <button type="submit" class="btn btn-primary" id="kt_submit" data-url="" data-loading-target="" 
                        data-ajax-type="POST" data-on-start-submit-button="disable">
                        {{__('admin.sh_save')}}
                    </button>
                </div>
            </div>
            <!--end::Modal content-->
        </form>
    </div>
    <!--end::Modal dialog-->
</div>
<!--notes: see events.js for deails-->
