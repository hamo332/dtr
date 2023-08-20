@extends('admin.layouts/app')

@section('title', __('admin.users'))

@section('vendor-style')
<!-- vendor css files -->
@endsection

@section('page-style')
<!-- Page css files -->

@endsection

@section('content')

@section('toolbar-actions')
@include('admin.users.misc.list_actions')
@endsection

<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <!--begin::Card-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Summary-->
                        <!--begin::User Info-->
                        <div class="d-flex flex-center flex-column py-5">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                <img src="{{asset($user->image->file_name ?? 'assets/admin/media/avatars/blank.png')}}"
                                    alt="{{$user->name}}" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{$user->name}}</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="mb-9">
                                <!--begin::Badge-->
                                @php
                                $role = $user->roles()->first()
                                @endphp

                                @if(isset($role))
                                <div class="badge badge-lg bg-secondary d-inline">
                                    {{$role->name}}
                                </div>
                                @elseif($user->role_name == 'admin')
                                <div class="badge badge-light-primary d-inline">
                                    {{__('admin.admin')}}
                                </div>
                                @else
                                <div class="badge bg-danger d-inline">
                                    {{__('admin.us_user_norole')}}
                                </div>
                                @endif
                                <!--begin::Badge-->
                            </div>
                            <!--end::Position-->
                            <!--begin::Info-->
                            @if($user->role_name == 'technican' || $user->role_name == 'company')
                            <!--begin::Info heading-->
                            <div class="fw-bold mb-3">Assigned Tickets
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                    data-bs-trigger="hover" data-bs-html="true"
                                    data-bs-content="Number of support tickets assigned, closed and pending this week."></i>
                            </div>
                            <!--end::Info heading-->
                            <div class="d-flex flex-wrap flex-center">
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bold text-gray-700">
                                        <span class="w-75px">243</span>
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                    transform="rotate(90 13 6)" fill="currentColor" />
                                                <path
                                                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-semibold text-muted">Total</div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                    <div class="fs-4 fw-bold text-gray-700">
                                        <span class="w-50px">56</span>
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-danger">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1"
                                                    transform="rotate(-90 11 18)" fill="currentColor" />
                                                <path
                                                    d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-semibold text-muted">Solved</div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bold text-gray-700">
                                        <span class="w-50px">188</span>
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                    transform="rotate(90 13 6)" fill="currentColor" />
                                                <path
                                                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-semibold text-muted">Open</div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                            @endif
                        </div>
                        <!--end::User Info-->
                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                href="#kt_user_view_details" role="button" aria-expanded="false"
                                aria-controls="kt_user_view_details">
                                {{__('admin.us_details')}}
                                <span class="ms-2 rotate-180">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator"></div>
                        <!--begin::Details content-->
                        <div id="kt_user_view_details" class="collapse show">
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">{{__('admin.us_user_name')}}</div>
                                <div class="text-gray-600">{{$user->name}}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">{{__('admin.us_user_mail')}}</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$user->email}}</a>
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">{{__('admin.us_user_phone')}}</div>
                                <div class="text-gray-600">{{$user->phone}}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">{{__('admin.us_user_status')}}</div>
                                <div class="text-gray-600">
                                    @if($user->status == 'active')
                                    <span class="badge bg-success">
                                        {{__('admin.us_user_active')}}
                                    </span>
                                    @elseif($user->status == 'inactive')
                                    <span class="badge bg-danger">
                                        {{__('admin.us_user_inactive')}}
                                    </span>
                                    @elseif($user->status == 'pending')
                                    <span class="badge bg-warning">
                                        {{__('admin.us_user_pending')}}
                                    </span>
                                    @endif
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">{{__('admin.us_user_last_update')}}</div>
                                <div class="text-gray-600">{{getDateTime($user->updated_at)}}</div>
                                <!--begin::Details item-->
                            </div>
                        </div>
                        <!--end::Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Connected Accounts-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h3 class="fw-bold m-0">{{__('admin.us_connected_accounts')}}</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-2">
                        <!--begin::Notice-->
                        <div
                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z"
                                        fill="currentColor" />
                                    <path
                                        d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">{{__('admin.us_connected_accounts_hint')}}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                        <!--begin::Items-->
                        <div class="py-2">
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <div class="d-flex">
                                    <img src="{{asset('assets/admin/media/svg/brand-logos/google-icon.svg')}}"
                                        class="w-30px me-6" alt="" />
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="fs-5 text-dark text-hover-primary fw-bold">{{__('admin.google')}}</a>
                                        <div class="fs-6 fw-semibold text-muted">{{__('admin.sh_inactive')}}</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <!--begin::Switch-->
                                    <label
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input" name="google" type="checkbox" value="1"
                                            id="kt_modal_connected_accounts_google" disabled />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <span class="form-check-label fw-semibold text-muted"
                                            for="kt_modal_connected_accounts_google"></span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Switch-->
                                </div>
                            </div>
                            <!--end::Item-->
                            <div class="separator separator-dashed my-5"></div>
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <div class="d-flex">
                                    <img src="{{asset('assets/admin/media/svg/brand-logos/facebook-3.svg')}}"
                                        class="w-30px me-6" alt="" />
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="fs-5 text-dark text-hover-primary fw-bold">{{__('admin.facebook')}}</a>
                                        <div class="fs-6 fw-semibold text-muted">{{__('admin.sh_inactive')}}</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <!--begin::Switch-->
                                    <label
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input" name="facebook" type="checkbox" value="1"
                                            id="kt_modal_connected_accounts_facebook" disabled />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <span class="form-check-label fw-semibold text-muted"
                                            for="kt_modal_connected_accounts_facebook"></span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Switch-->
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Connected Accounts-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_user_account">{{__('admin.us_account')}}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                            href="#kt_user_security">{{__('admin.us_security')}}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_user_activity">{{__('admin.us_activity')}}</a>
                    </li>
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_user_account" role="tabpanel">
                        @include('admin.users.content.includes.account')
                    </div>
                    <!--end:::Tab pane-->
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_user_security" role="tabpanel">
                        @include('admin.users.content.includes.security')
                    </div>
                    <!--end:::Tab pane-->
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_user_activity" role="tabpanel">
                        @include('admin.users.content.includes.activity')
                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
        {{-- statement --}}
        <div class="col-xl-12 mb-5 mb-xl-12">
            <!--begin::Table Widget 4-->
            <div class="card card-flush h-xl-100">
                <!--begin::Card header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Statement</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">a full table of user Statement</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Actions-->
                    <div class="card-toolbar">
                        <!--begin::Filters-->
                        <div class="d-flex flex-stack flex-wrap gap-4">
                            <!--begin::Search-->
                            <div class="position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-table-widget-4="search"
                                    class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Filters-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-2"  style="overflow-x: scroll">
                    <!--begin::Form-->
                    <form action="{{route('admin.getReport', $user->id)}}" method="get">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" >
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" >
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Statement</button>
                    </form>
                    <!--end::Form-->
        
                    <!--begin::Table-->
                    
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Table Widget 4-->
        </div>
        
        {{-- table card --}}
        <div class="col-xl-12 mb-5 mb-xl-12">
            <!--begin::Table Widget 4-->
            <div class="card card-flush h-xl-100">
                <!--begin::Card header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">history</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">a full table of user Time in/out</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Actions-->
                    <div class="card-toolbar">
                        <!--begin::Filters-->
                        <div class="d-flex flex-stack flex-wrap gap-4">
                            <!--begin::Search-->
                            <div class="position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-table-widget-4="search"
                                    class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Filters-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-2"  style="overflow-x: scroll">
                    <!--begin::Table-->
                    <table id="kt_datatable_basic" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>#</th>
                                <th>{{ __('admin.sh_name') }}</th>
                                <th>{{ __('admin.sh_section') }}</th>
                                <th>{{ __('admin.sh_time_in') }}</th>
                                <th>{{ __('admin.sh_time_out') }}</th>
                                <th> total hours </th>
                                <th> Working Hours </th>
                                <th> normal hours </th>
                                <th> extra hours</th>
                                <th> V hours price </th>
                                <th> EX hours price</th>
                                <th> Total Price</th>

                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold" id="table-wrapper">
                            <?php $totalPaied = 0 ?>
                            @foreach ($userLogs as $log)
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->user->name }}</td>
                                <td>{{ $log->user->section }}</td>
                                <td>{{ $log->time_in }}</td>
                                <td>{{ $log->time_out }}</td>
                                <td>{{ gmdate('H:i:s',strtotime($log->time_out) - strtotime($log->time_in)) }}</td>
                                <td>{{ $working_hours }}</td>

                                @if ($working_hours >= (strtotime($log->time_out) - strtotime($log->time_in)) / 3600)
                                    <td>{{ gmdate('H:i:s', strtotime($log->time_out) - strtotime($log->time_in)) }}</td>
                                    <td>0</td>
                                    <td>{{ (((strtotime($log->time_out) - strtotime($log->time_in))/60)/60 ) }}</td>
                                    <td>0</td>
                                    <td>{{ (((strtotime($log->time_out) - strtotime($log->time_in))/60)/60 ) }}</td>
                                    <?php $totalPaied = $totalPaied + (((strtotime($log->time_out) - strtotime($log->time_in))/60)/60 ) ?>
                                @else
                                    <td>{{ gmdate('H:i:s', $working_hours * 3600) }}</td>
                                    <td>{{ gmdate('H:i:s', (strtotime($log->time_out) - strtotime($log->time_in)) - ($working_hours * 3600)) }}</td>
                                    <td>{{ $log->user->normal_hour_price * $working_hours }}</td>
                                    <td>{{ number_format(($extra_hour_price * ((strtotime($log->time_out) - strtotime($log->time_in)) - ($working_hours * 3600)) / 3600), 2) }}</td>
                                    <td>{{ ($log->user->normal_hour_price * $working_hours) + (number_format(($extra_hour_price * ((strtotime($log->time_out) - strtotime($log->time_in)) - ($working_hours * 3600)) / 3600), 2)) }}</td>
                                    <?php $totalPaied = $totalPaied + ($log->user->normal_hour_price * $working_hours) + (number_format(($extra_hour_price * ((strtotime($log->time_out) - strtotime($log->time_in)) - ($working_hours * 3600)) / 3600), 2)) ?>
                                    @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    Total To Pay: {{$totalPaied}}
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Table Widget 4-->
        </div>

    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->

@endsection

@section('vendor-script')
<!-- vendor files -->

@endsection

@section('page-script')
@endsection