<!--begin::Drawers-->
<!--begin::Activities drawer-->
<div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
    <div class="card shadow-none border-0 rounded-0">
        <!--begin::Header-->
        <div class="card-header" id="kt_activities_header">
            <h3 class="card-title fw-bold text-dark">{{__('admin.us_activity')}}</h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_activities_close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body position-relative" id="kt_activities_body">
            <!--begin::Content-->
            <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" id="kt_activities_body_scroll" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body" data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer" data-kt-scroll-offset="5px">
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer py-5 text-center" id="kt_activities_footer">
            <a href="{{route('admin.logs')}}" class="btn btn-bg-body text-primary">View All Activities
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
            <span class="svg-icon svg-icon-3 svg-icon-primary">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon--></a>
        </div>
        <!--end::Footer-->
    </div>
</div>
<!--end::Activities drawer-->
<!--begin::Chat drawer-->
<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
    <!--begin::Messenger-->
    <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
        <!--begin::Card header-->
        <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
            <!--begin::Title-->
            <div class="card-title">
                <!--begin::User-->
                <div class="d-flex justify-content-center flex-column me-3">
                    <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{__('admin.sh_chats')}}</a>
                    <!--begin::Info-->
                    <div class="mb-0 lh-1">
                        <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                        <span class="fs-7 fw-semibold text-muted">{{__('admin.sh_active')}}</span>
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::User-->
            </div>
            <!--end::Title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Menu-->
                <div class="me-2">
                    <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="bi bi-three-dots fs-3"></i>
                    </button>
                    <!--begin::Menu 3-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                        <!--begin::Heading-->
                        <div class="menu-item px-3">
                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">{{__('admin.sh_contacts')}}</div>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">{{__('admin.sh_add_contact')}}</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-1">
                            <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">{{__('admin.settings')}}</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu 3-->
                </div>
                <!--end::Menu-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body" id="kt_drawer_chat_messenger_body">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column px-9">
                <!--begin::Section-->
                <div class="pt-10 pb-5">
                    <!--begin::Title-->
                    <h3 class="text-dark text-center fw-bold">{{__('admin.sh_no_chats')}}</h3>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="text-center text-gray-600 fw-semibold pt-1">{{__('admin.sh_no_chats_hint')}}</div>
                    <!--end::Text-->
                </div>
                <!--end::Section-->
                <!--begin::Illustration-->
                <div class="text-center px-4">
                    <img class="mw-100 mh-700px" alt="image" src="assets/admin/media/illustrations/sketchy-1/6.png" />
                </div>
                <!--end::Illustration-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Messenger-->
