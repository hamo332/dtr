<!--begin::Timeline-->
<div class="timeline">
    @foreach ($logs as $log)
        <!--begin::Timeline item-->
        <div class="timeline-item">
            <!--begin::Timeline line-->
            <div class="timeline-line w-40px"></div>
            @if($log->description == 'logs.login_failed')
                <!--begin::Timeline icon-->
                <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                    <div class="symbol-label bg-light">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr015.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M12 10.6L14.8 7.8C15.2 7.4 15.8 7.4 16.2 7.8C16.6 8.2 16.6 8.80002 16.2 9.20002L13.4 12L12 10.6ZM10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 8.99999 16.4 9.19999 16.2L12 13.4L10.6 12Z" fill="currentColor"/>
                                <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM13.4 12L16.2 9.20001C16.6 8.80001 16.6 8.19999 16.2 7.79999C15.8 7.39999 15.2 7.39999 14.8 7.79999L12 10.6L9.2 7.79999C8.8 7.39999 8.2 7.39999 7.8 7.79999C7.4 8.19999 7.4 8.80001 7.8 9.20001L10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 9 16.4 9.2 16.2L12 13.4L14.8 16.2C15 16.4 15.3 16.5 15.5 16.5C15.7 16.5 16 16.4 16.2 16.2C16.6 15.8 16.6 15.2 16.2 14.8L13.4 12Z" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Timeline icon-->
                <!--begin::Timeline content-->
                <div class="timeline-content mb-10 mt-n1">
                    <!--begin::Timeline heading-->
                    <div class="pe-3 mb-5">
                        <!--begin::Title-->
                        <div class="fs-5 fw-semibold mb-2">{{__($log->description)}}:</div>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="d-flex align-items-center mt-1 fs-6">
                            <!--begin::Info-->
                            <div class="text-muted me-2 fs-7">{{getDateTime($log->created_at)}}</div>
                            <!--end::Info-->
                            <!--begin::User-->
                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{__('admin.sh_user')}}">
                                <img src="{{asset('assets/admin/media/avatars/blank.png')}}" alt="img" />
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Timeline heading-->
                    <!--begin::Timeline details-->
                    @php 
                        $properties = json_decode($log->properties);
                    @endphp
                    <div class="overflow-auto pb-5">
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                @if($properties->browser == 'Firefox')
                                    <img src="{{asset('assets/admin/media/browser-logos/mozila-firefox.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Chrome')
                                    <img src="{{asset('assets/admin/media/browser-logos/google-chrome.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Safari')
                                    <img src="{{asset('assets/admin/media/browser-logos/apple-safari.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Opera')
                                    <img src="{{asset('assets/admin/media/browser-logos/opera.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Edge')
                                    <img src="{{asset('assets/admin/media/browser-logos/internet-explorer.png')}}" alt="avatar"/>
                                @endif
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">
                                        @if($properties->device_name == false)
                                            {{__('admin.us_activity_computer')}}
                                        @else 
                                            {{$properties->device_name}}
                                        @endif
                                        ({{$properties->operating_system}})
                                    </h4>
                                    <div class="fs-6 text-gray-700 pe-7">
                                        <p>{{__('admin.ms_email')}} : {{$properties->aditional->mail}}</p>
                                        <p>{{__('admin.ms_password')}} : {{$properties->aditional->password}}</p>
                                    </div>
                                </div>
                                <!--end::Content-->
                                <!--begin::Action-->
                                <a href="#" class="btn btn-danger px-6 align-self-center text-nowrap">{{__('logs.block')}}</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Timeline details-->
                </div>
                <!--end::Timeline content-->
            @elseif($log->description == 'logs.updated_user')
                <!--begin::Timeline icon-->
                <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                    <div class="symbol-label bg-light">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen055.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Timeline icon-->
                <!--begin::Timeline content-->
                <div class="timeline-content mb-10 mt-n1">
                    <!--begin::Timeline heading-->
                    <div class="pe-3 mb-5">
                        <!--begin::Title-->
                        <div class="fs-5 fw-semibold mb-2">{{__($log->description)}}:</div>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="d-flex align-items-center mt-1 fs-6">
                            <!--begin::Info-->
                            <div class="text-muted me-2 fs-7">{{getDateTime($log->created_at)}}</div>
                            <!--end::Info-->
                            <!--begin::User-->
                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{$log->causer->name}}">
                                <img src="{{asset($log->causer->image->file_name ?? 'assets/admin/media/avatars/blank.png')}}" alt="img" />
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Timeline heading-->
                    <!--begin::Timeline details-->
                    @php 
                        $properties = json_decode($log->properties);
                    @endphp
                    <div class="overflow-auto pb-5">
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                @if($properties->browser == 'Firefox')
                                    <img src="{{asset('assets/admin/media/browser-logos/mozila-firefox.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Chrome')
                                    <img src="{{asset('assets/admin/media/browser-logos/google-chrome.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Safari')
                                    <img src="{{asset('assets/admin/media/browser-logos/apple-safari.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Opera')
                                    <img src="{{asset('assets/admin/media/browser-logos/opera.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Edge')
                                    <img src="{{asset('assets/admin/media/browser-logos/internet-explorer.png')}}" alt="avatar"/>
                                @endif
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->

                            <h4 class="text-gray-900 fw-bold w-400px min-w-310px">
                                @if($properties->device_name == false)
                                    {{__('admin.us_activity_computer')}}
                                @else 
                                    {{$properties->device_name}}
                                @endif
                                ({{$properties->operating_system}})
                            </h4>

                            <!--begin::User-->
                            <div class="symbol symbol-circle symbol-25px me-1" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{$log->causer->name}}">
                                <img src="{{asset($log->causer->image->file_name ?? 'assets/admin/media/avatars/blank.png')}}" alt="img" />
                            </div>
                            <!--end::User-->
                            <!--begin::Title-->
                            <a href="{{route('admin.edit_user', $log->causer->id)}}" class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">{{$log->causer->name}}</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px pe-2">
                                <span class="badge badge-light text-muted">{{$log->causer->email}}</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Action-->
                            <a href="{{route('admin.edit_user', $log->causer->id)}}" class="btn btn-sm btn-light btn-active-light-primary">{{__('admin.users_edit')}}</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                            <!--begin::Title-->
                            <a href="#" class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">{{$properties->aditional->user->name}}</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px pe-2">
                                <span class="badge badge-light text-muted">{{$properties->aditional->user->email}}</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Action-->
                            <a href="{{route('admin.edit_user', $properties->aditional->user->id)}}" class="btn btn-light btn-sm btn-active-light-primary">{{__('admin.users_edit')}}</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                    </div>
                    <!--end::Timeline details-->
                </div>
                <!--end::Timeline content-->
                @elseif($log->description == 'logs.added_user')
                <!--begin::Timeline icon-->
                <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                    <div class="symbol-label bg-light">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
                                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Timeline icon-->
                <!--begin::Timeline content-->
                <div class="timeline-content mb-10 mt-n1">
                    <!--begin::Timeline heading-->
                    <div class="pe-3 mb-5">
                        <!--begin::Title-->
                        <div class="fs-5 fw-semibold mb-2">{{__($log->description)}}:</div>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="d-flex align-items-center mt-1 fs-6">
                            <!--begin::Info-->
                            <div class="text-muted me-2 fs-7">{{getDateTime($log->created_at)}}</div>
                            <!--end::Info-->
                            <!--begin::User-->
                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{$log->causer->name}}">
                                <img src="{{asset($log->causer->image->file_name ?? 'assets/admin/media/avatars/blank.png')}}" alt="img" />
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Timeline heading-->
                    <!--begin::Timeline details-->
                    @php 
                        $properties = json_decode($log->properties);
                    @endphp
                    <div class="overflow-auto pb-5">
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                @if($properties->browser == 'Firefox')
                                    <img src="{{asset('assets/admin/media/browser-logos/mozila-firefox.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Chrome')
                                    <img src="{{asset('assets/admin/media/browser-logos/google-chrome.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Safari')
                                    <img src="{{asset('assets/admin/media/browser-logos/apple-safari.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Opera')
                                    <img src="{{asset('assets/admin/media/browser-logos/opera.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Edge')
                                    <img src="{{asset('assets/admin/media/browser-logos/internet-explorer.png')}}" alt="avatar"/>
                                @endif
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->

                            <h4 class="text-gray-900 fw-bold w-400px min-w-310px">
                                @if($properties->device_name == false)
                                    {{__('admin.us_activity_computer')}}
                                @else 
                                    {{$properties->device_name}}
                                @endif
                                ({{$properties->operating_system}})
                            </h4>

                            <!--begin::User-->
                            <div class="symbol symbol-circle symbol-25px me-1" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{$log->causer->name}}">
                                <img src="{{asset($log->causer->image->file_name ?? 'assets/admin/media/avatars/blank.png')}}" alt="img" />
                            </div>
                            <!--end::User-->
                            <!--begin::Title-->
                            <a href="{{route('admin.edit_user', $log->causer->id)}}" class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">{{$log->causer->name}}</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px pe-2">
                                <span class="badge badge-light text-muted">{{$log->causer->email}}</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Action-->
                            <a href="{{route('admin.edit_user', $log->causer->id)}}" class="btn btn-sm btn-light btn-active-light-primary">{{__('admin.users_edit')}}</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                            <!--begin::Title-->
                            <a href="#" class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">{{$properties->aditional->user->name}}</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px pe-2">
                                <span class="badge badge-light text-muted">{{$properties->aditional->user->email}}</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Action-->
                            <a href="{{route('admin.edit_user', $properties->aditional->user->id)}}" class="btn btn-light btn-sm btn-active-light-primary">{{__('admin.users_edit')}}</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                    </div>
                    <!--end::Timeline details-->
                </div>
                <!--end::Timeline content-->
            @elseif($log->description == 'logs.logged_in')
                <!--begin::Timeline icon-->
                <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                    <div class="symbol-label bg-light">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr042.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M21 22H12C11.4 22 11 21.6 11 21V3C11 2.4 11.4 2 12 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22ZM15.4 17L19.7 12.7C20.1 12.3 20.1 11.7 19.7 11.3L15.4 7V17Z" fill="currentColor"/>
                                <path d="M15.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H15.4V11Z" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Timeline icon-->
                <!--begin::Timeline content-->
                @php 
                    $properties = json_decode($log->properties);
                @endphp
                <div class="timeline-content mb-10 mt-n1">
                    <!--begin::Timeline heading-->
                    <div class="pe-3 mb-5">
                        <!--begin::Title-->
                        <div class="fs-5 fw-semibold mb-2">{{__($log->description)}}:</div>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="d-flex align-items-center mt-1 fs-6">
                            <!--begin::Info-->
                            <div class="text-muted me-2 fs-7">{{getDateTime($log->created_at)}}</div>
                            <!--end::Info-->
                            <!--begin::User-->
                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{$log->causer->name}}">
                                <img src="{{asset($log->causer->image->file_name ?? 'assets/admin/media/avatars/blank.png')}}" alt="img" />
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Timeline heading-->
                    <!--begin::Timeline details-->
                    <div class="overflow-auto pb-5">
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                @if($properties->browser == 'Firefox')
                                    <img src="{{asset('assets/admin/media/browser-logos/mozila-firefox.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Chrome')
                                    <img src="{{asset('assets/admin/media/browser-logos/google-chrome.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Safari')
                                    <img src="{{asset('assets/admin/media/browser-logos/apple-safari.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Opera')
                                    <img src="{{asset('assets/admin/media/browser-logos/opera.png')}}" alt="avatar"/>
                                @elseif($properties->browser == 'Edge')
                                    <img src="{{asset('assets/admin/media/browser-logos/internet-explorer.png')}}" alt="avatar"/>
                                @endif
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->

                            <h4 class="text-gray-900 fw-bold w-400px min-w-310px">
                                @if($properties->device_name == false)
                                    {{__('admin.us_activity_computer')}}
                                @else 
                                    {{$properties->device_name}}
                                @endif
                                ({{$properties->operating_system}})
                            </h4>

                            <!--begin::User-->
                            <div class="symbol symbol-circle symbol-25px me-1" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{$log->causer->name}}">
                                <img src="{{asset($log->causer->image->file_name ?? 'assets/admin/media/avatars/blank.png')}}" alt="img" />
                            </div>
                            <!--end::User-->
                            <!--begin::Title-->
                            <a href="{{route('admin.edit_user', $log->causer->id)}}" class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">{{$log->causer->name}}</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px pe-2">
                                <span class="badge badge-light text-muted">{{$log->causer->email}}</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Action-->
                            <a href="{{route('admin.edit_user', $log->causer->id)}}" class="btn btn-sm btn-light btn-active-light-primary">{{__('admin.users_edit')}}</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                    </div>
                    <!--end::Timeline details-->
                </div>
                <!--end::Timeline content-->
            @elseif($log->description == 'logs.logged_out')
                <!--begin::Timeline item-->
                <div class="timeline-item">
                    <!--begin::Timeline line-->
                    <div class="timeline-line w-40px"></div>
                    <!--end::Timeline line-->
                    <!--begin::Timeline icon-->
                    <div class="timeline-icon symbol symbol-circle symbol-40px">
                        <div class="symbol-label bg-light">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr043.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M21 22H12C11.4 22 11 21.6 11 21V3C11 2.4 11.4 2 12 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22Z" fill="currentColor"/>
                                    <path d="M19 11H6.60001V13H19C19.6 13 20 12.6 20 12C20 11.4 19.6 11 19 11Z" fill="currentColor"/>
                                    <path opacity="0.3" d="M6.6 17L2.3 12.7C1.9 12.3 1.9 11.7 2.3 11.3L6.6 7V17Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Timeline icon-->
                    <!--begin::Timeline content-->
                    <div class="timeline-content mb-10 mt-n1">
                        <!--begin::Timeline heading-->
                        <div class="pe-3 mb-5">
                            <!--begin::Title-->
                            <div class="fs-5 fw-semibold mb-2">
                                {{__($log->description)}}
                                <!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-primary ms-4">
                                    @if($properties->browser == 'Firefox')
                                        <img src="{{asset('assets/admin/media/browser-logos/mozila-firefox.png')}}" alt="avatar"/>
                                    @elseif($properties->browser == 'Chrome')
                                        <img src="{{asset('assets/admin/media/browser-logos/google-chrome.png')}}" alt="avatar"/>
                                    @elseif($properties->browser == 'Safari')
                                        <img src="{{asset('assets/admin/media/browser-logos/apple-safari.png')}}" alt="avatar"/>
                                    @elseif($properties->browser == 'Opera')
                                        <img src="{{asset('assets/admin/media/browser-logos/opera.png')}}" alt="avatar"/>
                                    @elseif($properties->browser == 'Edge')
                                        <img src="{{asset('assets/admin/media/browser-logos/internet-explorer.png')}}" alt="avatar"/>
                                    @endif
                                </span>
                                <!--end::Svg Icon-->
                                <a href="#" class="text-primary fw-bold me-1">
                                    @if($properties->device_name == false)
                                        {{__('admin.us_activity_computer')}}
                                    @else 
                                        {{$properties->device_name}}
                                    @endif
                                    ({{$properties->operating_system}})
                                </a>
                            </div>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="overflow-auto pb-5">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">{{getDateTime($log->created_at)}}</div>
                                    <!--end::Info-->
                                    <!--begin::User-->
                                    <a href="{{route('admin.edit_user', $log->causer->id)}}" class="text-primary fw-bold me-1">{{$log->causer->name}}</a>
                                    <!--end::User-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Timeline heading-->
                    </div>
                    <!--end::Timeline content-->
                </div>
                <!--end::Timeline item-->
            @endif
        </div>
    @endforeach
</div>
<!--end::Timeline-->