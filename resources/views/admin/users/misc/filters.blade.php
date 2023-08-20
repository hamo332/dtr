<!-- Begin:: action toolbar -->
<div class="d-flex flex-wrap flex-stack pb-7" data-select2-id="select2-data-130-69es">
    <!--begin::Title-->
    <div class="d-flex flex-wrap align-items-center my-1">
        <!--begin::Search-->
        <div class="d-flex align-items-center position-relative my-1" data-kt-docs-table-toolbar="base">
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-3 position-absolute ms-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                </svg>
            </span>
            <!--end::Svg Icon-->
            <form id="table-search">
                <input type="text" class="form-control form-control-sm border-body bg-body w-150px ps-10 search-records list-actions-search" id="kt_filter_search" data-url="{{route('admin.users.render')}}" data-type="form" data-ajax-type="post" data-form-id="table-search" name="key" placeholder="{{__('admin.fltr_search')}}">
            </form>
        </div>
        <!--end::Search-->
        <!-- begin:: delete selected -->
        <div class="d-flex align-items-center position-relative my-1 ms-5 d-none" data-kt-docs-table-toolbar="selected">
            <div class="fw-bold me-5">
                <span class="me-2" data-kt-docs-table-select="selected_count"></span> {{__('admin.fltr_selected')}}
            </div>
            <button class="btn btn-danger btn-sm" data-kt-docs-table-select="delete_selected">
                <span class="svg-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
                    </svg>
                </span>
                {{__('admin.sh_delete_selected')}}
            </button>
        </div>
        <!-- end:: delete  selected -->
    </div>
    <!--end::Title-->
    <!--begin::Controls-->
    <div class="d-flex flex-wrap my-1" data-select2-id="select2-data-129-p9z8">
        <!--begin::Tab nav-->
        <ul class="nav nav-pills me-6 mb-2 mb-sm-0" role="tablist">
            <li class="nav-item m-0" role="presentation">
                <a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary  me-3 active" data-bs-toggle="tab" href="#kt_show_table_pane" aria-selected="false" role="tab" tabindex="-1">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor"></path>
                            <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
            </li>
            <li class="nav-item m-0" role="presentation">
                <a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary disabled" data-bs-toggle="tab" href="#kt_show_card_pane" aria-selected="true" role="tab">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
            </li>
        </ul>
        <!--end::Tab nav-->
        <!--begin::Actions-->
        <div class="d-flex my-0" data-select2-id="select2-data-128-b9hp">
            <!--begin::Filter menu-->
            <div class="m-0 me-6">
                <!--begin::Menu toggle-->
                <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->{{__('admin.fltr_filter')}}</a>
                <!--end::Menu toggle-->
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="filter_menu" style="">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bold">{{__('admin.fltr_filter_options')}}</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-semibold">{{__('admin.fltr_search')}}:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <input type="text" class="form-control form-control-solid" name="key" placeholder="{{__('admin.fltr_search')}}">
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-semibold">{{__('admin.fltr_status')}}:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <select class="form-select form-select-solid select2-hidden-accessible" name="status" data-placeholder="Select option" data-hide-search="true" data-control="select2" >
                                    <option></option>
                                    <option value="active">{{__('admin.sh_active')}}</option>
                                    <option value="inactive">{{__('admin.sh_inactive')}}</option>
                                </select>
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2 js-ajax-ux-request" data-url="{{route('admin.users.render')}}" data-ajax-type="post" data-kt-menu-dismiss="true">{{__('admin.fltr_reset')}}</button>
                            <button type="submit" class="btn btn-sm btn-primary js-ajax-ux-request" data-kt-menu-dismiss="true" data-url="{{route('admin.users.render')}}" data-type="form" data-ajax-type="post" data-form-id="filter_menu">{{__('admin.fltr_apply')}}</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
            </div>
            <!--end::Filter menu-->
            <!--begin::Select-->
            <select class="form-select form-select-sm border-body bg-body w-100px select2-hidden-accessible" name="status" data-hide-search="true" data-placeholder="{{__('admin.fltr_export')}}" data-control="select2" >
                <option selected>{{__('admin.fltr_export')}}</option>
                <option value="1">{{__('admin.fltr_excel')}}</option>
                <option value="1">{{__('admin.fltr_pdf')}}</option>
                <option value="2">{{__('admin.fltr_print')}}</option>
            </select>
            <!--end::Select-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Controls-->
</div>
<!-- End:: action toolbar -->
