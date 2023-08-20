
@extends('admin.layouts/app')

@section('title', __('admin.home'))

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/custom/datatables/datatables.bundle.css')}}">
@endsection
@section('page-style')
  <!-- Page css files -->
  
@endsection

<!--Begin:: content-->
@section('content')
  <!--begin::Toolbar-->
  @section('toolbar-actions')
      @include('admin.misc.home_list_actions')
  @endsection
  <!--end::Toolbar-->
  <!--begin::Content-->
  <div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Row-->
      <div class="row gy-5 g-xl-10">
        <!--begin::Col-->
        {{-- Camera --}}
        <div class="col-xl-4">
          <!--begin::List widget 5-->
          <div class="card card-flush">
            <!--begin::Header-->
            <div class="card-header pt-7">
              <!--begin::Title-->
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-dark">{{__('kpi.scan_file')}}</span>
                <span class="text-gray-400 mt-1 fw-semibold fs-6">{{__('kpi.scan_file_hint')}}</span>
              </h3>
              <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
              <!--begin::Scroll-->
              <div id="reader"></div>
              <!--end::Scroll-->
            </div>
            <!--end::Body-->
          </div>
          <!--end::List widget 5-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        {{-- table card --}}
        <div class="col-xl-8 mb-5 mb-xl-10">
          <!--begin::Table Widget 4-->
          <div class="card card-flush h-xl-100">
            <!--begin::Card header-->
            <div class="card-header pt-7">
              <!--begin::Title-->
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">{{__('kpi.qr_table')}}</span>
                <span class="text-gray-400 mt-1 fw-semibold fs-6">{{__('kpi.qr_table_hint')}}</span>
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
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                      </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                  </div>
                  <!--end::Search-->
                </div>
                <!--begin::Filters-->
              </div>
              <!--end::Actions-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-2">
              <!--begin::Table-->
              <table id="kt_datatable_basic" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>#</th>
                    <th>{{ __('admin.sh_name') }}</th>
                    <th>{{ __('admin.sh_section') }}</th>
                    <th>{{ __('admin.sh_time_in') }}</th>
                    <th>{{ __('admin.sh_time_out') }}</th>
                    <th>{{ __('admin.sh_qrcode') }}</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold" id="table-wrapper">
                  @foreach ($logs as $log)
                    <tr>
                      <td>{{ $log->id }}</td>
                      <td>{{ $log->user->name }}</td>
                      <td>{{ $log->user->section }}</td>
                      <td>{{ $log->time_in }}</td>
                      <td>{{ $log->time_out }}</td>
                      <td>{{ $log->user->qrcode }}</td>
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
        <!--end::Col-->
      </div>
      <!--end::Row-->
    </div>
    <!--end::Content container-->
  </div>
  <!--end::Content-->
@endsection
<!--End:: content-->

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{asset('assets/admin/plugins/custom/datatables/datatables.bundle.js')}}"></script>
	<script src="{{asset('assets/admin/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
  
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{asset('assets/admin/js/widgets.bundle.js')}}"></script>
  <script src="{{asset('assets/admin/js/custom/widgets.js')}}"></script>
  <script src="{{asset('assets/admin/js/custom/apps/chat/chat.js')}}"></script>
  <script src="{{asset('assets/admin/js/custom/utilities/modals/users-search.js')}}"></script>
  <script>
    var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
        
    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        $.post("{{ route('admin.qr_scanned') }}",
        {
          _token: "{{ csrf_token() }}",
          code: decodedText
        },
        function(data, status){
          
          console.log(data);
          if(data.status == 'success')
          {
            setTimeout(() => {
              location.reload();
            }, 1000);
          }
          else{
            alert("{{ __('errors.request_could_not_be_completed') }}");
          }
        });
        console.log(`Scan result: ${decodedText}`, decodedResult);
        // ...
        html5QrcodeScanner.clear();
        // ^ this will stop the scanner (video feed) and clear the scan area.
    }

    html5QrcodeScanner.render(onScanSuccess);
  </script>
@endsection
