@csrf
<!--begin::set locale -->
<input type="hidden" name="locale" value="ar">
<!-- end::set locale -->
<!--begin::Card body-->
<div class="card-body">

    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.rs_role_name')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="name" placeholder="{{__('admin.rs_role_name')}}"/>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.rs_role_description')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="description" placeholder="{{__('admin.rs_role_description')}}"/>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Permissions-->
    <div class="fv-row">
        <!--begin::Label-->
        <label class="fs-5 fw-bold form-label mb-2">{{__('admin.rs_permissions')}}</label>
        <!--end::Label-->
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-semibold">
                    <!--begin::Table row-->
                    <tr>
                        <td class="text-gray-800">{{__('admin.rs_access_dashboard')}}
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Allows a full access to the system" data-bs-original-title="Allows a full access to the system" data-kt-initialized="1"></i></td>
                        <td>
                            <!--begin::Checkbox-->
                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                <input class="form-check-input" type="checkbox" id="access_dashboard" name="permissions[]" value="access_dashboard">
                                <span class="form-check-label" for="access_dashboard">{{__('admin.rs_allow')}}</span>
                            </label>
                            <!--end::Checkbox-->
                        </td>
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_settings')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_settings" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_general_settings')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_general_settings" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_mail_settings')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_mail_settings" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_appearance')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_appearance" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_header_settings')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_header_settings" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_footer_settings')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_footer_settings" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_pages_settings')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_pages_settings" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_appearance_settings')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_appearance_settings" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_file_manager')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_file_manager" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="write_file_manager" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="create_file_manager" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_roles')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_roles" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="write_roles" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="create_roles" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_server_status')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_server_status" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_users')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_users" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="write_users" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="create_users" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_failed_login')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_failed_login" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="permissions[]" disabled>
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class="text-gray-800">{{__('admin.rs_access_blog_list')}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="access_blog_list" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_read')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="write_blogs" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_write')}}</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="create_blogs" name="permissions[]">
                                    <span class="form-check-label">{{__('admin.rs_create')}}</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Permissions-->
</div>
<!--end::Card body-->

        
    