</div>
<!--end::Chat drawer-->
<!--end::Drawers-->
<!--begin::Engage drawers-->
<!--begin::language drawer-->
<div id="kt_engage_language" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_engage_language_toggle" data-kt-drawer-close="#kt_engage_language_close">
    <!--begin::Card-->
    <div class="card shadow-none rounded-0 w-100">
        <!--begin::Header-->
        <div class="card-header" id="kt_engage_language_header">
            <h3 class="card-title fw-bold text-gray-700">{{__('admin.language')}}</h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary h-40px w-40px me-n6" id="kt_engage_language_close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body" id="kt_engage_language_body">
            <!--begin::Content-->
            <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_engage_language_body" data-kt-scroll-dependencies="#kt_engage_language_header" data-kt-scroll-offset="5px">
                <!--begin::Wrapper-->
                <div class="mb-0">
                    <!--begin::Heading-->
                    <div class="mb-7">
                        <div class="d-flex flex-stack">
                            <h3 class="mb-0">{{__('admin.change_language')}}</h3>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::language-->
                    <div class="mb-0">
                        <!--begin::Row-->
                        <div class="row g-5">
                            <!--begin::Col-->
                            <span id="changeLang">
                                <input type="hidden" name="current_url" value="./">
                            </span>
                            <div class="col-4">
                                <!--begin::language-->
                                <div class="overlay overflow-hidden position-relative border border-4 {{$locale == 'ar' ? 'border-success' : 'border-gray-200'}} rounded">
                                    <div class="overlay-wrapper">
                                        <img src="{{asset('assets/admin/media/flags/egypt.svg')}}" alt="العربية" class="w-100" />
                                    </div>
                                    <div class="overlay-layer bg-dark bg-opacity-10">
                                        <!-- <a href="{{route('change_language','ar')}}" class="btn btn-sm btn-success shadow">العربية</a> -->
                                        <a class="btn btn-sm btn-success shadow js-ajax-request " href="javascript:void(0)" data-url="{{route('change_language','ar')}}" data-type="form" data-ajax-type="get" data-form-id="changeLang">
                                             العربية
                                        </a>
                                    </div>
                                </div>
                                <!--end::language-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-4">
                                <!--begin::language-->
                                <div class="overlay overflow-hidden position-relative border border-4 {{$locale == 'en' ? 'border-success' : 'border-gray-200'}} rounded">
                                    <div class="overlay-wrapper">
                                        <img src="{{asset('assets/admin/media/flags/united-states.svg')}}" alt="English" class="w-100" />
                                    </div>
                                    <div class="overlay-layer bg-dark bg-opacity-10">
                                        <!-- <a href="{{route('change_language','en')}}" class="btn btn-sm btn-success shadow">English</a> -->
                                        <a class="btn btn-sm btn-success shadow js-ajax-request " href="javascript:void(0)" data-url="{{route('change_language','en')}}" data-type="form" data-ajax-type="get" data-form-id="changeLang">
                                            English
                                        </a>
                                    </div>
                                </div>
                                <!--end::language-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-4">
                                <!--begin::language-->
                                <div class="overlay overflow-hidden position-relative border border-4 {{$locale == 'fr' ? 'border-success' : 'border-gray-200'}} rounded">
                                    <div class="overlay-wrapper">
                                        <img src="{{asset('assets/admin/media/flags/france.svg')}}" alt="French" class="w-100" />
                                    </div>
                                    <div class="overlay-layer bg-dark bg-opacity-10">
                                        <!-- <a href="{{route('change_language','fr')}}" class="btn btn-sm btn-success shadow">French</a> -->
                                        <a class="btn btn-sm btn-success shadow js-ajax-request " href="javascript:void(0)" data-url="{{route('change_language','fr')}}" data-type="form" data-ajax-type="get" data-form-id="changeLang">
                                            French
                                        </a>
                                    </div>
                                </div>
                                <!--end::language-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::language-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
<!--end::language drawer-->
<!--end::Engage drawers-->
<!--begin::Engage toolbar-->
<div class="engage-toolbar d-flex position-fixed px-5 fw-bold zindex-2 top-50 end-0 transform-90 mt-5 mt-lg-20 gap-2">
    <!--begin::language drawer toggle-->
    <button id="kt_engage_language_toggle" class="engage-language-toggle engage-btn btn shadow-sm fs-6 px-4 rounded-top-0" title="{{__('admin.click_to_change_lang')}}" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-dismiss="click" data-bs-trigger="hover">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr030.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.4 18H16C15.7 18 15.5 17.9 15.3 17.7L12.5 14.9C12.1 14.5 12.1 13.9 12.5 13.5C12.9 13.1 13.5 13.1 13.9 13.5L16.4 16H18.4V18ZM16 6C15.7 6 15.5 6.09999 15.3 6.29999L11 10.6L6.70001 6.29999C6.50001 6.09999 6.3 6 6 6H3C2.4 6 2 6.4 2 7C2 7.6 2.4 8 3 8H5.60001L9.60001 12L5.60001 16H3C2.4 16 2 16.4 2 17C2 17.6 2.4 18 3 18H6C6.3 18 6.50001 17.9 6.70001 17.7L16.4 8H18.4V6H16Z" fill="currentColor"/>
                <path opacity="0.3" d="M21.7 6.29999C22.1 6.69999 22.1 7.30001 21.7 7.70001L18.4 11V3L21.7 6.29999ZM18.4 13V21L21.7 17.7C22.1 17.3 22.1 16.7 21.7 16.3L18.4 13Z" fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
        <span id="kt_engage_language_label">{{__('admin.language')}}</span>
    </button>
    <!--end::language drawer toggle-->
</div>
<!--end::Engage toolbar-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
		