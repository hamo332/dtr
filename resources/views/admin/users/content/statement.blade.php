@extends('admin.layouts/app')

@section('title', __('admin.users'))

@section('vendor-style')
<!-- vendor css files -->
@endsection

@section('page-style')
<!-- Page css files -->

@endsection

@section('content')


<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        
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
                    <form action="{{route('admin.exportUserLogsToExcel', $user->id)}}" method="get">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" >
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" >
                        </div>
                        <button type="submit" class="btn btn-info">Excel</button>
                    </form>
                    <!--end::Form-->
        
                    <!--begin::Table-->
                    <table id="kt_datatable_basic" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>#</th>
                                <th>{{ __('admin.sh_name') }}</th>
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